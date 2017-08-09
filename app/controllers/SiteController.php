<?php
namespace app\controllers;

use Mvc;
use app\models\User;

class SiteController extends \mvc\web\Controller
{

  public function actionIndex()
  {
    //select * from user where username="staff" or id = 1
    $model = User::find()->where("username = 'staff'")->orWhere('id = 1')->all();
    return $this->render('site/index', [
      'model' => $model
    ]);
  }

  public function test()
  {

  }
}
