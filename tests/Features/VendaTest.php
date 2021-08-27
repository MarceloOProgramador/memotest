<?php

use App\Controllers\VendasController;
use PHPUnit\Framework\TestCase;

class VendaTest extends TestCase
{
  
  public function testIndex()
  {
    $venda = new VendasController();
    $vendas  = $venda->index();

    var_dump($vendas);
    die;
  }

  public function testStore()
  {
    $sale = new VendasController();
    
    $sale_datas = [
      "vendedor" => "teste 1",
      "data" => "2021-08-27",
      "hora" => "10:00",
      "total" => "5.00"
    ];

    $response = $sale->store($sale_datas);
    var_dump($response);
    die;
  }

}
