<?php
    if (!isset($_GET['idorder'])) {
        header("location:index.php?m=order&p=list");
        exit();
    }else {
        $data['order_id'] = $_GET['idorder'];
        $order = getDataOrderById($obj, $data['order_id']);
        $detail = getDataOrderDetail($obj, $data['order_id']);
        ?>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    Thông tin đơn đặt hàng
                </div>
                <div class="card-body">
                    <p>
                        Mã đơn hàng: <?php echo $data['order_id']?><br>
                        <?php
                            foreach ($order as $value) {
                                ?>
                                Ngày đặt: <?php echo $value['createdate'] ?> <br>
                                Tên khách hàng: <?php echo $value['customer_name']?><br>
                                Số điện thoại: <?php echo $value['phone']?><br>
                                Địa chỉ: <?php echo $value['address']?><br>
                                Tài khoản: <?php echo $value['username']?><br>
                                Trạng thái đơn hàng: 
                                <?php 
                                    if ($value['status'] == 1) {
                                        echo "Đang xử lý";
                                    }elseif ($value['status'] == 2) {
                                        echo "Đã xử lý";
                                    }
                                ?>
                                <?php
                            }
                        ?>
                    </p>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>STT</th>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=0;
                                $tong = 0;
                                foreach ($detail as $value) {
                                    $i++;
                                    $tong += $value['amount'] ;
                                    ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $value['prod_name'];?></td>
                                            <td><?php echo $value['quantity'];?></td>
                                            <td><?php echo number_format($value['amount']);?></td>
                                        </tr>
                                    <?php
                                }  
                            ?>
                            <td><strong>Tổng tiền:</strong></td>
                            <td></td>
                            <td></td>
                            <td><?php echo number_format($tong); ?></td>
                        </tbody>
                    </table>
                    <br>
                    <a class="btn btn-primary" href="index.php?m=order&p=edit&idorder=<?php echo $data['order_id']?>">Chấp nhận</a>
                    &nbsp;
                    <a class="btn btn-danger" onclick="return acceptDelete('Bạn có thực sự muốn hủy bỏ đơn hàng này không?')"href="index.php?m=order&p=delete&idorder=<?php echo $value['order_id']?>">Hủy đơn</a>
                </div>
            </div>
        </div>
        <?php
    }
?>