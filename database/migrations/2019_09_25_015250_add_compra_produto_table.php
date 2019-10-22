<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompraProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_produto', function (Blueprint $table) {
            $table->integer('produto_id')->unsigned();
            $table->integer('quantidade');
            $table->float('preco_unitario');
            $table->integer('compra_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('compra_produto', function($table){
            $table->foreign('produto_id')->references('id')->on('produto');
            $table->foreign('compra_id')->references('id')->on('compra');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

            Schema::dropIfExists('compra_produto');
    
    }
}
