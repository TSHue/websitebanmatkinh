<?php
  ob_start();
  session_start();
  include "../connect.php";
  include "model/brand.php";
  include "model/category.php";
  include "model/product.php";
  include "model/order.php";


  if(!isset($_SESSION['username']) || $_SESSION['level'] != 1){
    header("Location:DangNhap.php");
    exit();
  }
?>
<!DOCTYPE html>
<html>
<head>
  <?php include 'blocks/head.php';?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <?php include 'blocks/navbar.php';?>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <?php include 'blocks/aside.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include 'blocks/content-header.php';?>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <?php
        include 'blocks/main-content.php';
      ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php include 'blocks/footer.php';?>
</body>
</html>
