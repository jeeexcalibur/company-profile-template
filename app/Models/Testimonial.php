<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'client_name',
        'client_position',
        'client_company',
        'client_photo',
        'content',
        'rating',
        'sort_order',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Get active testimonials
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get featured testimonials
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Order by sort order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    /**
     * Get client photo URL
     */
    public function getClientPhotoUrlAttribute()
    {
        return $this->client_photo ? asset('storage/' . $this->client_photo) : null;
    }

    /**
     * Get star rating as array for display
     */
    public function getStarsAttribute()
    {
        return array_fill(0, $this->rating, true);
    }
}
