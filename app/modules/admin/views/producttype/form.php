<form method="post" id="from-product-type">
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

<?php
$this->registerJs("check-form", "
$( \"#from-product-type\" ).submit(function( e ) {
  if($(\"#type_name\").val() == ''){
    alert('อย่าใส่ค่าว่างสิ');
    return false;
  }
});
");
 ?>
