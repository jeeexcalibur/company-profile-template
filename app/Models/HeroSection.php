<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'button_text',
        'button_link',
        'button_text_secondary',
        'button_link_secondary',
        'background_image',
        'foreground_image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get active hero section
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get background image URL
     */
    public function getBackgroundImageUrlAttribute()
    {
        return $this->background_image ? asset('storage/' . $this->background_image) : null;
    }

    /**
     * Get foreground image URL
     */
    public function getForegroundImageUrlAttribute()
    {
        return $this->foreground_image ? asset('storage/' . $this->foreground_image) : null;
    }
}
