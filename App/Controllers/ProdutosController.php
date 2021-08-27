<?php declare(strict_types=1);

namespace App\Controllers;

use App\Models\Produto;

class ProdutosController
{
    public function index()
    {
        $produto = new Produto();
        $produtos = $produto->all();
        return json_encode($produtos);
    }

    public function show($id)
    {
         
        return;
    }

    public function store($datas)
    {
        $produto = new Produto();
        $stored = false;

        $stored = $produto->save($datas);

        if(!$stored){
            http_response_code(500);
            return json_encode(["error" => "Erro ao cadastrar, tente novamente!"]);
        }

        http_response_code(200);
        return json_encode(["success" => "Sucesso ao cadastrar!"]);
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
        return;
    }
}