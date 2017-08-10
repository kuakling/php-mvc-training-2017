<?php
namespace app\models;
/**
 *
 */
class Product extends \mvc\db\ActiveRecord
{
  public static function tableName()
  {
    return 'product';
  }

  public function upload()
  {
    if($_FILES){
      $uploads_dir = realpath(__DIR__ . '/../../').'/public/uploads/product_images';
      if(!is_dir($uploads_dir)){
        mkdir($uploads_dir, 0777, true);
      }
      if($_FILES['image']['error'] === 0){
        $tmp_name = $_FILES["image"]["tmp_name"];
        $name = time().'_'.basename($_FILES['image']['name']);
        if(move_uploaded_file($tmp_name, "$uploads_dir/$name")){
          if($this->image){
            unlink("$uploads_dir/$this->image");
          }
          $this->image = $name;
          return true;
        }else{
          return false;
        }
      }
    }
    return true;
  }
}

 ?>
