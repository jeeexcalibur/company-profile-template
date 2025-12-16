<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image',
        'mission_title',
        'mission_content',
        'vision_title',
        'vision_content',
        'years_experience',
        'projects_completed',
        'happy_clients',
        'team_members',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'years_experience' => 'integer',
        'projects_completed' => 'integer',
        'happy_clients' => 'integer',
        'team_members' => 'integer',
    ];

    /**
     * Get active about section
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get image URL
     */
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}
