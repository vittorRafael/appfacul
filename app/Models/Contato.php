<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Com o comando "php artisan make:model Contato -m" no terminal irá criar o modelo e a migration Contato com seus respectivos nomes e estruturas necessárias para dar continuidade a aplicação.

//Após criado o model Contato, servirá de conexão da tabela no banco de dados para o app através da class contato, ou seja, dar instruções para a Class Contato é dar instruções para a tabela no banco de dados.
class Contato extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'sobrenome', 'telefone'];
}
