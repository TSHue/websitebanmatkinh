<?php
    //status => 1: dang xu li, 2: da xu li, 3: dang giao, 4: hoan thanh
    $error = "";
    if (isset($_POST['confirm'])) {
        $data = array();

        if ($error == "") {
            $data['order_id'] = "order".random_int(0,100);
            $data['createdate'] = date("Y-m-d H:i:s");
            $data['customer_name'] = $_POST['customer_name'];
            $data['phone'] = $_POST['phone'];
            $data['address'] = $_POST['address'];
            $data['status'] = 1;
            $data['username'] = $_SESSION['loginclient']['username'];
            createOrder($obj, $data);

            $sm = $obj->prepare("SELECT * FROM product WHERE prod_id IN ('".implode("','", array_keys($_SESSION['cart']))."')");
            $sm->execute();
            $data1 = $sm->fetchAll(PDO::FETCH_ASSOC);

            $data_detail['order_id'] = $data['order_id'];
            foreach ($data1 as $value) {
                $data_detail['product_id'] = $value['prod_id'];
                $data_detail['quantity'] = $_SESSION['cart'][$value["prod_id"]];
                $data_detail['amount'] = $value['price'] * $_SESSION['cart'][$value["prod_id"]];
                createOrderDetail($obj, $data_detail);
            }
            unset($_SESSION['cart']);
            header("location:index.php");
            exit;
        }
    }
?>
<div class="container" style="min-height: 600px;">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="padding-top: 50px;">
            <form action="" method="post">
                <div class="form-group">
                    <label>Tên khách hàng</label>
                    <input required type="text" name="customer_name" class="form-control" placeholder="Xin hãy nhập tên của bạn vào">
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input required type="tel" name="phone" class="form-control" placeholder="Xin hãy nhập số điện thoại của bạn vào" pattern="[0-9]{10}">
                </div>
                <div class="form-group">
                    <label>Địa chỉ giao hàng</label>
                    <input required type="text" name="address" class="form-control" placeholder="Xin hãy nhập địa chỉ nhà của bạn vào">
                </div>
                <button type="submit" name="confirm" class="aa-browse-btn">Xác nhận</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>