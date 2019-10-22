<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('marca');
            $table->string('categoria');
            $table->float('preco_custo');
            $table->float('preco_unitario');
            $table->integer('fornecedor_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('produto', function($table){
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto');
    }
}
