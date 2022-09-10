<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
        // remove campos da busca
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',

        // tranforma campos nas buscas
        // exmeplo
        // 'name'=>'boolean';  todas respostas vão mostrar um bollean
        // 'name'=>'integer';  todas respostas vão mostrar inteiro, 0 /1
    ];

    public function store(){

        return $this->hasOne(Store::class);
        // tem uma loja // é possível informar no segundo parametro o nome da tabela.
    }
}
