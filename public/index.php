<?php

chdir(dirname(__DIR__));

require_once 'vendor/autoload.php';

$container = (new App\Factories\ContainerFactory)();

$strategy = (new App\Strategies\FancyStrategy())->setContainer($container);
$router   = (new League\Route\Router)->setStrategy($strategy);

$router->middlewares(App\array_resolve([
    App\Middlewares\HttpsMiddleware::class,
    App\Middlewares\TralingSlashMiddleware::class,
    App\Middlewares\MethodDetectorMiddleware::class,
], $container));

//Run
$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals();
$response = $router->dispatch($request);
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);
