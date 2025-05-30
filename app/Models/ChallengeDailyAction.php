<?php

namespace App\Models;

use App\Models\ChallengeParticipation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChallengeDailyAction extends Model
{
    //
    protected $guarded = ['id'];

    public function challenge_participation(): BelongsTo
    {
        return $this->belongsTo(ChallengeParticipation::class);
    }
}