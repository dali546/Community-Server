<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable {
    use Notifiable, HasApiTokens;

  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // A User can have many Events (posts)
    public function events() {
        return $this->hasMany(Event::class);
    }

    public function profile() {
        return $this->hasOne(Profile::class);
    }

    // Change Passport auth to Username instead of Email...
    public function findForPassport($username) {
        return self::where('username', $username)->first();
    }
}
