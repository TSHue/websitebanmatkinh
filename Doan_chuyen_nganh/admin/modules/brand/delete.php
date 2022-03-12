<?php
if (!isset($_GET["id"])) {
    header("location:index.php?m=brand&p=list");
    exit();
} else {
    $data["brand_id"] = $_GET["id"];
    deleteBrand($obj, $data["brand_id"]);
    header("location:index.php?m=brand&p=list");
    exit();
}
?>