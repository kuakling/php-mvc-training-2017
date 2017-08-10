<?php
use app\models\ProductType;
use app\models\Supplier;

$productType = ProductType::find()->all();
$supplier = Supplier::find()->all();
 ?>
<?php
$url = $model->isNewRecord ? '?r=admin/product/create' : '?r=admin/product/update&id='.$model->id;
?>
<h2><?= $model->isNewRecord ? 'เพิ่มสินค้า' : 'แก้ไขสินค้า' ?></h2>
<form action="<?=$url?>" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="name">ชื่อสินค้า</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="ชื่อสินค้า" value="<?= $model->name; ?>">
  </div>

  <div class="form-group">
    <label for="detail">รายละเอียดสินค้า</label>
    <textarea class="form-control" id="detail" name="detail" placeholder="รายละเอียดสินค้า"><?= $model->detail; ?></textarea>
  </div>

  <div class="form-group">
    <label for="price">ราคาขาย/หน่วย</label>
    <input type="text" class="form-control" name="price" id="price" placeholder="ราคาขาย/หน่วย" value="<?= $model->price; ?>">
  </div>

  <div class="form-group">
    <label for="qty">คงเหลือ</label>
    <input type="text" class="form-control" name="qty" id="qty" placeholder="คงเหลือ" value="<?= $model->qty; ?>">
  </div>

  <div class="form-group">
    <label for="size">ขนาด</label>
    <input type="text" class="form-control" id="size" name="size" placeholder="ขนาด" value="<?= $model->size; ?>">
  </div>

  <div class="form-group">
    <label for="type">ประเภทสินค้า</label>
    <select class="form-control" id="type" name="type">
      <?php foreach ($productType as $key => $type) : ?>
      <option value="<?=$type->id?>" <?=($model->type == $type->id) ? ' selected': ''?>><?=$type->type_name?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group">
    <?php if($model->image) : ?>
    <img src="/php-mvc/public/uploads/product_images/<?=$model->image?>" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
    <br />
    <?php endif; ?>
    <label for="image">ภาพสินค้า</label>
    <input type="file" class="form-control" id="image" name="image" placeholder="ภาพสินค้า">
  </div>

  <div class="form-group">
    <label for="supplier">ซื้อมาจาก</label>
    <select class="form-control" id="supplier" name="supplier">
      <?php foreach ($supplier as $key => $sp) : ?>
      <option value="<?=$sp->id?>" <?=($model->supplier == $sp->id) ? ' selected': ''?>><?=$sp->supplier_name?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group">
    <label for="price_buy">ราคาซื้อ/หน่วย</label>
    <input type="text" class="form-control" id="price_buy" name="price_buy" placeholder="ราคาซื้อ/หน่วย" value="<?= $model->price_buy; ?>">
  </div>



  <button type="submit" class="btn btn-primary">Submit</button>
</form>
