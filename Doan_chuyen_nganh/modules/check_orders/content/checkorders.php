<?php
    $username = $_SESSION['loginclient']['username'];
    $dataOrder = getOrderListByUsername($obj, $username);
    foreach ($dataOrder as $value) {
        $idDetail = $value['order_id'];
        ?>
            <div style="padding: 20px 10px;border:1px solid gray;margin:20px 0;">
                <h4>Đặt hàng vào ngày: <?php echo $value['createdate'] ?></h4>
                <h5>
                    Tình trạng:
                    <?php
                        if ($value['status'] == 1) {
                            echo "Đang xử lý";
                        }elseif ($value['status'] == 2) {
                            echo "Đã xử lý";
                        }elseif ($value['status'] == 3) {
                            echo "Đang giao hàng";
                        }else {
                            echo "Đã nhận hàng";
                        }
                    ?>
                </h5>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $dataDetail = getOrderDetailByOrderId($obj, $idDetail);
                            $i = 0;
                            $tong = 0;
                            foreach ($dataDetail as $value) {
                                $i++;
                                $tong += $value['amount'] ;
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $value['prod_name']; ?></td>
                                        <td><img style="width:100px" src="public/image/productimage/<?php echo $value['prod_image'];?>"></td>
                                        <td><?php echo $value['quantity'] ?></td>
                                        <td><?php echo number_format($value["prod_price"]);?></td>
                                        <td><?php echo number_format($value["amount"]); ?></td>
                                    </tr>
                                <?php
                            }
                        ?>
                        <td>Tổng tiền: <?php echo number_format($tong); ?></td>
                    </tbody>
                </table>
            </div>
        <?php
    }
?>