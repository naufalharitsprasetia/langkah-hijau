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
        'duration_days',
        'badge_name',
        'badge_icon',
        'completion_bonus_points',
    ];

    public function participations(): HasMany
    {
        return $this->hasMany(UserChallengeParticipation::class);
    }
}
