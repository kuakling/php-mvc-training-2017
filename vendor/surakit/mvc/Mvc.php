<?php

class Mvc
{
  public static $app;

  public $config = [];

  public $layoutPath = null;

  public $layoutFile = 'main';

  public static function autoload($className)
  {
    $app = new static;
    $app::$app = null;
    $app->config = require(__DIR__ . '/../../../app/config/main.php');
    $app->setLayout();
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

  public function setLayout()
  {
    if($this->layoutPath === null){
      // echo 'sldkgjdklgjdlkfjgkldf<hr />';
      $this->layoutPath = $this->config['layout']['path'];
    }
    // if(array_key_exists('file', $layout)){
    //   $this->layoutFile = $layout['file'].'.php';
    // }else{
    //   $this->layoutFile = $this->config['layout']['file'].'.php';
    // }
  }
}


spl_autoload_register(['Mvc', 'autoload'], true, true);
