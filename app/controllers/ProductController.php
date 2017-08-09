<?php
namespace app\controllers;

use app\models\Product;

class ProductController extends \mvc\web\Controller
{
  public function actionIndex()
  {
    $model = Product::find()->all();
    return $this->render('index', [
      'model' => $model
    ]);
  }
}

 ?>
