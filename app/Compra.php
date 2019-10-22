<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class compra extends Model
{
    protected $table = 'compras';

    public function compra()
    {
        return $this->hasMany('App\compra');
    }
    
}
