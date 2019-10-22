<?php

use Illuminate\Database\Seeder;
use App\carro;

class carroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        carro::create([
            'placa' => '123-abc',
            'proprietario' => 'Paulo',
            'marca' => 'ford',
            'modelo' => 'eco'
        ]);
        carro::create([
            'placa' => '124-abc',
            'proprietario' => 'Paulo',
            'marca' => 'ford',
            'modelo' => 'eco'
        ]);



    }
}
