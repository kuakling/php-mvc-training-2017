<?php
namespace mvc\web;

use Mvc;

class Module
{
  public $layoutPath = null;

  public $layoutFile = 'main';
  
  public function __construct($options)
  {
    $this->init();
    $this->bootstrap();
  }

  public function init()
  {
  	// echo Mvc::$app->layoutPath;
  }

  public function bootstrap($options=[])
  {
  	Mvc::$app->layoutPath = $this->layoutPath;
  }
}
