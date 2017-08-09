<?php
namespace mvc\web;

use Mvc;

class Module
{
  public $layoutPath = null;

  public $layoutFile = 'main';
  
  public function __construct()
  {
    $this->init();
  }

  public function init()
  {

  }
}
