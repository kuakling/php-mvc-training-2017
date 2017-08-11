<h1>รายการประเภทสินค้า</h1>
<a href ="?r=admin/producttype/create" class="btn btn-success">
<i class="glyphicon glyphicon-plus"></i>
  เพิ่มประเภทสินค้า
</a>
<table class="table table-striped">
   <thead>
      <tr>
         <th style="width: 50px;">รหัส</th>
         <th>ชื่อประเภท</th>
         <th style="width: 50px;">Action</th>
      </tr>
   </thead>
   <tbody>
     <?php foreach ($model as $key => $type) : ?>
      <tr>
         <th scope="row"><?php echo $type->id; ?></th>
         <td><?php echo $type->type_name; ?></td>
         <td>
           <a href="?r=admin/producttype/update&id=<?= $type->id; ?>"><i class="glyphicon glyphicon-pencil"></i></a>
           <a href="?r=admin/producttype/delete&id=<?= $type->id; ?>" onClick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></a>
         </td>
      </tr>
    <?php endforeach ?>
   </tbody>
</table>
