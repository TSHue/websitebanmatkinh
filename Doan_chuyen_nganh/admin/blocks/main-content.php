<?php
  $modules = ["brand","category","product","order"];
  $pages = ["add", "delete", "edit", "list", "detail"];
  if (isset($_GET["m"]) && isset($_GET["p"])) {
    $m = $_GET["m"];
    $p = $_GET["p"];
    foreach ($modules as $val_module) {
      if ($val_module == $m) {
        foreach ($pages as $val_page) {
          if ($val_page == $p) {
            include 'modules/' . $val_module . '/' . $val_page . '.php';
            break;
          }
        }
      }  
    }
} else {
  include 'modules/brand/list.php';
} 
?>