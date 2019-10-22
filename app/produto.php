<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produto extends Model
{
    protected $table = 'produto';

    public function produtos()
    {
        return $this->hasMany('App\produto');
    }
}
