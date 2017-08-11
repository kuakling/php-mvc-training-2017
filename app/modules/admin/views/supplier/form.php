<form method="post" id="from-product-type">
  <div class="form-group">
    <label for="name">ชื่อคู่ค้า</label>
    <input
      type="text"
      class="form-control"
      id="supplier_name"
      name="supplier_name"
      placeholder="ชื่อคู่ค้า"
      value="<?= $model->supplier_name; ?>"
    >
  </div>
  <div class="form-group">
    <label for="name">ที่อยู่</label>
    <input
      type="text"
      class="form-control"
      id="address"
      name="address"
      placeholder="ที่อยู่"
      value="<?= $model->address; ?>"
    >
  </div>
  <div class="form-group">
    <label for="name">เบอร์โทรศัพท์</label>
    <input
      type="text"
      class="form-control"
      id="telephone"
      name="telephone"
      placeholder="เบอร์โทรศัพท์"
      value="<?= $model->telephone; ?>"
    >
  </div>
  <div class="form-group">
    <label for="name">รายละเอียด</label>
    <input
      type="text"
      class="form-control"
      id="detail"
      name="detail"
      placeholder="รายละเอียด"
      value="<?= $model->detail; ?>"
    >
  </div>

  <button type="submit" class="btn btn-primary">
    <i class="glyphicon glyphicon-ok"></i>
    บันทึก
  </button>
</form>
