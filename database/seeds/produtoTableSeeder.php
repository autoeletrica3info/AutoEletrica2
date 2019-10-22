<?php

use Illuminate\Database\Seeder;
use App\produto;

class produtoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        produto::create([
            'nome' => 'Aruela',
            'marca' => 'Brastemp',
            'categoria' => 'metal',
            'preco_custo' => 2.00,
            'preco_unitario' => 4.00,
            'fornecedor_id' => 1

        ]);

        produto::create([
            'nome' => 'Aruelsadsda',
            'marca' => 'dsadsad',
            'categoria' => 'mesdfsfsdftal',
            'preco_custo' => 1.00,
            'preco_unitario' => 2.00,
            'fornecedor_id' => 1

        ]);
        produto::create([
            'nome' => 'dddsaaa',
            'marca' => 'aaaawdff',
            'categoria' => 'grrrgrg',
            'preco_custo' => 10.00,
            'preco_unitario' => 20.00,
            'fornecedor_id' => 1

        ]);
    }
}
