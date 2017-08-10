<?php
namespace app\modules\admin\controllers;

use app\models\Product;
use Mvc;

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
