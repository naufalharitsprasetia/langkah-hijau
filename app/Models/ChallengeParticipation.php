<?php

namespace App\Models;

use App\Models\User;
use App\Models\Challenge;
use App\Models\ChallengeDailyAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChallengeParticipation extends Model
{
    //
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $keyType = 'string'; // Atur tipe data primary key sebagai string
    public $incrementing = false; // Nonaktifkan incrementing ID
    protected $with = ['challenge', 'user'];

    public function challenge(): BelongsTo
    {
        return $this->belongsTo(Challenge::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function challenge_daily_actions(): HasMany
    {
        return $this->hasMany(ChallengeDailyAction::class);
    }
}