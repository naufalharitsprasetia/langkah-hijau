<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        // 'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function challenge_participations(): HasMany
    {
        return $this->hasMany(ChallengeParticipation::class);
    }

    public function tier(): BelongsTo
    {
        return $this->belongsTo(Tier::class);
    }
    public function badge()
    {
        return $this->belongsToMany(Badge::class, 'user_badge', 'user_id', 'badge_id');
    }

    public static function updateTier(User $user)
    {
        $tier = \App\Models\Tier::where('min_points', '<=', $user->green_points)
            ->where('max_points', '>=', $user->green_points)
            ->first();

        if ($tier && $user->tier_id !== $tier->id) {
            $user->tier_id = $tier->id;
            $user->save();
        }
    }
}