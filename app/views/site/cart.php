<h1>ตะกร้าสินค้า</h1>
<table class="table table-striped">
   <thead>
      <tr>
         <th style="width: 50px;">รหัส</th>
         <th>ชื่อสินค้า</th>
         <th>จำนวน</th>
         <th class="text-right">ราคา</th>
         <th class="text-right">ราคารวม</th>
         <th style="width: 50px;">Action</th>
      </tr>
   </thead>
   <tbody>
     <?php $total = 0; ?>
     <?php foreach ($_SESSION['cart'] as $productId => $cart) : ?>
       <?php
       $sum = $cart['amount'] * $cart['price'];
       $total += $sum;
       ?>
      <tr>
         <th scope="row"><?php echo $productId; ?></th>
         <td><?php echo $cart['name']; ?></td>
         <td><?php echo $cart['amount']; ?></td>
         <td class="text-right"><?php echo number_format($cart['price'], 0, '.', ','); ?></td>
         <td class="text-right"><?php echo number_format($sum, 0, '.', ','); ?></td>
         <td>
           <a href="?r=site/cartdel&id=<?= $productId; ?>" onClick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></a>
         </td>
      </tr>
    <?php endforeach ?>
   </tbody>
   <footer>
     <tr  class="danger">
       <td colspan="4" class="text-right">Total.</td>
       <td class="text-right"><?= number_format($total, 0, '.', ',')?></td>
       <td></td>
     </tr>
   </footer>
</table>
<a href="?r=site/cartsubmit" class="btn btn-primary" >ยืนยันการสั่งซื้อ</a>
