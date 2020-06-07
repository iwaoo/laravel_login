<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TalkUser extends Model
{
    protected $guarded = [];

    public function talkUserGachaStyle()
    {
      return $this->belongsToMany(GachaStyle::class);
    }
    
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'talk_user';

}
