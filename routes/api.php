<?php

// Route::get('clientes', 'Api\ClienteApiController@index');
// Route::post('clientes', 'Api\ClienteApiController@store');

$this->get('clientes/{id}/documento', 'Api\ClienteApiController@documento');
$this->get('clientes/{id}/telefone', 'Api\ClienteApiController@telefone');
$this->apiResource('clientes', 'Api\ClienteApiController');

$this->get('documento/{id}/cliente', 'Api\DocumentoApiController@cliente');
$this->apiResource('documento', 'Api\DocumentoApiController');

$this->get('telefone/{id}/cliente', 'Api\TelefoneApiController@cliente');
$this->apiResource('telefone', 'Api\TelefoneApiController');