<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAtendimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
            $table->float('valor_servico');
            $table->date('data');
            $table->integer('pagamento');
            $table->integer('valor_total');
            $table->integer('carro_id')->unsigned();
            $table->integer('situacao');
            $table->timestamps();
            //$table->onDelete('cascade');
        });
        Schema::table('atendimento', function($table){
            $table->foreign('carro_id')->references('id')->on('carro');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
            Schema::dropIfExists('atendimento');
        
    }
}
