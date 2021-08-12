<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use jazmy\FormBuilder\Traits\HasFormBuilderTraits;


class User extends Authenticatable
{
    use HasFormBuilderTraits;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
    public function event()
    {
        return $this->hasMany(Event::class);
    }
    function socialProviders()
    {
        return $this->hasMany(SocialProvider::class);
    }
    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
}
