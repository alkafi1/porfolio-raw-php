<?php
session_start();
require 'dashboard_parts/db.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Starlight Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="../porfolio-raw-php/dashboard_assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../porfolio-raw-php/dashboard_assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="../porfolio-raw-php/dashboard_assets/css/starlight.css">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">starlight <span class="tx-info tx-normal">admin</span></div>
        <div class="tx-center mg-b-60">Professional Admin Template Design</div>

        <form action="login_post.php" method="post">
        <div class="form-group">
          <input type="text" class="form-control" name="email" value="<?=(isset($_SESSION['old_email']))?$_SESSION['old_email']:'';unset($_SESSION['old_email'])?>" placeholder="Enter your email">
          <?php if(isset($_SESSION['empty_email'])){?>
            <strong class="text-danger px-2"><?php echo $_SESSION['empty_email'];?></strong>
         <?php }unset($_SESSION['empty_email']); ?>
          <?php if(isset($_SESSION['email_wrong'])){?>
            <strong class="text-danger px-2"><?php echo $_SESSION['email_wrong'];?></strong>
         <?php }unset($_SESSION['email_wrong']); ?>

        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Enter your password">
          <?php if(isset($_SESSION['password_empty'])){?>
            <strong class="text-danger px-2"><?php echo $_SESSION['password_empty'];?></strong>
         <?php }unset($_SESSION['password_empty']); ?>
         <?php if(isset($_SESSION['password_wrong'])){?>
            <strong class="text-danger px-2"><?php echo $_SESSION['password_wrong'];?></strong>
         <?php }unset($_SESSION['password_wrong']); ?>
          
        </div><!-- form-group -->
        <button type="submit" class="btn btn-info btn-block">Sign In</button>
        </form>

        
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="../lib/jquery/jquery.js"></script>
    <script src=""></script>
    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>

  </body>
</html>
