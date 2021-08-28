<?php

include_once("./vendor/autoload.php");

use CoffeeCode\Router\Router;

$route = new Router("http://localhost/memocash");

$route->namespace("App\Controllers");
$route->group(null);
$route->get("/", "SellersController:index");
$route->get("/vendas", "SalesController:index");

//API ROUTES
$route->namespace("App\Controllers\API")->group("api");

//SALES ROUTE API
$route->get("/vendas", "VendasController:index");

//Produtos ROUTE API
$route->get("/produtos", "ProdutosController:index");
$route->post("/produtos", "ProdutosController:store");
$route->dispatch();