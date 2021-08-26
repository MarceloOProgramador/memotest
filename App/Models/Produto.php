<?php declare(strict_types=1);

namespace App\Models;

use Mcldb\Classes\Create;
use Mcldb\Classes\Read;
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
          return true;
        }catch(PDOException $ex){
          throw new PDOException($ex->getMessage(), $ex->getCode());
          return false;
        }
    }

}