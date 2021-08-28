<?php declare(strict_types=1);

namespace App\Controllers;

use League\Plates\Engine;

class SellersController
{
    public $view;

    public function __construct()
    {
        $this->view = Engine::create("Views", "php");
    }

    public function index()
    {        
        echo $this->view->render("sellers", [
            "title" => "Vendores",
        ]);
    }    
}