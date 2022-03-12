<?php
if (!isset($_GET["id"])) {
    header("location:index.php?m=product&p=list");
    exit();
} else {
    $data["prod_id"] = $_GET["id"];
    deleteProduct($obj, $data["prod_id"]);
    header("location:index.php?m=product&p=list");
    exit();
}
?>