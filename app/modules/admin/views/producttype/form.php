<form method="post">
  <div class="form-group">
    <label for="name">ชื่อประเภทสินค้า</label>
    <input
      type="text"
      class="form-control"
      id="type_name"
      name="type_name"
      placeholder="ชื่อประเภทสินค้า"
      value="<?= $model->type_name; ?>"
    >
  </div>

  <button type="submit" class="btn btn-primary">
    <i class="glyphicon glyphicon-ok"></i> 
    บันทึก
  </button>
</form>
