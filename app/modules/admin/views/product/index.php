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
         <th>ประเภท</th>
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
         <td><?php echo $product->tbType->type_name; ?></td>
         <td>
           <a href="?r=admin/product/update&id=<?= $product->id; ?>"><i class="glyphicon glyphicon-pencil"></i></a>
           <a href="?r=admin/product/delete&id=<?= $product->id; ?>" onClick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></a>
         </td>
      </tr>
    <?php endforeach ?>
   </tbody>
</table>

<?php 
$pageLink = '?r=admin/product/index&page='; 
$pagePrev = ($currentPage === 1) ? $pageLink.'1' : $pageLink.($currentPage - 1);
$pageNext = ($currentPage === $pages) ? $pageLink.$pages : $pageLink.($currentPage + 1);
?>
<nav aria-label="Page navigation">
  <ul class="pagination">
    <li<?= ($currentPage === 1) ? ' class="disabled"' : ''; ?>>
      <a href="<?= $pagePrev; ?>" aria-label="Previous"<?= ($currentPage === 1) ? ' onClick="return false;"' : ''; ?>>
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php for($i=1; $i<=$pages; $i++) : ?>
    <li<?= ($currentPage === $i) ? ' class="active"' : ''; ?>>
      <a href="<?=$pageLink.$i?>"<?= ($currentPage === $i) ? ' onClick="return false;"' : ''; ?>><?= $i; ?></a>
    </li>
    <?php endfor; ?>
    <li<?= ($currentPage === $pages) ? ' class="disabled"' : ''; ?>>
      <a href="<?=$pageNext?>" aria-label="Next"<?= ($currentPage === $pages) ? ' onClick="return false;"' : ''; ?>>
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
<?php
// echo "currentPage = $currentPage <br />";
// echo "Pages = $pages"
?>