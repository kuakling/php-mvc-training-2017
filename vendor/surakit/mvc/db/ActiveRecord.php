<?php
namespace mvc\db;

use Mvc;
use PDO;
/**
 *
 */
class ActiveRecord
{
  public static function find()
  {
    $conn = Mvc::$app->getDb();
    $sql = "select * from ".static::tabelName();
    $sth = $conn->prepare($sql);
    $sth->execute();
    $red = $sth->fetchAll(PDO::FETCH_OBJ);

    return $red;
  }
}
