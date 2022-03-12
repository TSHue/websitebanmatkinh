<?php
    if (!empty($_SESSION['loginclient'])) {
        include 'content/order.php';
    }else {
        header("Location:index.php");
        exit();
    }
?>