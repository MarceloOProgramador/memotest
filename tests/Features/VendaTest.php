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

  public function testUpdate()
  {
    $id = 4;
    $sale = new VendasController();

    $sale_datas = [
      "vendedor" => "teste Atualizado",
      "data" => "2021-08-28",
      "hora" => "12:00",
      "total" => "10.00"
    ];

    $response = $sale->update($sale_datas, $id);

    var_dump($response);
    die;
  }

  public function testDelete()
  {
    $id = 4;
    $sale = new VendasController();

    $response = $sale->delete($id);

    var_dump($response);
    die;
  }
}
