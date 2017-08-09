<?php
namespace app\modules\admin;

use Mvc;

class AdminModule extends \mvc\web\Module
{
  public function init()
  {
    $this->layoutPath = __DIR__.'/views/layouts';
  }
}
