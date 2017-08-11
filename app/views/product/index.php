
<div class="row">
<?php foreach ($model as $product) : ?>
  <div class="col-md-4">
    <div class="thumbnail">
      <img src="uploads/product_images/<?php echo $product->image; ?>" alt="...">
      <div class="caption">
        <h3><?php echo $product->name; ?></h3>
        <p><?php echo $product->detail; ?></p>
        <p><a href="#" class="btn btn-primary" role="button">หยิบใส่ตะกร้า</a></p>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>
