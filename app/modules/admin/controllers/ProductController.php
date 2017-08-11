<?php
namespace app\modules\admin\controllers;

use app\models\Product;
use Mvc;

class ProductController extends \mvc\web\Controller
{
  public function actionIndex($page=1)
  {
  	$currentPage = $page;
  	$page--;
  	$pageSize = 3;
  	$pageOffset = $pageSize * $page;

  	$product = Product::find()
    	// ->select(['id', 'name'])
    	->limit($pageSize)
    	->offset($pageOffset)
    	->orderBy('id', 'DESC');

    $model = $product->all();
    $rowsCount = $product->count();
    $pages = ceil($rowsCount/$pageSize);
    return $this->render('index', [
      'model' => $model,
      'currentPage' => intval($currentPage),
      'pages' => intval($pages)
    ]);
  }

  public function actionCreate()
  {
    $model = new Product();
    if($_POST) {
      $model->load($_POST);
      if($model->upload()){
        $model->save();
        header( "location: ?r=admin/product/index" );
      }
      exit(0);
    }else{
      $this->render('create', [
        'model' => $model
      ]);
    }
  }

  public function actionUpdate($id)
  {
    $model = Product::find()->where("id = ".$id)->one();
    if($_POST) {
      $model->load($_POST);
      if($model->upload()){
        $model->save();
        header( "location: ?r=admin/product/update&id=".$id );
      }
      exit(0);
    }else{
      $this->render('update', [
        'model' => $model
      ]);
    }
  }

  public function actionDelete($id)
  {
    $model = Product::find()->where("id = ".$id)->one();
    $model->delete();
    header( "location: ?r=admin/product/index" );
  }
}

 ?>
