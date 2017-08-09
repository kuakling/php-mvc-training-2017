<?php
namespace app\controllers;

use Mvc;
use app\models\User;

class SiteController extends \mvc\web\Controller
{
  public function index()
  {
    $model = User::find();
    return $this->render('site/index', [
      'model' => $model
    ]);
  }
}
