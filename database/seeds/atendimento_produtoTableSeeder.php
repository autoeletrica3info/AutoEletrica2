<?php

use Illuminate\Database\Seeder;
use App\atendimento_produto;

class atendimento_produtoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        atendimento_produto::create([
            'produto_id' => 1,
            'quantidade' => 2,
            'preco_unitario' => 4.00,
            'atendimento_id' => 1
        ]);

        atendimento_produto::create([
            'produto_id' => 2,
            'quantidade' => 3,
            'preco_unitario' => 2.00,
            'atendimento_id' => 2
        ]);
        atendimento_produto::create([
            'produto_id' => 2,
            'quantidade' => 10,
            'preco_unitario' => 20.00,
            'atendimento_id' => 3
        ]);
    }
}
