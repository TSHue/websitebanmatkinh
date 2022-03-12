<?php
if (!isset($_GET["idorder"])) {
    header("location:index.php?m=order&p=list");
    exit();
} else {
    $data['order_id'] = $_GET["idorder"];
    updateOrderStatus($obj, $data['order_id']);
    header("location:index.php?m=order&p=list");
    exit();
}
?>