<?php
if (!isset($_GET["id"])) {
    header("location:index.php?m=category&p=list");
    exit();
} else {
    $data["cate_id"] = $_GET["id"];
    deleteCategory($obj, $data["cate_id"]);
    header("location:index.php?m=category&p=list");
    exit();
}
?>