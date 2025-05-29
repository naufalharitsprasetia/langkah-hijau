<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserChallengeParticipation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'challenge_id',
        'start_date',
        'status',
        'completion_date',
        'earned_challenge_points',
    ];

    protected $casts = [
        'start_date' => 'date',
        'completion_date' => 'date',
    ];

    // Satu partisipasi milik satu User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Satu partisipasi milik satu Challenge
    public function challenge(): BelongsTo
    {
        return $this->belongsTo(Challenge::class);
    }

    // Satu partisipasi memiliki banyak aksi harian
    public function dailyActions()
    {
        return $this->hasMany(DailyUserAction::class, 'participation_id');
    }
}
