<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Override;

#[Guarded(['id', 'created_at', 'updated_at'])]
class Country extends Model
{
    use HasFactory;

    // ==========================================
    // RELATIONSHIPS
    // ==========================================

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'last_updated_by');
    }

    // ==========================================
    // SCORE FIELD CONSTANTS
    // ==========================================

    private const array SCORE_FIELDS = [
    
    // ==========================================
    // D1 | HUMAN CAPITAL
    // ==========================================
        'd1_high_school', 
        'd1_technical', 
        'd1_bachelors', 
        'd1_postgraduate',

        'd1_cx_hospitality', 
        'd1_stem_digital', 
        'd1_professional_services',
        'd1_healthcare_sciences', 
        'd1_business_sales',

        'd1_lang_spanish', 
        'd1_lang_english', 
        'd1_lang_portuguese',
        'd1_lang_french', 
        'd1_lang_italian',
        'd1_lang_others_name',
        'd1_lang_others_specify',

        'd1_global_ready_na', 'd1_global_ready_eu', 'd1_global_ready_spain',
        'd1_global_ready_latam', 'd1_global_ready_apac',
        'd2_mnc_presence', 'd2_regulated_industry_maturity',
        'd3_channel_voice', 'd3_channel_chat', 'd3_channel_email',
        'd3_channel_back_office', 'd3_channel_self_service', 'd3_channel_video_chat',
        'd3_tech_cx', 'd3_tech_sales', 'd3_tech_collections',
        'd3_tech_tier1', 'd3_tech_tier2', 'd3_tech_tier3',
        'd3_tech_back_office', 'd3_tech_consulting',
        'd4_political_stability', 'd4_legal_security', 'd4_physical_security',
        'd4_economic_stability', 'd4_international_perception', 'd4_compliance_data_protection',
        'd5_labor_cost_index', 'd5_currency_inflation_risk',
    ];

    private const array D1_FIELDS = [
        'd1_high_school', 'd1_technical', 'd1_bachelors', 'd1_postgraduate',
        'd1_cx_hospitality', 'd1_stem_digital', 'd1_professional_services',
        'd1_healthcare_sciences', 'd1_business_sales',
        'd1_lang_spanish', 'd1_lang_english', 'd1_lang_portuguese',
        'd1_lang_french', 'd1_lang_italian',
        'd1_global_ready_na', 'd1_global_ready_eu', 'd1_global_ready_spain',
        'd1_global_ready_latam', 'd1_global_ready_apac',
    ];

    private const array D2_FIELDS = [
        'd2_mnc_presence', 'd2_regulated_industry_maturity',
    ];

    private const array D3_FIELDS = [
        'd3_channel_voice', 'd3_channel_chat', 'd3_channel_email',
        'd3_channel_back_office', 'd3_channel_self_service', 'd3_channel_video_chat',
        'd3_tech_cx', 'd3_tech_sales', 'd3_tech_collections',
        'd3_tech_tier1', 'd3_tech_tier2', 'd3_tech_tier3',
        'd3_tech_back_office', 'd3_tech_consulting',
    ];

    private const array D4_FIELDS = [
        'd4_political_stability', 'd4_legal_security', 'd4_physical_security',
        'd4_economic_stability', 'd4_international_perception', 'd4_compliance_data_protection',
    ];

    private const array D5_FIELDS = [
        'd5_labor_cost_index', 'd5_currency_inflation_risk',
    ];

    // ==========================================
    // ACCESSORS
    // ==========================================

    private function dimensionScore(array $fields): ?float
    {
        $values = collect($fields)
            ->map(fn ($f) => $this->$f)
            ->filter(fn ($v) => ! is_null($v));

        return $values->isNotEmpty() ? round($values->avg(), 1) : null;
    }

    protected function averageScore(): Attribute
    {
        return Attribute::make(
            get: function (): ?float {
                $values = collect(self::SCORE_FIELDS)
                    ->map(fn ($field) => $this->$field)
                    ->filter(fn ($v) => ! is_null($v));

                return $values->isNotEmpty() ? round($values->avg(), 1) : null;
            }
        );
    }

    protected function d1Score(): Attribute
    {
        return Attribute::make(get: fn () => $this->dimensionScore(self::D1_FIELDS));
    }

    protected function d2Score(): Attribute
    {
        return Attribute::make(get: fn () => $this->dimensionScore(self::D2_FIELDS));
    }

    protected function d3Score(): Attribute
    {
        return Attribute::make(get: fn () => $this->dimensionScore(self::D3_FIELDS));
    }

    protected function d4Score(): Attribute
    {
        return Attribute::make(get: fn () => $this->dimensionScore(self::D4_FIELDS));
    }

    protected function d5Score(): Attribute
    {
        return Attribute::make(get: fn () => $this->dimensionScore(self::D5_FIELDS));
    }

    #[Override]
    protected function casts(): array
    {
        return [
            'is_admin' => 'boolean',
            'd3_market_north_america' => 'boolean',
            'd3_market_emea' => 'boolean',
            'd3_market_latam' => 'boolean',
            'd3_market_apac' => 'boolean',
            'd3_market_local' => 'boolean',
            'd3_vertical_automotive' => 'boolean',
            'd3_vertical_bfsi' => 'boolean',
            'd3_vertical_energy' => 'boolean',
            'd3_vertical_government' => 'boolean',
            'd3_vertical_healthcare' => 'boolean',
            'd3_vertical_media' => 'boolean',
            'd3_vertical_retail' => 'boolean',
            'd3_vertical_tech' => 'boolean',
            'd3_vertical_travel' => 'boolean',
        ];
    }
}
