<?php

use App\Controllers\ProdutosController;
use PHPUnit\Framework\TestCase;

final class ProdutoTest extends TestCase
{
  
    public function testIndex() : void
    {
        $produto_controller = new ProdutosController();
        $datas = $produto_controller->index();
        $this->assertNotNull($datas);
    }

    public function testStore():void
    {
        $produto_controller = new ProdutosController();
        
        $venda_produto = [
            "id_venda" => 1,
            "nome" => "Nescal",
            "valor" => "4.00",
            "quantidade" => "3.00"
        ];
        $datas = $produto_controller->store($venda_produto);
        var_dump($datas);
        die;

    }

    public function testUpdate():void
    {
        $id = 1;
        $produto_controller = new ProdutosController();
        $venda_produto = [
            "id_venda" => 1,
            "nome" => "Toddy 500g",
            "valor" => "5.50",
            "quantidade" => "4.00"
        ];

        $response = $produto_controller->update($venda_produto, $id);
        var_dump($response);
        die;
    }

}
