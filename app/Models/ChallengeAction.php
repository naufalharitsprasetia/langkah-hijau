<?php

namespace App\Models;

use App\Models\Challenge;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChallengeAction extends Model
{
    //
    protected $guarded = ['id'];

    public function challenge(): BelongsTo
    {
        return $this->belongsTo(Challenge::class);
    }
}