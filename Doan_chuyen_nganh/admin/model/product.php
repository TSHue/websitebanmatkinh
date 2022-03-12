<?php
    //Check Product Id exist
    function checkProductIdExist($conn, $data) {
        $sm_check = $conn->prepare("SELECT * FROM product WHERE prod_id = :prod_id");
        $sm_check->bindParam(":prod_id", $data["prod_id"], PDO::PARAM_STR);
        $sm_check->execute();
        $count = $sm_check->rowCount();
        if ($count != 0) return true;
        return false;
    }
    //add Product
    function addProductData($conn, $data) {
        $sm = $conn->prepare("INSERT INTO product(prod_id, prod_name, prod_desc, price, prod_brand, prod_type, prod_image) VALUES(:prod_id, :prod_name, :prod_desc, :price, :prod_brand, :prod_type, :prod_image)");
        $sm->bindParam(":prod_id", $data["prod_id"], PDO::PARAM_STR);
        $sm->bindParam(":prod_name", $data["prod_name"], PDO::PARAM_STR);
        $sm->bindParam(":prod_desc", $data["prod_desc"], PDO::PARAM_STR);
        $sm->bindParam(":price", $data["price"], PDO::PARAM_INT);
        $sm->bindParam(":prod_brand", $data["prod_brand"], PDO::PARAM_STR);
        $sm->bindParam(":prod_type", $data["prod_type"], PDO::PARAM_STR);
        $sm->bindParam(":prod_image", $data["prod_image"], PDO::PARAM_STR);
        $sm->execute();
    }
    //delete Product
    function deleteProduct($conn, $id) {
        $sm = $conn->prepare("DELETE FROM product WHERE prod_id = :prod_id");
        $sm->bindParam(":prod_id", $id, PDO::PARAM_STR);
        $sm->execute();
    }
    //Get Product Data
    function getDataProduct($conn, $id) {
        $sm = $conn->prepare("SELECT * FROM product WHERE prod_id = :prod_id");
        $sm->bindParam(":prod_id", $id, PDO::PARAM_STR);
        $sm->execute();
        $data = $sm->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    //Edit Product
    function editProductData($conn, $data) {
        if(empty($data["prod_image"])) {
            $sm = $conn->prepare("UPDATE product SET prod_id = :prod_id, prod_name = :prod_name, prod_desc = :prod_desc, price = :price, prod_brand = :prod_brand, prod_type = :prod_type WHERE prod_id = :prod_id");
        } else {
            $sm = $conn->prepare("UPDATE product SET prod_id = :prod_id, prod_name = :prod_name, prod_desc = :prod_desc, price = :price, prod_brand = :prod_brand, prod_type = :prod_type, prod_image = :prod_image WHERE prod_id = :prod_id");
            $sm->bindParam(":prod_image", $data["prod_image"], PDO::PARAM_STR);
        }
        $sm->bindParam(":prod_id", $data["prod_id"], PDO::PARAM_STR);
        $sm->bindParam(":prod_name", $data["prod_name"], PDO::PARAM_STR);
        $sm->bindParam(":prod_desc", $data["prod_desc"], PDO::PARAM_STR);
        $sm->bindParam(":price", $data["price"], PDO::PARAM_INT);
        $sm->bindParam(":prod_brand", $data["prod_brand"], PDO::PARAM_STR);
        $sm->bindParam(":prod_type", $data["prod_type"], PDO::PARAM_STR);
        $sm->bindParam(":prod_image", $data["prod_image"], PDO::PARAM_STR);
        $sm->execute();
    }
    //Product List
    function getDataProductList($conn) {
        $sm = $conn->prepare("SELECT * FROM product");
        $sm->execute();
        $data = $sm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
?>