<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(usuarioTableSeeder::class);
        $this->call(fornecedorTableSeeder::class);
        $this->call(produtoTableSeeder::class);
        $this->call(comprasTableSeeder::class);
        $this->call(atendimentoTableSeeder::class);
        $this->call(carroTableSeeder::class);
        $this->call(compra_produtoTableSeeder::class);
        $this->call(atendimento_produtoTableSeeder::class);
    }   
}


