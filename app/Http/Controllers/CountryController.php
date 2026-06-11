<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::orderBy('country', 'asc')->get();

        return view('index', ['countries' => $countries]);
    }

    public function recommender(Request $request)
    {
        // Check if the user has clicked "Run Recommendation / Execute Matrix Sizing"
        $hasSubmitted = $request->has('run_evaluation'); // cite: 1
        $countries = collect();

        if ($hasSubmitted) { // cite: 1
            // 1. Fetch all countries to run them through our scoring matrix algorithm
            $allCountries = Country::all();

            // 2. Map through countries and calculate their customized compatibility match index
            $countries = $allCountries->map(function ($country) use ($request) {
                $totalPointsPossible = 0;
                $pointsEarned = 0;

                // --- DIMENSION 1: HUMAN CAPITAL MATCHING ---
                $eduLevel = $request->input('education_level', 'undergraduate'); // cite: 1
                $eduMapping = [
                    'high_school' => 'd1_high_school',
                    'technical' => 'd1_technical',
                    'undergraduate' => 'd1_bachelors',
                    'postgraduate' => 'd1_postgraduate',
                ]; // cite: 2
                if (isset($eduMapping[$eduLevel])) {
                    $targetField = $eduMapping[$eduLevel];
                    $totalPointsPossible += 5;
                    // Fallback to 1 if database field is empty or null
                    $pointsEarned += ($country->$targetField ?? 1);
                }

                // Target languages specified by checkboxes
                $requestedLanguages = $request->input('languages', []); // cite: 4
                foreach ($requestedLanguages as $lang) {
                    $langField = 'd1_lang_'.$lang; // cite: 4
                    $totalPointsPossible += 5;
                    $pointsEarned += ($country->$langField ?? 1);
                }

                // --- DIMENSION 2: ECOSYSTEM FOOTPRINT MATCHING ---
                $totalPointsPossible += 10;
                $pointsEarned += (5 - abs(($country->d2_mnc_presence ?? 1) - $request->input('d2_mnc_presence', 1))); // cite: 2, 4
                $pointsEarned += (5 - abs(($country->d2_regulated_industry_maturity ?? 1) - $request->input('d2_regulated_industry_maturity', 1))); // cite: 2, 4

                // --- DIMENSION 3: OPERATIONAL CHANNELS MATCHING ---
                $requestedChannels = $request->input('channels', []); // cite: 1, 4
                foreach ($requestedChannels as $channel) {
                    $channelField = 'd3_channel_'.$channel; // cite: 2, 4
                    $totalPointsPossible += 5;
                    $pointsEarned += ($country->$channelField ?? 1);
                }

                // Specialized industry verticals validation toggle
                $requestedVerticals = $request->input('verticals', []); // cite: 1, 4
                foreach ($requestedVerticals as $vert) {
                    $vertField = 'd3_vertical_'.$vert; // cite: 2, 4
                    $totalPointsPossible += 5;
                    $pointsEarned += (empty($country->$vertField) ? 1 : 5);
                }

                // --- DIMENSION 4: ENVIRONMENTAL RISK INDEX MATCHING ---
                $riskSliders = [
                    'd4_political_stability',
                    'd4_legal_security',
                    'd4_physical_security',
                    'd4_economic_stability',
                    'd4_international_perception',
                    'd4_compliance_data_protection',
                ]; // cite: 2, 4
                foreach ($riskSliders as $slider) {
                    $totalPointsPossible += 5;
                    $dbValue = $country->$slider ?? 1;
                    $delta = abs($dbValue - $request->input($slider, 1)); // cite: 4
                    $pointsEarned += (5 - $delta); // cite: 4
                }

                // --- DIMENSION 5: VERTICAL COST ALIGNMENT MATCHING ---
                $totalPointsPossible += 10;
                $pointsEarned += (5 - abs(($country->d5_labor_cost_index ?? 1) - $request->input('d5_labor_cost_index', 1))); // cite: 2, 4
                $pointsEarned += (5 - abs(($country->d5_currency_inflation_risk ?? 1) - $request->input('d5_currency_inflation_risk', 1))); // cite: 2, 4

                if ($totalPointsPossible === 0) {
                    $totalPointsPossible = 1; // cite: 4
                }

                // Enforce score constraints limits between 0-100%
                $fitScore = round(($pointsEarned / $totalPointsPossible) * 100); // cite: 4
                $country->calculated_fit_score = min(max($fitScore, 0), 100); // cite: 1, 4

                return $country;
            })

            // 3. Fault-Tolerant Filter Guardrails
                ->filter(function ($country) use ($request): bool {
                    // Check attrition tracking limit only if your DB populates it.
                    // If the field is null, it falls back to 0 so it passes the safety cap safely.
                    $technicalAttrition = $country->d3_attrition_technical ?? 0; // cite: 2
                    if ($technicalAttrition > $request->input('max_attrition', 75)) { // cite: 4
                        return false; // cite: 4
                    }

                    // Check physical cluster count limits (Defaults to passing if unassigned)
                    $sitesCount = $country->d3_sites_count ?? 99; // cite: 2
                    if ($sitesCount < $request->input('min_sites', 1)) { // cite: 4
                        return false; // cite: 4
                    }

                    // Check structural legacy operational track experience tenure bounds
                    $mncYears = $country->d2_mnc_years ?? 99; // cite: 2
                    if ($mncYears < $request->input('min_mnc_years', 0)) { // cite: 4
                        return false; // cite: 4
                    }

                    return true; // cite: 4
                })

            // 4. Sort results descending so highest compatibility index finishes on top
                ->sortByDesc('calculated_fit_score') // cite: 4
                ->values(); // cite: 4
        }

        return view('recommender', ['countries' => $countries, 'hasSubmitted' => $hasSubmitted]); // cite: 4
    }

    public function dashboard()
    {
        $countries = Country::orderBy('country')->get();

        return view('auth.index', ['countries' => $countries]);
    }

    public function pipeline()
    {
        $countries = Country::with('updatedBy')->orderBy('country')->get();

        return view('auth.pipeline', ['countries' => $countries]);
    }

    public function create()
    {
        Gate::authorize('create', Country::class);

        return view('admin.countries.create');
    }

    public function store(CountryRequest $request)
    {
        Gate::authorize('create', Country::class);

        $data = $request->validated();
        $data['last_updated_by'] = auth()->id();
        $data['iso_code'] = $data['country'];

        Country::create($data);

        return redirect()->route('dashboard')
            ->with('success', 'Country node registered succesfully.');
    }

    public function edit(Country $country)
    {
        Gate::authorize('update', $country);

        return view('admin.countries.edit', ['country' => $country]);
    }

    public function show(Country $country)
    {
        return view('show', ['country' => $country]);
    }

    public function update(CountryRequest $request, Country $country)
    {
        Gate::authorize('update', $country);

        $data = $request->validated();
        $data['last_updated_by'] = auth()->id();

        $country->update($data);

        return redirect()->route('dashboard')
            ->with('success', 'Country node updated succesfully.');
    }

    public function destroy(Request $request, Country $country)
    {
        // 1. Confirm payload matching credentials
        $request->validate([
            'password' => 'required|string',
        ]);

        // 2. Validate current administrative identity token parameters
        if (! Hash::check($request->password, auth()->user()->password)) {
            throw ValidationException::withMessages([
                'password' => ['The security credentials supplied do not match our administrative data records.'],
            ]);
        }

        // 3. Perform clear purge statement operation
        $country->delete();

        return redirect()->route('dashboard')->with('success', 'Country matrix profile successfully purged.');
    }
}
