<?php

use DI\Container;
use Psr\Container\ContainerInterface;
use TurboPancake\Services\Session\Lithium;
use TurboPancake\Services\Session\SessionInterface;

return [

    PDO::class => function (ContainerInterface $c) {
        $pdo = new PDO(
            "pgsql:host={$c->get('database.host')};port=3306;dbname={$c->get('database.dbname')};charset=UTF8",
            $c->get('database.username'),
            $c->get('database.password'),
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $pdo;
    },
    SessionInterface::class => \DI\autowire(Lithium::class)

];

