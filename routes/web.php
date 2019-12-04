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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(); //coloca automaticamente rotas de login e register
Route::get('login/google', 'Auth\LoginController@redirectToGoogle'); //fazendo a rota para usar a API do google
Route::get('login/google/callback', 'Auth\LoginController@receiveDataGoogle'); 


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/produtos/cadastrar', 'ProductController@viewForm')->middleware('checkuser');
//padrão é usar o mesmo nome, mas pode mudar para "salvar produto", por exemplo
Route::post('/produtos/cadastrar','ProductController@create');


//valor opcional de id
Route::get('/produtos/atualizar/{id?}','ProductController@viewFormUpdate');
//não precisa de id pq foi enviado pelo input hidden
Route::post('/produtos/atualizar','ProductController@update');


Route::get('/produtos', 'ProductController@viewAllProducts');


Route::get('/produtos/deletar/{id?}', 'ProductController@delete');

