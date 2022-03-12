<?php
    //LẤY SẢN PHẨM THEO LOẠI
    function getProductDataByType($conn, $idtype, $start, $onePerPage){
        $sm = $conn->prepare("SELECT * FROM product WHERE prod_type = :idtype ORDER BY prod_id DESC LIMIT $start, $onePerPage");
        $sm->bindParam(":idtype", $idtype, PDO::PARAM_STR);
        $sm->execute();
        $data = $sm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    
    //LẤY SỐ LƯỢNG SẢN PHẨM THEO LOẠI
    function rowTotalType($conn, $idtype){
        $sm = $conn->prepare("SELECT * FROM product WHERE prod_type = :idtype");
        $sm->bindParam(":idtype", $idtype, PDO::PARAM_STR);
        $sm->execute();
        return $sm->rowCount();
    }

    //LẤY SẢN PHẨM THEO THƯƠNG HIỆU
    function getProductDataByBrand($conn, $idbrand, $start, $onePerPage){
        $sm = $conn->prepare("SELECT * FROM product WHERE prod_brand = :idbrand ORDER BY prod_id DESC LIMIT $start, $onePerPage");
        $sm->bindParam(":idbrand", $idbrand, PDO::PARAM_STR);
        $sm->execute();
        $data = $sm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    //LẤY SỐ LƯỢNG SẢN PHẨM THEO THƯƠNG HIỆU
    function rowTotalBrand($conn, $idbrand){
        $sm = $conn->prepare("SELECT * FROM product WHERE prod_brand = :idbrand");
        $sm->bindParam(":idbrand", $idbrand, PDO::PARAM_STR);
        $sm->execute();
        return $sm->rowCount();
    }

    //LẤY DANH SÁCH SẢN PHẨM
    function getProductDataList($conn, $start,$onePerPage){
        $sm = $conn->prepare("SELECT * FROM product ORDER BY prod_id LIMIT $start, $onePerPage");
        $sm->execute();
        $data = $sm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    //LẤY SỐ LƯỢNG TẤT CẢ CÁC SẢN PHẨM
    function rowTotalProduct($conn){
        $sm = $conn->prepare("SELECT * FROM product");
        $sm->execute();
        return $sm->rowCount();
    }
    
    //LẤY DANH SÁCH SẢN PHẨM BẰNG MÃ
    function getProductById($conn, $id){
        $sm = $conn->prepare("SELECT p.*, cate.cate_name as product_type, br.brand_name as product_brand 
            FROM product p INNER JOIN category cate ON p.prod_type = cate.cate_id
            INNER JOIN brand br ON p.prod_brand = br.brand_id
            WHERE prod_id = :id");
        $sm->bindParam(":id", $id, PDO::PARAM_STR);
        $sm->execute();
        $data = $sm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    function getProductById1($conn, $id){
        $sm = $conn->prepare("SELECT * FROM product WHERE prod_id = :id");
        $sm->bindParam(":id", $id, PDO::PARAM_STR);
        $sm->execute();
        $data = $sm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    //LẤY DANH SÁCH THƯƠNG HIỆU
    function getDataBrand($conn){
        $sm = $conn->prepare("SELECT * FROM brand ORDER BY brand_id");
        $sm->execute();
        $data = $sm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    //LẤY DANH SÁCH SẢN PHẨM THEO TÊN 
    function getProductDataByName($conn, $name, $start, $onePerPage){
        $sm = $conn->prepare("SELECT * FROM product WHERE prod_name LIKE '%' :name '%' ORDER BY prod_id DESC LIMIT $start, $onePerPage");
        $sm->bindParam(":name", $name, PDO::PARAM_STR);
        $sm->execute();
        $data = $sm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    //LẤY SỐ LƯỢNG SẢN PHẨM THEO TÊN
    function rowTotalName($conn, $name){
        $sm = $conn->prepare("SELECT * FROM product WHERE prod_name LIKE '%' :name '%'");
        $sm->bindParam(":name", $name, PDO::PARAM_STR);
        $sm->execute();
        return $sm->rowCount();
    }

    //THÊM ĐƠN HÀNG VÀO CSDL
    function createOrder($conn, $data){
        $sm = $conn->prepare("INSERT INTO `order`(`order_id`, `createdate`, `customer_name`, `phone`, `address`, `status`, `username`) VALUES (:order_id, :createdate, :customer_name, :phone, :address, :status, :username)");
        $sm->bindParam(":order_id", $data['order_id'], PDO::PARAM_STR);
        $sm->bindParam(":createdate", $data['createdate']);
        $sm->bindParam(":customer_name", $data['customer_name'], PDO::PARAM_STR);
        $sm->bindParam(":phone", $data['phone'], PDO::PARAM_INT);
        $sm->bindParam(":address", $data['address'], PDO::PARAM_STR);
        $sm->bindParam(":status", $data['status'], PDO::PARAM_INT);
        $sm->bindParam(":username", $data['username'], PDO::PARAM_STR);
        $sm->execute();
    }
    
    //THÊM CHI TIẾT ĐƠN HÀNG VÀO CSDL
    function createOrderDetail($conn, $data){
        $sm = $conn->prepare("INSERT INTO `order_detail` VALUES (:order_id, :product_id, :quantity, :amount)");
        $sm->bindParam(":order_id", $data['order_id'], PDO::PARAM_STR);
        $sm->bindParam(":product_id", $data['product_id'], PDO::PARAM_STR);
        $sm->bindParam(":quantity", $data['quantity'], PDO::PARAM_INT);
        $sm->bindParam(":amount", $data['amount'], PDO::PARAM_INT);
        $sm->execute();
    }

    //LẤY DANH SÁCH ĐƠN HÀNG THEO USERNAME
    function getOrderListByUsername($conn, $username){
        $sm = $conn->prepare("SELECT * FROM `order` WHERE username = :username ORDER BY order_id DESC");
        $sm->bindParam(":username", $username, PDO::PARAM_STR);
        $sm->execute();
        $data = $sm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    //LẤY DANH SÁCH CHI TIẾT ĐƠN HÀNG
    function getOrderDetailByOrderId($conn, $order_id){
        $sm = $conn->prepare("SELECT d.*, p.prod_name, p.price as prod_price, p.prod_image 
            FROM order_detail d INNER JOIN product p ON d.product_id = p.prod_id
            WHERE d.order_id = :order_id");
        $sm->bindParam(":order_id", $order_id, PDO::PARAM_STR);
        $sm->execute();
        $data = $sm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
?>