<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Badge extends Model

{
    protected $guarded = ['id'];

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_badge', 'badge_id', 'user_id');
    }
}