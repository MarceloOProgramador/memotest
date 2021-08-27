<?php

include_once("./vendor/autoload.php");

use CoffeeCode\Router\Router;

$route = new Router("http://localhost/memocash");

$route->namespace("App\Controllers");
$route->group(null);
$route->get("/", "HomeController:index");

$route->namespace("App\Controllers\API")->group("api");
$route->get("/vendas", "VendasController:index");

$route->dispatch();