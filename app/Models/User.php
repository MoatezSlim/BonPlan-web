<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use App\Models\Scopes\Searchable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use BezhanSalleh\FilamentShield\Traits\HasPanelShield;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\HasMany;


class User extends Authenticatable implements FilamentUser, HasAvatar
{
    use HasRoles;
    use Notifiable;
    use HasFactory;
    use Searchable;
    use HasApiTokens;
    use HasPanelShield;
    //use HasProfilePhoto;
    //use TwoFactorAuthenticatable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'location',
        'date_n',
        'tel',
        'avatar_url',
    ];

    protected $searchableFields = ['*'];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'two_factor_confirmed_at' => 'datetime',
        'date_n' => 'date',
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function bonPlans()
    {
        return $this->hasMany(BonPlan::class);
    }

    public function isSuperAdmin(): bool
    {
        return $this->hasRole('super_admin');
    }


    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url ? Storage::url($this->avatar_url) : null ;
    }

    public function favourises(): HasMany
    {
        return $this->hasMany(Favouris::class);
    }
}
