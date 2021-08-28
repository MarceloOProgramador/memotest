<?php declare(strict_types=1);

namespace App\Models;

use Mcldb\Classes\Create;
use Mcldb\Classes\Delete;
use Mcldb\Classes\Read;
use Mcldb\Classes\Update;
use PDOException;

class Produto {

    public function all() : array
    {
      $read = new Read();
      $datas = $read->toRead("venda_produtos")->fetch();
      return $datas;
    }

    public function save(array $datas) : bool
    {
      $create = new Create(); 

      try{
        $create->toCreate("venda_produtos", $datas);
        $create->exec();
      }catch(PDOException $ex){
        throw new PDOException($ex->getMessage(), $ex->getCode());
        return false;
      }
      
      return true;
    }

    public function update(array $datas, $id) : bool
    {
      $update = new Update();
      
      try
      {
        $update->toUpdate("venda_produtos", $datas)->where("id", "=", "{$id}");
        $update->exec();
      }catch(PDOException $ex)
      {
        throw new PDOException($ex->getMessage(), $ex->getCode());
        return false;
      }

      return true;
    }

    public function delete(int $id):bool
    {
      $delete = new Delete();

      try{

        $delete->toDelete("venda_produtos")->where("id", "=", "{$id}");
        $delete->exec();      

      }catch(PDOException $ex){
        throw new PDOException($ex->getMessage(), $ex->getCode());
        return false;
      }
      return true;
    }

}