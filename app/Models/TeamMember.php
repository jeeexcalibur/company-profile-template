<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'position',
        'bio',
        'photo',
        'email',
        'phone',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Get active team members
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Order by sort order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    /**
     * Get photo URL
     */
    public function getPhotoUrlAttribute()
    {
        return $this->photo ? asset('storage/' . $this->photo) : null;
    }

    /**
     * Check if member has any social links
     */
    public function getHasSocialLinksAttribute()
    {
        return $this->facebook || $this->twitter || $this->instagram || $this->linkedin;
    }
}
