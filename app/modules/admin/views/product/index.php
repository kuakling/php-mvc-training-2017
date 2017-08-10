<h1>รายการสินค้า</h1>
<a href ="?r=admin/product/create" class="btn btn-success">
<i class="glyphicon glyphicon-plus"></i>
  เพิ่มสินค้า
</a>
<table class="table table-striped">
   <thead>
      <tr>
         <th>รหัส</th>
         <th>ชื่อสินค้า</th>
         <th>ราคาขาย</th>
         <th>คงเหลือ</th>
         <th>Action</th>
      </tr>
   </thead>
   <tbody>
     <?php foreach ($model as $key => $product) : ?>
      <tr>
         <th scope="row"><?php echo $product->id; ?></th>
         <td><?php echo $product->name; ?></td>
         <td><?php echo $product->price; ?></td>
         <td><?php echo $product->qty; ?></td>
         <td>
           <a href="?r=admin/product/update&id=<?= $product->id; ?>"><i class="glyphicon glyphicon-pencil"></i></a>
           <a href="?r=admin/product/delete&id=<?= $product->id; ?>" onClick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></a>
         </td>
      </tr>
    <?php endforeach ?>
   </tbody>
</table>
