<?php
Route::get('/', function () {
    return view('inicio');
});

Route::get('inicio', function () {
    return view('inicio');
});

Route::get('/teste', function () {
    return view('teste');
});

Route::post('atualiza', 'SacolaController@atualiza');
Route::get('sacola', 'SacolaController@busca');
Route::post('adiciona', 'OperadorController@adiciona');
Route::get('operador', 'OperadorController@busca');
Route::get('excluir', 'OperadorController@excluir');
Route::get('busca', 'SacolaController@buscaData');
Route::get('atualizas', 'SacolaController@atualizas');
Route::post('atualizacao', 'SacolaController@atualizacao');
Route::get('buscaGeral', 'SacolaController@buscaGeral');


