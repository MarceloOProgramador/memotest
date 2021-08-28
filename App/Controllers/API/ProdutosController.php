<?php declare(strict_types=1);

namespace App\Controllers\API;

use App\Models\Produto;
use App\Models\Venda;

class ProdutosController
{
    public function index()
    {
        $produto = new Produto();
        $produtos = $produto->all();
        
        echo json_encode($produtos);
    }

    public function store()
    {
        $products = filter_input(INPUT_POST, "products", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        $seller = [
            "vendedor" => filter_input(INPUT_POST, "vendedor", FILTER_DEFAULT),
            "total" => filter_input(INPUT_POST, "total", FILTER_DEFAULT),
            "data" => date("Y-m-d"),
            "hora" => date("h:i:s")
        ];
        $stored = false;
        $product = new Produto();
        $sale = new Venda();

        $stored = $sale->save($seller);

        if(!$stored){
            http_response_code(500);
            echo json_encode(["error" => "Erro ao cadastrar vendedor, tente novamente!"]);
            return;
        }
        
        foreach($products as $prod)
        {
            $prod["id_venda"] = $sale->last_inserted_id;
            $stored = $product->save($prod);
    
            if(!$stored){
                http_response_code(500);
                echo json_encode(["error" => "Erro ao cadastrar, tente novamente!"]);
                return;
            }
        }      
    
        http_response_code(200);
        echo json_encode(["success" => "Sucesso ao cadastrar!"]);   
    }

    public function update($datas, $id)
    {
        $produto = new Produto();
        $updated = false;

        $updated = $produto->update($datas, $id);

        if(!$updated){
            http_response_code(500);
            return json_encode(["error" => "Erro ao atualizar, tente novamente!"]);
        }

        http_response_code(200);
        return json_encode(["success" => "Sucesso ao atualizar!"]);
    }

    public function delete($id)
    {
        $produto = new Produto();
        $deleted = false;

        $deleted = $produto->delete($id);

        if(!$deleted){
            http_response_code(500);
            return json_encode(["error" => "Erro ao deletar, tente novamente!"]);
        }

        http_response_code(200);
        return json_encode(["success" => "Sucesso ao deletar!"]);
    }
}