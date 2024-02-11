<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'provider',
        'provider_id',
        'provider_token',
        'system_generated_password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'system_generated_password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function generateUsername($username)
    {
        if (!$username) {
            $username = Str::lower(Str::random(8));
        }

        if (User::whereUsername($username)->exists()) {
            $newUsername = $username . Str::random(5);

            $username = self::generateUsername($newUsername);
        }

        return $username;
    }

    public function hasNotUpdatedPassword()
    {
        return $this->system_generated_password && $this->provider;
    }

    public function hasUpdatedPassword()
    {
        return !$this->system_generated_password;
    }
}
