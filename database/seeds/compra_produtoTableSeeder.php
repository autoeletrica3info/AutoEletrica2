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
            'quantidade' => 12,
            'preco_unitario' => 55.55,
            'compra_id' => 22
        ]);

    
    }
}
