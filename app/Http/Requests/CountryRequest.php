<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Returning 'true' because the actual authorization is being
        // securely handled by Policies in the Controller.
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Retrieve the country ID if we are on an update route (PUT/PATCH)
        $countryId = $this->route('country') ? $this->route('country')->id : null;

        return [
            // ==========================================
            // CORE IDENTITY
            // ==========================================
            'country'     => 'required|string|size:2', // e.g., 'cr', 'mx'
            // Ensures site_region is unique, ignoring the current ID when updating
            'site_region' => 'required|string|max:255|unique:countries,site_region,' . $countryId,
            'leader_name' => 'required|string|max:255',

            // ==========================================
            // D1 | HUMAN CAPITAL (Scale 1-5)
            // ==========================================
            'd1_high_school'           => 'nullable|integer|min:1|max:5',
            'd1_technical'             => 'nullable|integer|min:1|max:5',
            'd1_bachelors'             => 'nullable|integer|min:1|max:5',
            'd1_postgraduate'          => 'nullable|integer|min:1|max:5',
            
            'd1_cx_hospitality'        => 'nullable|integer|min:1|max:5',
            'd1_stem_digital'          => 'nullable|integer|min:1|max:5',
            'd1_professional_services' => 'nullable|integer|min:1|max:5',
            'd1_healthcare_sciences'   => 'nullable|integer|min:1|max:5',
            'd1_business_sales'        => 'nullable|integer|min:1|max:5',

            'd1_lang_spanish'          => 'nullable|integer|min:1|max:5',
            'd1_lang_english'          => 'nullable|integer|min:1|max:5',
            'd1_lang_portuguese'       => 'nullable|integer|min:1|max:5',
            'd1_lang_french'           => 'nullable|integer|min:1|max:5',
            'd1_lang_italian'          => 'nullable|integer|min:1|max:5',
            'd1_lang_others_specify'   => 'nullable|string|max:255',

            'd1_global_ready_na'       => 'nullable|integer|min:1|max:5',
            'd1_global_ready_eu'       => 'nullable|integer|min:1|max:5',
            'd1_global_ready_spain'    => 'nullable|integer|min:1|max:5',
            'd1_global_ready_latam'    => 'nullable|integer|min:1|max:5',
            'd1_global_ready_apac'     => 'nullable|integer|min:1|max:5',

            // ==========================================
            // D2 | BUSINESS ECOSYSTEM (Scale 1-5 & Years)
            // ==========================================
            'd2_mnc_presence'                => 'nullable|integer|min:1|max:5',
            'd2_mnc_years'                   => 'nullable|integer|min:0',
            'd2_regulated_industry_maturity' => 'nullable|integer|min:1|max:5',
            'd2_regulated_years'             => 'nullable|integer|min:0',

            // ==========================================
            // D3 | OPERATIONAL PROFILE
            // ==========================================
            // Channels (Scale 1-5)
            'd3_channel_voice'        => 'nullable|integer|min:1|max:5',
            'd3_channel_chat'         => 'nullable|integer|min:1|max:5',
            'd3_channel_email'        => 'nullable|integer|min:1|max:5',
            'd3_channel_back_office'  => 'nullable|integer|min:1|max:5',
            'd3_channel_self_service' => 'nullable|integer|min:1|max:5',
            'd3_channel_video_chat'   => 'nullable|integer|min:1|max:5',

            // Languages & Tech Support allow 0 (Not Supported / None)
            'd3_lang_spanish'         => 'nullable|integer|min:0|max:5',
            'd3_lang_english_b1'      => 'nullable|integer|min:0|max:5',
            'd3_lang_english_b2'      => 'nullable|integer|min:0|max:5',
            'd3_lang_english_c1'      => 'nullable|integer|min:0|max:5',
            'd3_lang_portuguese_b1'   => 'nullable|integer|min:0|max:5',
            'd3_lang_portuguese_b2'   => 'nullable|integer|min:0|max:5',
            'd3_lang_portuguese_c1'   => 'nullable|integer|min:0|max:5',
            'd3_lang_others'          => 'nullable|string|max:255',

            'd3_tech_cx'              => 'nullable|integer|min:0|max:5',
            'd3_tech_sales'           => 'nullable|integer|min:0|max:5',
            'd3_tech_collections'     => 'nullable|integer|min:0|max:5',
            'd3_tech_tier1'           => 'nullable|integer|min:0|max:5',
            'd3_tech_tier2'           => 'nullable|integer|min:0|max:5',
            'd3_tech_tier3'           => 'nullable|integer|min:0|max:5',
            'd3_tech_back_office'     => 'nullable|integer|min:0|max:5',
            'd3_tech_consulting'      => 'nullable|integer|min:0|max:5',
            'd3_tech_years'           => 'nullable|integer|min:0',

            // Attrition (Percentages 0-100)
            'd3_attrition_cx'          => 'nullable|numeric|min:0|max:100',
            'd3_attrition_technical'   => 'nullable|numeric|min:0|max:100',
            'd3_attrition_back_office' => 'nullable|numeric|min:0|max:100',
            'd3_attrition_sales'       => 'nullable|numeric|min:0|max:100',
            'd3_attrition_collections' => 'nullable|numeric|min:0|max:100',
            'd3_attrition_consulting'  => 'nullable|numeric|min:0|max:100',

            // Supported Markets (Booleans & Years)
            'd3_market_north_america' => 'boolean',
            'd3_market_emea'          => 'boolean',
            'd3_market_latam'         => 'boolean',
            'd3_market_apac'          => 'boolean',
            'd3_market_local'         => 'boolean',
            'd3_market_years'         => 'nullable|integer|min:0',

            // Industry Matrix (Booleans)
            'd3_vertical_automotive'  => 'boolean',
            'd3_vertical_bfsi'        => 'boolean',
            'd3_vertical_energy'      => 'boolean',
            'd3_vertical_government'  => 'boolean',
            'd3_vertical_healthcare'  => 'boolean',
            'd3_vertical_media'       => 'boolean',
            'd3_vertical_retail'      => 'boolean',
            'd3_vertical_tech'        => 'boolean',
            'd3_vertical_travel'      => 'boolean',

            // Industry Years
            'd3_exp_years_automotive' => 'nullable|integer|min:0',
            'd3_exp_years_bfsi'       => 'nullable|integer|min:0',
            'd3_exp_years_energy'     => 'nullable|integer|min:0',
            'd3_exp_years_government' => 'nullable|integer|min:0',
            'd3_exp_years_healthcare' => 'nullable|integer|min:0',
            'd3_exp_years_media'      => 'nullable|integer|min:0',
            'd3_exp_years_retail'     => 'nullable|integer|min:0',
            'd3_exp_years_tech'       => 'nullable|integer|min:0',
            'd3_exp_years_travel'     => 'nullable|integer|min:0',

            // Infrastructure
            'd3_total_installed_capacity' => 'nullable|string|max:255',
            'd3_growth_availability'      => 'nullable|string|max:255',
            'd3_sites_count'              => 'nullable|string|max:255',
            'd3_site_locations'           => 'nullable|string|max:255',

            // ==========================================
            // D4 | COUNTRY RISK PROFILE (Scale 1-5)
            // ==========================================
            'd4_political_stability'        => 'nullable|integer|min:1|max:5',
            'd4_legal_security'             => 'nullable|integer|min:1|max:5',
            'd4_physical_security'          => 'nullable|integer|min:1|max:5',
            'd4_economic_stability'         => 'nullable|integer|min:1|max:5',
            'd4_international_perception'   => 'nullable|integer|min:1|max:5',
            'd4_compliance_data_protection' => 'nullable|integer|min:1|max:5',

            // ==========================================
            // D5 | PRICE SENSITIVITY & COST (Scale 1-5)
            // ==========================================
            'd5_labor_cost_index'        => 'nullable|integer|min:1|max:5',
            'd5_currency_inflation_risk' => 'nullable|integer|min:1|max:5',
        ];
    }

    /**
     * Custom error messages for better UX.
     */
    public function messages(): array
    {
        return [
            'country.required'           => 'You must select a target geography.',
            'country.size'               => 'The country format is invalid.',
            'site_region.required'       => 'The site/region identifier is required.',
            'site_region.unique'         => 'This specific hub or region is already registered in the strategic matrix.',
            'leader_name.required'       => 'Assigning a country leader is mandatory.',
            
            // Generic numeric validation fallback messages
            'integer'                    => 'This metric must be a whole number.',
            'numeric'                    => 'This metric must be a valid number or decimal.',
            'min'                        => 'The selected value is below the minimum allowed.',
            'max'                        => 'The selected value exceeds the maximum allowed.',
        ];
    }
}