<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAtendimentoProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimento_produto', function (Blueprint $table) {
            $table->integer('produto_id')->unsigned();
            $table->integer('quantidade');
            $table->float('preco_unitario');
            $table->float('valor_final');
            $table->integer('atendimento_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('atendimento_produto', function($table){
            $table->index(['produto_id', 'atendimento_id']);
        });
        Schema::table('atendimento_produto', function($table){
            $table->foreign('produto_id')->references('id')->on('produto')->onDelete("cascade");
            $table->foreign('atendimento_id')->references('id')->on('atendimento')->onDelete('cascade')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atendimento_produto');  
        
        
    }
}
