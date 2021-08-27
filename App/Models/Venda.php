<?php declare(strict_types=1);

namespace App\Models;

use Mcldb\Classes\Create;
use Mcldb\Classes\Read;
use PDOException;

class Venda {

  protected $table = "venda";

  public function all()
  {
    $read = new Read();
    $sellers = array();

    $sellers = $read->toRead($this->table)->fetch();
    
    return json_encode($sellers);
  }

  public function save($datas):bool
  {
    $create = new Create();
    
    try{
      $create->toCreate($this->table, $datas);
      $create->exec();
    }catch(PDOException $ex){
      throw new PDOException($ex->getMessage(), $ex->getCode());
      return false;
    }
    return true;
  }

  public function update():bool
  {

    return true;
  }

  public function delete():bool
  {

    return true;
  } 
}