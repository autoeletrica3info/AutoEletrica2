<?php

use Illuminate\Database\Seeder;
use App\fornecedor;
class fornecedorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        fornecedor::create([
            'nome_fornecedor' => 'Fornecedor1',
            'email' => 'pecas@pecas.com',
            'endereco' => 'Av heraclides lima gomes, 2336',
            'uf' => 'RS',
            'cidade' => 'Boa Vista do Incra'
                ]);
        fornecedor::create([
            'nome_fornecedor' => 'Fornecedor2',
            'email' => 'pecasnovas@pecas.com',
            'endereco' => 'Av heraclides lima gomes, 2336',
            'uf' => 'RS',
            'cidade' => 'Boa Vista do Incra'
                ]);
        fornecedor::create([
            'nome_fornecedor' => 'Fornecedor3',
            'email' => 'dsdsd@pecas.com',
            'endereco' => 'Av heraclides lima gomes, 2336',
            'uf' => 'RS',
            'cidade' => 'Boa Vista do Incra'
                ]);
        fornecedor::create([
            'nome_fornecedor' => 'Fornecedor4',
            'email' => 'sdsadsa@pecas.com',
            'endereco' => 'Av heraclides lima gomes, 2336',
            'uf' => 'RS',
            'cidade' => 'Boa Vista do Incra'
                ]);
                /*
                $table->string('nome');
                $table->string('email')->unique();
                $table->string('endereço');
                $table->string('uf');
                $table->string('cidade');
                */    
    }
}
