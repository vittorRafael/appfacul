<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


//Após criado o model e a migration com o comando no terminal, ambos estão conectados. Diferente do model, a migration precisa de algumas edições e comandos no terminal para ser utilizada no app.
class CreateContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //função up da migration, dando php artisan migrate, tudo que estiver na função up de todas as migrations são executadas no banco de dados.
    public function up()
    {
        //Comando para criar a tabela contatos no bd
        Schema::create('contatos', function (Blueprint $table) {
            //declarando coluna id
            $table->id();
            //declarando coluna nome com no máximo 30 caracteres
            $table->string('nome', 30);
            //declarando coluna sobrenome com no máximo 30 caracteres
            $table->string('sobrenome', 30);
            //declarando coluna telefone com no máximo 15 caracteres
            $table->string('telefone', 15);
            //declarando colunas created_up e updated_up
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    //função down da migration, dando php artisan migrate:rollback, tudo que estiver na função down de todas as migrations são executadas no banco de dados.
    public function down()
    {
        //Comando para deletar a tabela contatos no bd
        Schema::dropIfExists('contatos');
    }
}
