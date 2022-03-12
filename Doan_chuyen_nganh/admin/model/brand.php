<?php
    //Check Brand Id exist
    function checkBrandIdExist($conn, $data) {
        $sm_check = $conn->prepare("SELECT * FROM brand WHERE brand_id = :brand_id");
        $sm_check->bindParam(":brand_id", $data["brand_id"], PDO::PARAM_STR);
        $sm_check->execute();
        $count = $sm_check->rowCount();
        if ($count != 0) return true;
        return false;
    }
    //Check Brand Name exist
    function checkBrandNameExist($conn, $data) {
        $sm_check = $conn->prepare("SELECT * FROM brand WHERE brand_name = :brand_name");
        $sm_check->bindParam(":brand_name", $data["brand_name"], PDO::PARAM_STR);
        $sm_check->execute();
        $count = $sm_check->rowCount();
        if ($count != 0) return true;
        return false;
    }
    //Check Brand Name exist by id
    function checkBrandExistById($conn, $data) {
        $sm_check = $conn->prepare("SELECT * FROM brand WHERE brand_name = :brand_name AND brand_id != :brand_id");
        $sm_check->bindParam(":brand_id", $data["brand_id"], PDO::PARAM_STR);
        $sm_check->bindParam(":brand_name", $data["brand_name"], PDO::PARAM_STR);
        $sm_check->execute();
        $count = $sm_check->rowCount();
        if ($count != 0) return true;
        return false;
    }
    //add brand
    function addBrandData($conn, $data) {
        $sm = $conn->prepare("INSERT INTO brand(brand_id, brand_name) VALUES(:brand_id, :brand_name)");
        $sm->bindParam(":brand_id", $data["brand_id"], PDO::PARAM_STR);
        $sm->bindParam(":brand_name", $data["brand_name"], PDO::PARAM_STR);
        $sm->execute();
    }
    //delete brand
    function deleteBrand($conn, $id) {
        $sm = $conn->prepare("DELETE FROM brand WHERE brand_id = :brand_id");
        $sm->bindParam(":brand_id", $id, PDO::PARAM_STR);
        $sm->execute();
    }
    //Get Brand Data
    function getDataBrand($conn, $id) {
        $sm = $conn->prepare("SELECT * FROM brand WHERE brand_id = :brand_id");
        $sm->bindParam(":brand_id", $id, PDO::PARAM_STR);
        $sm->execute();
        $data = $sm->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    //Edit Brand
    function editBrandData($conn, $data) {
        $sm = $conn->prepare("UPDATE brand SET brand_name = :brand_name WHERE brand_id = :brand_id");
        $sm->bindParam(":brand_id", $data["brand_id"], PDO::PARAM_STR);
        $sm->bindParam(":brand_name", $data["brand_name"], PDO::PARAM_STR);
        $sm->execute();
    }
    //Danh sach brand
    function getDataBrandList($conn) {
        $sm = $conn->prepare("SELECT * FROM brand");
        $sm->execute();
        $data = $sm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
?>