<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Challenge extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'checklist', 
        'image_path',
        'duration_days',
        'badge_name',
        'badge_icon',
        'completion_bonus_points',
    ];

    protected $casts = [
        'checklist' => 'array',
    ];

    public function participations(): HasMany
    {
        return $this->hasMany(UserChallengeParticipation::class);
    }

    // untuk mendapatkan url gambar
    public function getImageUrlAttribute()
    {
        return $this->image_path ? asset('storage/' . $this->image_path) : null;
    }
}
