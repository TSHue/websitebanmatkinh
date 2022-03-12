<?php
    //Check Category exist
    function checkCategoryIdExist($conn, $data) {
        $sm_check = $conn->prepare("SELECT * FROM category WHERE cate_id = :cate_id");
        $sm_check->bindParam(":cate_id", $data["cate_id"], PDO::PARAM_STR);
        $sm_check->execute();
        $count = $sm_check->rowCount();
        if ($count != 0) return true;
        return false;
    }
    //Check Category Name exist
    function checkCategoryNameExist($conn, $data) {
        $sm_check = $conn->prepare("SELECT * FROM category WHERE cate_name = :cate_name");
        $sm_check->bindParam(":cate_name", $data["cate_name"], PDO::PARAM_STR);
        $sm_check->execute();
        $count = $sm_check->rowCount();
        if ($count != 0) return true;
        return false;
    }
    //Check Brand Name exist by id
    function checkCategoryExistById($conn, $data) {
        $sm_check = $conn->prepare("SELECT * FROM category WHERE cate_name = :cate_name AND cate_id != :cate_id");
        $sm_check->bindParam(":cate_id", $data["cate_id"], PDO::PARAM_STR);
        $sm_check->bindParam(":cate_name", $data["cate_name"], PDO::PARAM_STR);
        $sm_check->execute();
        $count = $sm_check->rowCount();
        if ($count != 0) return true;
        return false;
    }
    //add brand
    function addCategoryData($conn, $data) {
        $sm = $conn->prepare("INSERT INTO category(cate_id, cate_name) VALUES(:cate_id, :cate_name)");
        $sm->bindParam(":cate_id", $data["cate_id"], PDO::PARAM_STR);
        $sm->bindParam(":cate_name", $data["cate_name"], PDO::PARAM_STR);
        $sm->execute();
    }
    //delete Category
    function deleteCategory($conn, $id) {
        $sm = $conn->prepare("DELETE FROM category WHERE cate_id = :cate_id");
        $sm->bindParam(":cate_id", $id, PDO::PARAM_STR);
        $sm->execute();
    }
    //Get Category Data
    function getDataCategory($conn, $id) {
        $sm = $conn->prepare("SELECT * FROM category WHERE cate_id = :cate_id");
        $sm->bindParam(":cate_id", $id, PDO::PARAM_STR);
        $sm->execute();
        $data = $sm->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    //Edit Category
    function editCategoryData($conn, $data) {
        $sm = $conn->prepare("UPDATE category SET cate_name = :cate_name WHERE cate_id = :cate_id");
        $sm->bindParam(":cate_id", $data["cate_id"], PDO::PARAM_STR);
        $sm->bindParam(":cate_name", $data["cate_name"], PDO::PARAM_STR);
        $sm->execute();
    }
    //Danh sach category
    function getDataCategoryList($conn) {
        $sm = $conn->prepare("SELECT * FROM category");
        $sm->execute();
        $data = $sm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
?>