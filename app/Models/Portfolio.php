<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'title',
        'description',
        'client_name',
        'category',
        'image',
        'gallery',
        'project_url',
        'completed_at',
        'sort_order',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'gallery' => 'array',
        'completed_at' => 'date',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Get active portfolios
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get featured portfolios
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
     * Get image URL
     */
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    /**
     * Get gallery URLs
     */
    public function getGalleryUrlsAttribute()
    {
        if (!$this->gallery)
            return [];
        return array_map(fn($image) => asset('storage/' . $image), $this->gallery);
    }

    /**
     * Get unique categories
     */
    public static function getCategories()
    {
        return self::active()
            ->whereNotNull('category')
            ->distinct()
            ->pluck('category');
    }
}
