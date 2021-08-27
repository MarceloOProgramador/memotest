<?php declare(strict_types=1);

namespace App\Controllers;

use App\Models\Venda;

class VendasController
{
    public function index()
    {
        $sale = new Venda();
        $sales = $sale->all();
        
        return json_encode($sales);
    }

    public function show($id)
    {

        return;
    }

    public function store($datas)
    {
        $sale = new Venda();
        $stored = false;
        
        $stored = $sale->save($datas);

        if(!$stored){
            http_response_code(500);
            return json_encode(["error" => "Erro ao cadastrar, tente novamente!"]);
        }

        return json_encode(["success" => "Sucesso ao cadastrar!"]);
    }

    public function update($datas, $id)
    {
        $sale = new Venda();
        $updated = false;

        $updated = $sale->update($datas, $id);

        if(!$updated){
            http_response_code(500);
            return json_encode(["error" => "Erro ao atualizar, tente novamente!"]);
        }

        return json_encode(["success" => "Sucesso ao atualizar!"]);
    }

    public function delete($id)
    {
        $sale = new Venda();
        $deleted = false;

        $deleted = $sale->delete($id);

        if(!$deleted){
            http_response_code(500);
            return json_encode(["error" => "Erro ao deletar, tente novamente!"]);
        }

        return json_encode(["success" => "Sucesso ao deletar!"]);
    }
}