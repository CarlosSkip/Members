<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contatos extends Model
{
    //
    protected $fillable = [

    'nome', 'sobrenome', 'telefone', 'cidade', 'estado', 'profissao', 'email'

    ];
}