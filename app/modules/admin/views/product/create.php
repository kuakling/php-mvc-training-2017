<h1>เพิ่มสินค้า</h1>
<form action="?r=admin/product/create" method="post">

  <div class="form-group">
    <label for="name">ชื่อสินค้า</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="ชื่อสินค้า">
  </div>

  <div class="form-group">
    <label for="detail">รายละเอียดสินค้า</label>
    <textarea class="form-control" id="detail" name="detail" placeholder="รายละเอียดสินค้า"></textarea>
  </div>

  <div class="form-group">
    <label for="price">ราคาขาย/หน่วย</label>
    <input type="text" class="form-control" name="price" id="price" placeholder="ราคาขาย/หน่วย">
  </div>

  <div class="form-group">
    <label for="qty">คงเหลือ</label>
    <input type="text" class="form-control" name="qty" id="qty" placeholder="คงเหลือ">
  </div>

  <div class="form-group">
    <label for="size">ขนาด</label>
    <input type="text" class="form-control" id="size" name="size" placeholder="ขนาด">
  </div>

  <div class="form-group">
    <label for="type">ประเภทสินค้า</label>
    <input type="text" class="form-control" id="type" name="type" placeholder="ประเภทสินค้า">
  </div>

  <div class="form-group">
    <label for="image">ภาพสินค้า</label>
    <input type="file" class="form-control" id="image" name="image" placeholder="ภาพสินค้า">
  </div>

  <div class="form-group">
    <label for="supplier">ซื้อมาจาก</label>
    <input type="text" class="form-control" id="supplier" name="supplier" placeholder="ซื้อมาจาก">
  </div>

  <div class="form-group">
    <label for="price_buy">ราคาซื้อ/หน่วย</label>
    <input type="text" class="form-control" id="price_buy" name="price_buy" placeholder="ราคาซื้อ/หน่วย">
  </div>



  <div class="form-group">
    <label for="xxx">Xxx</label>
    <input type="text" class="form-control" id="xxx" name="xxx" placeholder="XXX">
  </div>



  <button type="submit" class="btn btn-primary">Submit</button>
</form>
