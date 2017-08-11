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

  public function actionCreate()
  {
    $model = new ProductType();

    if($_POST) {
      $model->load($_POST);
      $model->save();
      header( "location: ?r=admin/producttype/index" );
      exit(0);
    }else{
      return $this->render('form', [
        'model' => $model
      ]);
    }
  }

  public function actionUpdate($id)
  {
    $model = ProductType::find()->where("id = ".$id)->one();
    if($_POST) {
      $model->load($_POST);
      $model->save();
      header( "location: ?r=admin/producttype/update&id=".$id );
      exit(0);
    }else{
      $this->render('form', [
        'model' => $model
      ]);
    }
  }

  public function actionDelete($id)
  {
    $model = ProductType::find()->where("id = ".$id)->one();
    $model->delete();
    header( "location: ?r=admin/producttype/index" );
  }

}


?>
