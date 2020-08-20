<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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

    public function talks()
    {
       return $this
           ->belongsToMany(Talk::class, 'user_talk')
           ->using(UserTalk::class)->withPivot(['gacha_style_id'])
           ->using(UserTalk::class)->withPivot(['hit_flg']);
    }

    public function hasTalk()
    {
      return $this->belongsToMany(Talk::class);
    }

    public function following()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function gache_style()
    {
        return $this->hasOne(GachaStyle::class);
    }
}
