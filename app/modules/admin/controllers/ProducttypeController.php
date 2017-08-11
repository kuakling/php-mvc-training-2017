<?php
namespace app\modules\admin\controllers;

use app\models\ProductType;

class ProducttypeController extends \mvc\web\Controller
{

  public function actionIndex()
  {
    $model = ProductType::find()->all();

    return $this->render('index', [
      'model' => $model
    ]);
  }

}


?>
