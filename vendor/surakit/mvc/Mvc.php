<?php

class Mvc
{
  public static $app;

  public $config = [];

  public static function autoload($className)
  {
    $app = new static;
    $app::$app = null;
    $app->config = require(__DIR__ . '/../../../app/config/main.php');
    static::$app = $app;
  }

  public function getVersion()
  {
    return '0.0.1';
  }

  public function getDb()
  {
    $conn = new \mvc\db\Connection($this->config);
    return $conn;
  }
}


spl_autoload_register(['Mvc', 'autoload'], true, true);
