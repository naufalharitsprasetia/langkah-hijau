<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DailyUserAction extends Model
{
    use HasFactory;

    protected $fillable = [
        'participation_id',
        'action_date',
        'daily_points',
        'checklist_status',
        'photo_submission_path',
        'notes',
    ];

    protected $casts = [
        'action_date' => 'date',
        // 'checklist_status' => 'array',
    ];

    public function participation(): BelongsTo
    {
        return $this->belongsTo(UserChallengeParticipation::class, 'participation_id');
    }
}
