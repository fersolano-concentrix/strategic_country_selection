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
            $table->timestamps();

            // ==========================================
            // CORE IDENTITY
            // ==========================================
            $table->string('country_name');
            $table->string('iso_code', 2)->nullable();
            $table->foreignId('last_updated_by')->nullable()->constrained('users');
            $table->string('site_region');
            $table->string('leader_name');
            $table->string('leader_comments')->nullable();

            // ==========================================
            // D1 | HUMAN CAPITAL
            // ==========================================
            // 1. Educational Level
            $table->tinyInteger('d1_high_school')->nullable();
            $table->tinyInteger('d1_technical')->nullable();
            $table->tinyInteger('d1_bachelors')->nullable();
            $table->tinyInteger('d1_postgraduate')->nullable();

            // 2. Talent Specialization
            $table->tinyInteger('d1_cx_hospitality')->nullable();
            $table->tinyInteger('d1_stem_digital')->nullable();
            $table->tinyInteger('d1_professional_services')->nullable();
            $table->tinyInteger('d1_healthcare_sciences')->nullable();
            $table->tinyInteger('d1_business_sales')->nullable();

            // 3. Bilingualism Depth
            $table->tinyInteger('d1_lang_spanish')->nullable();
            $table->tinyInteger('d1_lang_english')->nullable();
            $table->tinyInteger('d1_lang_portuguese')->nullable();
            $table->tinyInteger('d1_lang_french')->nullable();
            $table->tinyInteger('d1_lang_italian')->nullable();
            $table->string('d1_lang_others_name')->nullable();
            $table->tinyInteger('d1_lang_others_specify')->nullable();

            // 4. Global Readiness
            $table->tinyInteger('d1_global_ready_na')->nullable();
            $table->tinyInteger('d1_global_ready_eu')->nullable();
            $table->tinyInteger('d1_global_ready_spain')->nullable();
            $table->tinyInteger('d1_global_ready_latam')->nullable();
            $table->tinyInteger('d1_global_ready_apac')->nullable();

            // ==========================================
            // D2 | BUSINESS ECOSYSTEM
            // ==========================================
            $table->tinyInteger('d2_mnc_presence')->nullable();
            $table->integer('d2_mnc_years')->nullable();

            $table->tinyInteger('d2_bpo_maturity')->nullable();
            $table->integer('d2_bpo_years')->nullable();

            $table->tinyInteger('d2_tech_development')->nullable();
            $table->integer('d2_tech_years')->nullable();

            $table->tinyInteger('d2_regulated_industry_maturity')->nullable();
            $table->integer('d2_regulated_years')->nullable();

            // ==========================================
            // D3 | OPERATIONAL PROFILE
            // ==========================================
            // 1. Channel Readiness
            $table->tinyInteger('d3_channel_voice')->nullable();
            $table->tinyInteger('d3_channel_chat')->nullable();
            $table->tinyInteger('d3_channel_email')->nullable();
            $table->tinyInteger('d3_channel_back_office')->nullable();
            $table->tinyInteger('d3_channel_self_service')->nullable();
            $table->tinyInteger('d3_channel_video_chat')->nullable();

            // 2. Supported Languages
            $table->tinyInteger('d3_lang_spanish')->nullable();
            $table->tinyInteger('d3_lang_english_b1')->nullable();
            $table->tinyInteger('d3_lang_english_b2')->nullable();
            $table->tinyInteger('d3_lang_english_c1')->nullable();
            $table->tinyInteger('d3_lang_portuguese_b1')->nullable();
            $table->tinyInteger('d3_lang_portuguese_b2')->nullable();
            $table->tinyInteger('d3_lang_portuguese_c1')->nullable();
            $table->string('d3_lang_others')->nullable();

            // 3. Service Complexity Level 
            $table->tinyInteger('d3_srv_dig_sales')->nullable();
            $table->tinyInteger('d3_srv_dig_marketing')->nullable();
            $table->tinyInteger('d3_srv_dig_cs')->nullable();
            $table->tinyInteger('d3_srv_dig_trust_safety')->nullable();
            $table->tinyInteger('d3_srv_dig_finance_compliance')->nullable();
            
            $table->tinyInteger('d3_srv_tech_transformation')->nullable();
            $table->tinyInteger('d3_srv_tech_applications')->nullable();
            $table->tinyInteger('d3_srv_tech_automation')->nullable();
            $table->tinyInteger('d3_srv_tech_experience_platforms')->nullable();
            $table->tinyInteger('d3_srv_tech_testing')->nullable();
            $table->tinyInteger('d3_srv_tech_cx_tech')->nullable();
            $table->tinyInteger('d3_srv_tech_generative_ai')->nullable();
            $table->tinyInteger('d3_srv_tech_agentic_ai')->nullable();
            $table->tinyInteger('d3_srv_tech_cybersecurity')->nullable();
            
            $table->tinyInteger('d3_srv_data_transformation')->nullable();
            $table->tinyInteger('d3_srv_data_engineering')->nullable();
            $table->tinyInteger('d3_srv_data_advanced_analytics')->nullable();
            $table->tinyInteger('d3_srv_data_enterprise_intelligence')->nullable();
            $table->tinyInteger('d3_srv_data_operational_insights')->nullable();
            $table->tinyInteger('d3_srv_data_voc')->nullable();
            $table->tinyInteger('d3_srv_data_domain_solutions')->nullable();
            $table->tinyInteger('d3_srv_data_ai_support')->nullable();
            
            $table->tinyInteger('d3_srv_strat_experience_design')->nullable();
            $table->tinyInteger('d3_srv_strat_digital_innovation')->nullable();
            $table->tinyInteger('d3_srv_strat_lifecycle_engagement')->nullable();
            $table->tinyInteger('d3_srv_strat_business_transformation')->nullable();

            // 4. Technical Support Maturity
            $table->tinyInteger('d3_tech_cx')->nullable();
            $table->integer('d3_tech_cx_years')->nullable();
            $table->decimal('d3_tech_cx_attrition', 5, 2)->nullable();

            $table->tinyInteger('d3_tech_tier1')->nullable();
            $table->tinyInteger('d3_tech_tier2')->nullable();
            $table->tinyInteger('d3_tech_tier3')->nullable();
            $table->integer('d3_tech_tiers_years')->nullable();
            $table->decimal('d3_tech_tiers_attrition', 5, 2)->nullable();

            $table->tinyInteger('d3_tech_back_office')->nullable();
            $table->integer('d3_tech_back_office_years')->nullable();
            $table->decimal('d3_tech_back_office_attrition', 5, 2)->nullable();
            
            $table->tinyInteger('d3_tech_consulting')->nullable();
            $table->integer('d3_tech_consulting_years')->nullable();
            $table->decimal('d3_tech_consulting_attrition', 5, 2)->nullable();

            // 5. Supported Markets (Checkboxes -> Boolean)
            $table->boolean('d3_market_north_america')->default(false);
            $table->boolean('d3_market_emea')->default(false);
            $table->boolean('d3_market_latam')->default(false);
            $table->boolean('d3_market_apac')->default(false);
            $table->boolean('d3_market_local')->default(false);

            // 6. Years of experience
            $table->integer('d3_market_years')->nullable();

            // 7. Industry Experience Matrix (Checkboxes -> Boolean)
            $table->boolean('d3_vertical_automotive')->default(false);
            $table->boolean('d3_vertical_bfsi')->default(false);
            $table->boolean('d3_vertical_energy')->default(false);
            $table->boolean('d3_vertical_government')->default(false);
            $table->boolean('d3_vertical_healthcare')->default(false);
            $table->boolean('d3_vertical_media')->default(false);
            $table->boolean('d3_vertical_retail')->default(false);
            $table->boolean('d3_vertical_tech')->default(false);
            $table->boolean('d3_vertical_travel')->default(false);

            // 8. Industries: Years of Experience
            $table->integer('d3_exp_years_automotive')->nullable();
            $table->integer('d3_exp_years_bfsi')->nullable();
            $table->integer('d3_exp_years_energy')->nullable();
            $table->integer('d3_exp_years_government')->nullable();
            $table->integer('d3_exp_years_healthcare')->nullable();
            $table->integer('d3_exp_years_media')->nullable();
            $table->integer('d3_exp_years_retail')->nullable();
            $table->integer('d3_exp_years_tech')->nullable();
            $table->integer('d3_exp_years_travel')->nullable();

            // 9. Infrastructure
            $table->string('d3_total_installed_capacity')->nullable();
            $table->string('d3_growth_availability')->nullable();
            
            // ==========================================
            // D4 | COUNTRY RISK PROFILE
            // ==========================================
            $table->tinyInteger('d4_political_stability')->nullable(); // *Corregido de tu Blade
            $table->tinyInteger('d4_legal_security')->nullable();
            $table->tinyInteger('d4_physical_security')->nullable();
            $table->tinyInteger('d4_economic_stability')->nullable();
            $table->tinyInteger('d4_international_perception')->nullable();
            $table->tinyInteger('d4_compliance_data_protection')->nullable();

            // ==========================================
            // D5 | PRICE SENSITIVITY & COST
            // ==========================================
            $table->tinyInteger('d5_labor_cost_index')->nullable(); // *Corregido de tu Blade
            $table->tinyInteger('d5_currency_inflation_risk')->nullable(); // *Corregido de tu Blade
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
