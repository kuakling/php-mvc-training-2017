<?php
namespace mvc\db;

use PDO;
use Mvc;

/**
 *
 */
class Connection
{
  public $pdo;

  public $dsn;

  public $username;

  public $password;

  public $charset;

  function __construct($config)
  {
    $configDb = $config['db'];
    $this->dsn = $configDb['dsn'];
    $this->username = $configDb['username'];
    $this->password = $configDb['password'];
    $this->charset = $configDb['charset'];

    // print_r($configDb);
    $this->connect();
  }

  private function connect()
  {
    try {
      $this->pdo = new PDO($this->dsn, $this->username, $this->password);
      $this->pdo->exec("SET CHARECTOR SET " . $this->charset);
    } catch(PDOException $e) {
      echo $e->getMessage();
    }
  }
}
