<h1>แก้ไขสินค้า</h1>
<form action="?r=admin/product/update&id=<?= $model->id ?>" method="post">

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
    <input type="text" class="form-control" id="type" name="type" placeholder="ประเภทสินค้า" value="<?= $model->type; ?>">
  </div>

  <div class="form-group">
    <label for="image">ภาพสินค้า</label>
    <input type="file" class="form-control" id="image" name="image" placeholder="ภาพสินค้า">
  </div>

  <div class="form-group">
    <label for="supplier">ซื้อมาจาก</label>
    <input type="text" class="form-control" id="supplier" name="supplier" placeholder="ซื้อมาจาก" value="<?= $model->supplier; ?>">
  </div>

  <div class="form-group">
    <label for="price_buy">ราคาซื้อ/หน่วย</label>
    <input type="text" class="form-control" id="price_buy" name="price_buy" placeholder="ราคาซื้อ/หน่วย" value="<?= $model->price_buy; ?>">
  </div>



  <div class="form-group">
    <label for="xxx">Xxx</label>
    <input type="text" class="form-control" id="xxx" name="xxx" placeholder="XXX">
  </div>



  <button type="submit" class="btn btn-primary">Submit</button>
</form>
