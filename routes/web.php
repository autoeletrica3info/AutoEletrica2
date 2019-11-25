<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::group(['middleware' => 'auth'], function(){
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');


//MOSTAR
Route::get('/mostrar/fornecedor', 'fornecedorController@index');
Route::get('/mostrar/carro', 'carroController@index');
Route::get('/mostrar/produto', 'produtoController@index');
Route::get('/mostrar/atendimento', 'atendimentoController@index');
Route::get('/mostrar/compra', 'compraController@index');
Route::get('/mostrar/atendimento/produto', 'atendimentoProdutoController@index');
Route::get('/mostrar/compra/produto', 'compraProdutoController@index');

//CADASTRO
Route::get('/cadastro/fornecedor', 'fornecedorController@cadastro')->name('cadastro/fornecedor');
Route::get('/create/fornecedor','fornecedorController@create');
Route::post('/cadastro/fornecedor', 'fornecedorController@store');
Route::get('/cadastro/carro', 'carroController@cadastro')->name('cadastro/carro');
Route::get('/create/carro','carroController@create');
Route::post('/cadastro/carro', 'carroController@store');
Route::get('/cadastro/produto', 'produtoController@cadastro')->name('cadastro/produto');
Route::get('/create/produto','produtoController@create');
Route::post('/cadastro/produto', 'produtoController@store');
Route::get('/cadastro/atendimento', 'atendimentoController@cadastro')->name('cadastro/atendimento');
Route::get('/create/atendimento','atendimentoController@create');
Route::post('/cadastro/atendimento', 'atendimentoController@store');
Route::get('/cadastro/compra', 'compraController@cadastro')->name('cadastro/compra');
Route::get('/create/compra','compraController@create');
Route::post('/cadastro/compra', 'compraController@store');
Route::get('/cadastro/atendimento/produto/', 'atendimentoProdutoController@cadastro')->name('cadastro/atendimento/produto');
Route::get('/create/atendimento/produto/','atendimentoProdutoController@create');
Route::post('/cadastro/atendimento/produto/', 'atendimentoProdutoController@store');
Route::get('/cadastro/compra/produto/', 'compraProdutoController@cadastro')->name('cadastro/compra/produto');
Route::get('/create/compra/produto/','compraProdutoController@create');
Route::post('/cadastro/compra/produto/', 'compraProdutoController@store');

    //ADIÇÃO
    Route::get('/adicao/atendimento', 'atendimentoController@adicao')->name('/adicao/atendimento');
Route::post('/cadastro/atendimento', 'atendimentoController@store');
Route::get('/adicao/compra', 'compraController@adicao')->name('/adicao/atendimento');
Route::post('/cadastro/compra', 'compraController@store');


//EDITAR
Route::get('/editar/compra/{id}', 'compraController@edit');
Route::put('/compra/{id}', 'compraController@update');

Route::get('/editar/atendimento/{id}', 'atendimentoController@edit');
Route::put('/atendimento/{id}', 'atendimentoController@update');

Route::get('/editar/carro/{id}', 'carroController@edit');
Route::put('/carro/{id}', 'carroController@update');

Route::get('/editar/fornecedor/{id}', 'fornecedorController@edit');
Route::put('/fornecedor/{id}', 'fornecedorController@update');

Route::get('/editar/produto/{id}', 'produtoController@edit');
Route::put('/produto/{id}', 'produtoController@update');

Route::get('/editar/atendimento/produto/{id}/{id2}', 'atendimentoProdutoController@edit');
Route::put('/atendimento/produto/{id}/{id2}', 'atendimentoProdutoController@update');

Route::get('/editar/compra/produto/{id}/{id2}', 'compraProdutoController@edit');
Route::put('/atendimento/compra/{id}/{id2}', 'compraProdutoController@update');


//SHOW
Route::get('/mostrar/compra/{id}', 'compraController@show');
Route::get('/mostrar/atendimento/{id}', 'atendimentoController@show');
Route::get('/mostrar/carro/{id}', 'carroController@show');
Route::get('/mostrar/fornecedor/{id}', 'fornecedorController@show');
Route::get('/mostrar/produto/{id}', 'produtoController@show');


//DELETE
Route::get('/excluir/carro/{id}', 'carroController@delete');
Route::delete('/carro/{id}', 'carroController@destroy');
Route::get('/excluir/fornecedor/{id}', 'fornecedorController@delete');
Route::delete('/fornecedor/{id}', 'fornecedorController@destroy');
Route::get('/excluir/atendimento/produto/{id}/{id2}', 'atendimentoProdutoController@delete');
Route::delete('/atendimento/produto/{id}/{id2}', 'atendimentoProdutoController@destroy');
Route::get('/excluir/compra/produto/{id}/{id2}', 'compraProdutoController@delete');
Route::delete('/compra/produto/{id}/{id2}', 'compraProdutoController@destroy');
Route::get('/excluir/produto/{id}', 'produtoController@delete');
Route::delete('/produto/{id}', 'produtoController@destroy');

//Route::get('/cadastro/produto', 'produtosController@index')->name('cadastro/produto');
//Route::get('/create/produto','produtosController@create');
//Route::post('/cadastro/produto', 'produtosController@store');

Route::put('pagar/{id}', 'atendimentoController@pagamento');
Route::put('pagar/compra/{id}', 'compraController@pagamento');

});
//php artisan key:generate
//composer dump-autoload
//php artisan migrate --seed



