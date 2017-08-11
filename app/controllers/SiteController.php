<?php
namespace app\controllers;

use Mvc;
use app\models\Product;
use app\models\Orders;
use app\models\OrdersProduct;

class SiteController extends \mvc\web\Controller
{

  public function actionIndex()
  {
    $modelProduct = Product::find()
      ->orderBy('id', 'DESC')
      ->limit(6)
      ->all();

    return $this->render('index', [
      'modelProduct' => $modelProduct
    ]);
  }

  public function actionCart($id=null)
  {
    if(!isset($_SESSION['cart'])){
      $_SESSION['cart'] = [];
    }

    if($id != null){
      $modelProduct = Product::find()
      ->where('id = '.$id)
      ->one();

      if($modelProduct) {
        $_SESSION['cart'][$modelProduct->id] = [
          'name' => $modelProduct->name,
          'amount' => 1,
          'price' => $modelProduct->price
        ];
      }
    }

    return $this->render('cart');
  }

  public function actionCartdel($id)
  {
    unset($_SESSION['cart'][$id]);
    header( "location: ?r=site/cart" );
  }

  public function actionCartsubmit()
  {
    if(count($_SESSION['cart']) > 0){
      $model = new Orders();
      $data = [
        'date' => Date('Y-m-d h:i:s'),
        'amount' => 999, //fake
        'status' => 0,
        'user_id' => 1 //fake
      ];
      $model->load($data);
      $model->save();

      foreach ($_SESSION['cart'] as $productId => $cart){
        $model2 = new OrdersProduct();
        $data2 = [
          'product_id' => $productId,
          'order_id' => $model->id,
          'qty' => $cart['amount'],
          'price' => $cart['price']
        ];
        $model2->load($data2);
        $model2->save();
      }
      $_SESSION['cart'] = [];
      header( "location: ?r=site/cart" );
    }else{
      $this->render('cart-empty');
    }
  }

}
