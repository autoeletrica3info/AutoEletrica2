<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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

    /*
                $table->increments('id');
            $table->string('nivel');
            $table->string('telefone');
            $table->string('cpf');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('rua');
            $table->string('numero');
            $table->string('cidade');
            $table->string('uf');
            $table->string('bairro');
    */
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

