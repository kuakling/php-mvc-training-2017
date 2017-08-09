<?php
namespace app\controllers;

use Mvc;
use app\models\User;

class SiteController extends \mvc\web\Controller
{

  public function actionIndex()
  {
    $model = User::find()->all();
    return $this->render('site/index', [
      'model' => $model
    ]);
  }

  public function test()
  {

  }
}
