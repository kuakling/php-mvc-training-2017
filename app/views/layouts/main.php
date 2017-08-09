<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>My e-Commerce</title>
  </head>
  <body>
    <header style="margin-bottom: 20px">
      <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">my e-Commerce</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active">
                <a href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li><a href="#">Product</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Login</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
      <div class="row" style="background-color: brown; color:white; height: 100px;">
        <div class="container">
          <h1>My e-Commerce</h1>
        </div>
      </div>
    </header>

    <div class="container">
      <div class="row">
        <div class="col-sm-3" style="border: #ddd 1px solid">
          menu
        </div>
        <div class="col-sm-9">
          <?= $content; ?>
        </div>
      </div>
    </div>

    <footer>
      Power by Comm-Sci ICT
    </footer>

    <script src="assets/jquery-3.2.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
