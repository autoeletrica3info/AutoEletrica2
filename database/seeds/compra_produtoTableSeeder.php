<?php

use Illuminate\Database\Seeder;
use App\compra_produto;

class compra_produtoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        compra_produto::create([
            'produto_id' => 1,
            'quantidade' => 2,
            'valor_total' => 100.00,
            'preco_unitario' => 50.00,
            'compra_id' => 22
        ]);

    
    }
}
