<?php
namespace app\controllers;

use Mvc;
use app\models\User;

class SiteController extends \mvc\web\Controller
{
  public function index()
  {
    $model = User::find()->where("username = 'staff'")->orWhere("id = 1")->all();
    return $this->render('site/index', [
      'model' => $model
    ]);
  }
}
