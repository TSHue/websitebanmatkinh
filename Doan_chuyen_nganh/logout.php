<?php
    if(!session_id()) {
        session_start();
    }
    
    if(!empty($_SESSION['loginclient'])) {
        unset($_SESSION['loginclient']);
        header("location:index.php");
    } else {
        header("location:index.php");
    }
?>