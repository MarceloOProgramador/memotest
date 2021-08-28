<?php declare(strict_types=1);

namespace App\Controllers\API;

use App\Models\Venda;

class VendasController
{
    

    public function index()
    {
        $sale = new Venda();
        $sales = $sale->all();
        
        echo json_encode($sales);
    }

    public function store($datas) : bool
    {
        $sale = new Venda();
        $stored = false;
        $datas = [
            "vendedor" => $datas["vendedor"],
            "total" => $datas["total"],
            "data" => date("Y-m-d"),
            "hora" => date("h:m:s")
        ]; 
        
        $stored = $sale->save($datas);
        
        if(!$stored){
            return false;
        }
        
        return true;
    }

    public function update($datas, $id)
    {
        $sale = new Venda();
        $updated = false;

        $updated = $sale->update($datas, $id);

        if(!$updated){
            http_response_code(500);
            echo json_encode(["error" => "Erro ao atualizar, tente novamente!"]);
        }

        echo json_encode(["success" => "Sucesso ao atualizar!"]);
    }

    public function delete($id)
    {
        $sale = new Venda();
        $deleted = false;

        $deleted = $sale->delete($id);

        if(!$deleted){
            http_response_code(500);
            echo json_encode(["error" => "Erro ao deletar, tente novamente!"]);
        }

        echo json_encode(["success" => "Sucesso ao deletar!"]);
    }

    public function search($datas)
    {
        $sales = new Venda();
        $datas = $sales->find($datas["search"]);
        
        echo json_encode($datas);
    }
}