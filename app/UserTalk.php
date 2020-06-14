<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserTalk extends Pivot
{
    protected $table = 'user_talk';

    public function gacha_style()
    {
       return $this->belongsTo(GachaStyle::class);
    }
}
