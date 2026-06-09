<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('side', 100);
            $table->string('flag_emoji', 2);
            $table->string('creator_identity');

            // =========================================================================
            // DIMENSION 1 (D1) · HUMAN CAPITAL METRICS (17 Fields)
            // =========================================================================
            // Educational Attainment (Pipeline)
            $table->unsignedTinyInteger('d1_high_school')->default(1);
            $table->unsignedTinyInteger('d1_technical')->default(1);
            $table->unsignedTinyInteger('d1_bachelors')->default(1);
            $table->unsignedTinyInteger('d1_postgraduate')->default(1);

            // Talent Specialization
            $table->unsignedTinyInteger('d1_spec_cx')->default(1);
            $table->unsignedTinyInteger('d1_spec_stem')->default(1);
            $table->unsignedTinyInteger('d1_spec_prof_services')->default(1);
            $table->unsignedTinyInteger('d1_spec_healthcare')->default(1);
            $table->unsignedTinyInteger('d1_spec_sales')->default(1);

            // Bilingual Depth (CEFR)
            $table->unsignedTinyInteger('d1_lang_english')->default(1);
            $table->unsignedTinyInteger('d1_lang_spanish')->default(1);
            $table->unsignedTinyInteger('d1_lang_portuguese')->default(1);
            $table->unsignedTinyInteger('d1_lang_french')->default(1);

            // Global Readiness
            $table->unsignedTinyInteger('d1_readiness_na')->default(1);
            $table->unsignedTinyInteger('d1_readiness_eu')->default(1);
            $table->unsignedTinyInteger('d1_readiness_es')->default(1);
            $table->unsignedTinyInteger('d1_readiness_latam')->default(1);

            // =========================================================================
            // DIMENSION 2 (D2) · BUSINESS ECOSYSTEM METRICS (4 Fields)
            // =========================================================================
            $table->unsignedTinyInteger('d2_multnationals')->default(1);
            $table->unsignedTinyInteger('d2_bpo_maturity')->default(1);
            $table->unsignedTinyInteger('d2_tech_maturity')->default(1);
            $table->unsignedTinyInteger('d2_regulated_industries')->default(1);

            // =========================================================================
            // DIMENSION 3 (D3) · OPERATIONAL PROFILE METRICS (19 Fields)
            // =========================================================================
            // Channel Readiness Matrix
            $table->unsignedTinyInteger('d3_channel_voice')->default(1);
            $table->unsignedTinyInteger('d3_channel_chat')->default(1);
            $table->unsignedTinyInteger('d3_channel_email')->default(1);
            $table->unsignedTinyInteger('d3_channel_trust_safety')->default(1);
            $table->unsignedTinyInteger('d3_channel_ai_support')->default(1);
            $table->unsignedTinyInteger('d3_channel_video')->default(1);

            // Readiness by Complexity Level
            $table->unsignedTinyInteger('d3_complexity_transactional')->default(1);
            $table->unsignedTinyInteger('d3_complexity_cases')->default(1);
            $table->unsignedTinyInteger('d3_complexity_highskill')->default(1);
            $table->unsignedTinyInteger('d3_complexity_kpo')->default(1);

            // Technical Support Maturity (Tech Tiering)
            $table->unsignedTinyInteger('d3_tier_1')->default(1);
            $table->unsignedTinyInteger('d3_tier_2')->default(1);
            $table->unsignedTinyInteger('d3_tier_3')->default(1);

            // Retention and Stability (Attrition)
            $table->unsignedTinyInteger('d3_attrition_tier_1')->default(1);
            $table->unsignedTinyInteger('d3_attrition_tier_2')->default(1);
            $table->unsignedTinyInteger('d3_attrition_tier_3')->default(1);

            // Infrastructure (Seat Capacity)
            $table->unsignedTinyInteger('d3_installed_capacity')->default(1);
            $table->unsignedTinyInteger('d3_active_sites_count')->default(1);
            $table->string('d3_site_locations')->nullable();

            // =========================================================================
            // DIMENSION 4 (D4) · COUNTRY RISK PROFILE METRICS (9 Fields)
            // =========================================================================
            // Operational Stability and Country Risk
            $table->unsignedTinyInteger('d4_political_stability')->default(1);
            $table->unsignedTinyInteger('d4_legal_certainty')->default(1);
            $table->unsignedTinyInteger('d4_physical_security')->default(1);
            $table->unsignedTinyInteger('d4_economic_stability')->default(1);

            // International Perception
            $table->unsignedTinyInteger('d4_reputation_brand')->default(1);
            $table->unsignedTinyInteger('d4_ease_business')->default(1);

            // Compliance & Data Protection
            $table->unsignedTinyInteger('d4_gdpr_alignment')->default(1);
            $table->unsignedTinyInteger('d4_hipaa_alignment')->default(1);
            $table->unsignedTinyInteger('d4_pcidss_alignment')->default(1);

            // =========================================================================
            // DIMENSION 5 (D5) · VERTICAL EXPERTISE & COST METRICS (12 Fields)
            // =========================================================================
            // Vertical Industry Expertise
            $table->unsignedTinyInteger('d5_automotive')->default(1);
            $table->unsignedTinyInteger('d5_bfsi')->default(1);
            $table->unsignedTinyInteger('d5_energy_utilities')->default(1);
            $table->unsignedTinyInteger('d5_government')->default(1);
            $table->unsignedTinyInteger('d5_healthcare')->default(1);
            $table->unsignedTinyInteger('d5_media_communications')->default(1);
            $table->unsignedTinyInteger('d5_retail_ecommerce')->default(1);
            $table->unsignedTinyInteger('d5_tech_software')->default(1);
            $table->unsignedTinyInteger('d5_travel_hospitality')->default(1);

            // Price Sensitivity & Operating Cost
            $table->unsignedTinyInteger('d5_employee_cost')->default(1);
            $table->unsignedTinyInteger('d5_currency_stability')->default(1);
            $table->unsignedTinyInteger('d5_wage_competitiveness')->default(1);

            // System Management Meta Logs
            $table->text('country_lead_notes')->nullable();
            $table->string('last_updated_by')->nullable();
            $table->unsignedTinyInteger('completion_percentage')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
