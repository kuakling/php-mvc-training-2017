<?php
namespace app\modules\admin\controllers;

use app\models\Supplier;

class SupplierController extends \mvc\web\Controller
{

  public function actionIndex()
  {
    $model = Supplier::find()->all();

    return $this->render('index', [
      'model' => $model
    ]);
  }

  public function actionCreate()
  {
    $model = new Supplier();

    if($_POST) {
      $model->load($_POST);
      $model->save();
      header( "location: ?r=admin/supplier/index" );
      exit(0);
    }else{
      return $this->render('form', [
        'model' => $model
      ]);
    }
  }

  public function actionUpdate($id)
  {
    $model = Supplier::find()->where("id = ".$id)->one();
    if($_POST) {
      $model->load($_POST);
      $model->save();
      header( "location: ?r=admin/supplier/update&id=".$id );
      exit(0);
    }else{
      $this->render('form', [
        'model' => $model
      ]);
    }
  }

  public function actionDelete($id)
  {
    $model = Supplier::find()->where("id = ".$id)->one();
    $model->delete();
    header( "location: ?r=admin/supplier/index" );
  }

}


?>
