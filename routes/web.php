<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$router->group(['prefix' => 'api/sistema'], function () use ($router){
    $router->get('/', 'SistemaController@pesquisar');
    $router->post('/', 'SistemaController@inserir');
    $router->put('/{id}', 'SistemaController@alterar');
    $router->get('/{id}', 'SistemaController@exibir');
});



$router->get('/', function () use ($router) {
    return $router->app->version();
});
