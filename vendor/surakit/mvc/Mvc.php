<?php

class BaseMvc
{
  public static $app;

  public static $classMap = [];

  public $config = [];

  public $layoutPath = null;

  public $layoutFile = 'main';

  public static function autoload($className)
  {
    if(static::$app === null){
      $app = new static;
      $app::$app = null;
      $app->config = require(__DIR__ . '/../../../app/config/main.php');
      static::$app = $app;
    }
    static::$app->setLayout();
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
      $this->layoutPath = $this->config['layout']['path'];
      // echo 'setLayout() '.$this->layoutPath.'<hr />';
    }
    // if(array_key_exists('file', $layout)){
    //   $this->layoutFile = $layout['file'].'.php';
    // }else{
    //   $this->layoutFile = $this->config['layout']['file'].'.php';
    // }
  }
}

class Mvc extends BaseMvc
{

}


spl_autoload_register(['Mvc', 'autoload'], true, true);
