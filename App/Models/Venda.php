<?php declare(strict_types=1);

namespace App\Models;

use Mcldb\Classes\Create;
use Mcldb\Classes\Delete;
use Mcldb\Classes\Read;
use Mcldb\Classes\Update;
use PDOException;

class Venda {

  protected $table = "venda";
  public $last_inserted_id;

  public function all() : array
  {
    $read = new Read();
    $sellers = array();

    $sellers = $read->toRead($this->table)->fetch();
    
    return $sellers;
  }

  public function save(array $datas):bool
  {
    $create = new Create();
    
    try{
      $create->toCreate($this->table, $datas);
      $create->exec();
      $this->last_inserted_id = $create->getInstance()->lastInsertId();
    }catch(PDOException $ex){
      throw new PDOException($ex->getMessage(), $ex->getCode());
      return false;
    }

    return true;
  }

  public function update(array $datas, int $id):bool
  {
    $update = new Update();

    try{
      $update->toUpdate($this->table, $datas)->where("id", "=", "{$id}");
      $update->exec();
    }catch(PDOException $ex){
      throw new PDOException($ex->getMessage(), $ex->getCode());
      return false;
    }

    return true;
  }

  public function delete(int $id):bool
  {
    $delete = new Delete();
    try{
      $delete->toDelete($this->table)->where("id", "=", "{$id}");
      $delete->exec();
    }catch(PDOException $ex){
      throw new PDOException($ex->getMessage(), $ex->getCode());
      return false;
    }

    return true;
  } 
}