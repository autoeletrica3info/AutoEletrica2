<?php

use Illuminate\Database\Seeder;
use App\Compra;
class comprasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Compra::create([
            'valor_total' => 100.00,
            'dt_compra' => '2019-09-18',
        ]);

        Compra::create([
            'valor_total' => 150.00,
            'dt_compra' => '2019-09-17',
        ]);
    }
}
