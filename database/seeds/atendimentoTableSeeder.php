<?php

use Illuminate\Database\Seeder;
use App\atendimento;

class atendimentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        atendimento::create([
            'descricao' => 'abacate',
            'valor_servico' => 100.00,
            'valor_total' => 8.00,
            'data' => '2019-09-17',
            'carro_id' => 1,
            'situacao' => 1
        ]);
        atendimento::create([
            'descricao' => 'sdadasd',
            'valor_servico' => 300.00,
            'valor_total' => 6.00,
            'data' => '2019-09-17',
            'carro_id' => 1,
            'situacao' => 1
        ]);
        atendimento::create([
            'descricao' => 'abacasaasdte',
            'valor_servico' => 150.00,
            'valor_total' => 200.00,
            'data' => '2019-09-17',
            'carro_id' => 1,
            'situacao' => 1
        ]);


       
    }
}
