<?php
  ob_start();
  session_start();

  include 'connect.php';
  include 'model/function.php';
if (!empty($_SESSION['cart'])) {
  echo "<pre>";
  print_r($_SESSION['cart']);
  echo "</pre>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'block/home/head.php';
        if (isset($_SESSION['loginclient'])) {
          var_dump($_SESSION['loginclient']);
        }
  ?>
</head>
<body>      
  <!-- SCROLL TOP BUTTON -->
    <?php include 'block/home/scroll.php'?>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header section -->
  <?php include 'block/home/header.php'?>
  <!-- / header section -->

  <!-- menu -->
  <?php include 'block/home/navbar.php'?>
  <!-- / menu -->
  <section id="main">
    <?php
      if (isset($_GET['p'])) {
        $p = $_GET['p'];
        switch ($p) {
          case 'home':
            include 'modules/home/main.php';
            break;
          case 'product':
            include 'modules/product/main.php';
            break;
          case 'detail':
            include 'modules/detail/main.php';
            break;
          case 'cart':
            include 'modules/cart/main.php';
            break;
          case 'order':
            include 'modules/order/main.php';
            break;
          case 'checkorders':
            include 'modules/check_orders/main.php';
            break;
          default:
            include 'modules/home/main.php';
            break;
        }
      }
      else {
        include 'modules/home/main.php';
      }
    ?>
  </section>

  <!-- footer -->  
  <?php include 'block/home/footer.php'?>
  <!-- / footer -->

  <!-- Login Modal -->  
  <?php include 'login.php'?>
  <?php include 'signup.php'?>

  <!-- jQuery -->
  <?php include 'block/home/script.php'?>
</body>
</html>