<h1>รายการคู่ค้า</h1>
<a href ="?r=admin/supplier/create" class="btn btn-success">
<i class="glyphicon glyphicon-plus"></i>
  เพิ่มคู่ค้า
</a>
<table class="table table-striped">
   <thead>
      <tr>
         <th style="width: 50px;">รหัส</th>
         <th>ชื่อคู่ค้า</th>
         <th>ที่อยู่</th>
         <th>เบอร์โทรศัพท์</th>
         <th style="width: 50px;">Action</th>
      </tr>
   </thead>
   <tbody>
     <?php foreach ($model as $key => $type) : ?>
      <tr>
         <th scope="row"><?php echo $type->id; ?></th>
         <td><?php echo $type->supplier_name; ?></td>
         <td><?php echo $type->address; ?></td>
         <td><?php echo $type->telephone; ?></td>
         <td>
           <a href="?r=admin/supplier/update&id=<?= $type->id; ?>"><i class="glyphicon glyphicon-pencil"></i></a>
           <a href="?r=admin/supplier/delete&id=<?= $type->id; ?>" onClick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></a>
         </td>
      </tr> 
    <?php endforeach ?>
   </tbody>
</table>
