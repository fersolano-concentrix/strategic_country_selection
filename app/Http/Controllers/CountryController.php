<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Http\Requests\CountryRequest; // Asegúrate de haber creado este Form Request
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CountryController extends Controller
{
    public function index()
    {
        // Changed 'name' to 'country' to match the database column
        $countries = Country::orderBy('country')->get();
        return view('admin.countries.index', compact('countries'));
    }

    public function create()
    {
        Gate::authorize('create', Country::class);
        return view('admin.countries.create');
    }

    public function store(CountryRequest $request)
    {
        Gate::authorize('create', Country::class);

        // $request->validated() already contains all clean and secure data
        $validatedData = $request->validated();

        Country::create($validatedData);

        return redirect()->route('admin.countries.index')
                         ->with('success', 'Country profile successfully registered in the matrix.');
    }

    public function edit(Country $country)
    {
        Gate::authorize('update', $country);
        return view('admin.countries.edit', compact('country'));
    }

    public function update(CountryRequest $request, Country $country)
    {
        Gate::authorize('update', $country);

        $validatedData = $request->validated();
        $validatedData['last_updated_by'] = auth()->id();

        $country->update($validatedData);

        return redirect()->route('admin.countries.index')
                         ->with('success', 'Country profile updated successfully.');
    }

    public function destroy(Country $country)
    {
        Gate::authorize('delete', $country);
        
        $country->delete();

        return redirect()->route('admin.countries.index')
                         ->with('success', 'Record securely deleted.');
    }
}