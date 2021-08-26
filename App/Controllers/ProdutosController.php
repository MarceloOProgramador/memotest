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

        if($stored){
            http_response_code(200);
            return json_encode(["success" => "Cadastro realizado com sucesso!"]);
        }else{
            http_response_code(500);
            return json_encode(["error" => "Erro: cadastro não realizado, tente novamente!"]);
        }
    }

    public function update($datas, $id)
    {
        return;
    }

    public function delete($id)
    {

        return;
    }
}