
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <?php $this->head(); ?>
    <title>Admin Page</title>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?r=admin/product/index">Admin</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container" style="margin-top: 50px; padding-top: 20px;">

        <div class="row">

            <div class="col-md-3">
              <?php
                $menus = [
                  ['label' => 'สินค้า', 'link' => 'admin/product/index'],
                  ['label' => 'ประเภทสินค้า', 'link' => 'admin/producttype/index'],
                  ['label' => 'คู่ค้า', 'link' => 'admin/supplier/index'],
                  ['label' => 'การสั่งซื้อ', 'link' => 'admin/orders/index'],
                  ['label' => 'การจัดส่งสินค้า', 'link' => 'admin/tracking/index'],
                  ['label' => 'ผู้ใช้ระบบ', 'link' => 'admin/user/index'],
                ];
              ?>
                <!-- <p class="lead">Shop Name</p> -->
                <div class="list-group">
                  <?php $route = Mvc::$app->route; ?>
                  <?php foreach ($menus as $key => $menu) : ?>
                    <?php
                      $exp = explode('/', $menu['link']);
                      $cls = '';
                      if($exp[0] === $route['module'] && $exp[1] === $route['controller']){
                        $cls = ' active';
                      }
                    ?>
                  <a href="?r=<?=$menu['link']?>" class="list-group-item<?=$cls;?>"><?=$menu['label']?></a>
                  <?php endforeach; ?>
                </div>
            </div>

            <div class="col-md-9">
							<?php echo $content; ?>
            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <script src="assets/jquery-3.2.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <?php $this->endBody() ?>
</body>

</html>
