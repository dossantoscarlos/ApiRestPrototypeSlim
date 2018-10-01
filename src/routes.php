<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes
$app->get('/pessoas', \App\Http\Controllers\PessoasController::class.':show');

$app->post('/pessoas', \App\Http\Controllers\PessoasController::class.':create');

$app->put('/pessoas/{id}/', \App\Http\Controllers\PessoasController::class.':update');

$app->delete('/pessoas/{id}', \App\Http\Controllers\PessoasController::class.':drop');

// $app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
//     $handler = $this->notFoundHandler; // handle using the default Slim page not found handler
//     return $handler($req, $res);
// });


