<?php
    //Lấy tất cả danh sách đơn hàng
    function getDataOrderList($conn) {
        $sm = $conn->prepare("SELECT * FROM `order`");
        $sm->execute();
        $data = $sm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    //Lấy đơn hàng bằng mã đơn hàng
    function getDataOrderById($conn, $id) {
        $sm = $conn->prepare("SELECT * FROM `order` WHERE order_id = :order_id");
        $sm->bindParam(":order_id", $id, PDO::PARAM_STR);
        $sm->execute();
        $data = $sm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    //Lấy thông tin chi tiết đơn hàng
    function getDataOrderDetail($conn, $id) {
        $sm = $conn->prepare("SELECT d.*, p.prod_name 
            FROM `order_detail` d INNER JOIN `product` p ON d.product_id = p.prod_id 
            WHERE d.order_id = :idorder");
        $sm->bindParam(":idorder", $id, PDO::PARAM_STR);
        $sm->execute();
        $data = $sm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    //Cập nhật trạng thái đơn hàng
    function updateOrderStatus($conn, $id) {
        $sm = $conn->prepare("UPDATE `order` SET status = 2 WHERE order_id = :order_id");
        $sm->bindParam(":order_id", $id, PDO::PARAM_STR);
        $sm->execute();
    }

    //Hủy bỏ đơn đặt hàng
    function deleteOrder($conn, $id) {
        $sm = $conn->prepare("DELETE FROM `order` WHERE order_id = :order_id");
        $sm->bindParam(":order_id", $id, PDO::PARAM_STR);
        $sm->execute();
    }

    //DELETE FROM `order_detail` WHERE `order_id` = "order35"
    //Hủy bỏ chi tiết đơn đặt hàng
    function deleteOrderDetail($conn, $id) {
        $sm = $conn->prepare("DELETE FROM `order_detail` WHERE order_id = :order_id");
        $sm->bindParam(":order_id", $id, PDO::PARAM_STR);
        $sm->execute();
    }
?>