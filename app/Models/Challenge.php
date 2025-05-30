<?php

namespace App\Models;

use App\Models\Badge;
use App\Models\ChallengeAction;
use App\Models\ChallengeParticipation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Challenge extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $keyType = 'string'; // Atur tipe data primary key sebagai string
    public $incrementing = false; // Nonaktifkan incrementing ID

    public function badge(): BelongsTo
    {
        return $this->belongsTo(Badge::class);
    }

    public function challenge_participations(): HasMany
    {
        return $this->hasMany(ChallengeParticipation::class);
    }
    public function challenge_actions(): HasMany
    {
        return $this->hasMany(ChallengeAction::class);
    }
    // public function participations(): HasMany
    // {
    //     return $this->hasMany(UserChallengeParticipation::class);
    // }

}
