<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Danh sách Đơn đặt hàng
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $data = getDataOrderList($obj);
                        $i=0;
                        foreach ($data as $value) {
                            $i++;
                            ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $value['order_id'];?></td>
                                    <td><?php echo $value['customer_name'];?></td>
                                    <td>
                                        <a href="index.php?m=order&p=detail&idorder=<?php echo $value["order_id"]?>"> Xem thông tin</a>
                                    </td>
                                </tr>
                            <?php
                        }
                        
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>