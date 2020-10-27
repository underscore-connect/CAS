<?php

chdir(dirname(__DIR__));

require_once 'vendor/autoload.php';

$container = (new App\Factories\ContainerFactory)();

$strategy = (new App\Strategies\FancyStrategy())->setContainer($container);
$router   = (new League\Route\Router)->setStrategy($strategy);

//Run
$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals();
$response = $router->dispatch($request);
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);
