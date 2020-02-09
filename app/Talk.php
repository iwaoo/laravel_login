<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
    protected $guarded = [];

    public function talkUsers()
    {
      return $this->belongsToMany(User::class);
    }


}
