<?php

    if (isset($_GET['action'])) {
        function updateCart($add = false){
            foreach ($_POST['quantity'] as $id => $quantity) {
                if ($quantity == 0) {
                    unset($_SESSION['cart'][$id]);
                }else {
                    if ($add) {
                        $_SESSION['cart'][$id] += $quantity;
                    } else{
                        $_SESSION['cart'][$id] = $quantity;
                    }
                }
            }
        }
        switch ($_GET['action']) {
            case 'add':
                updateCart(true);
                header('Location: index.php?p=cart');
                break;
            case 'delete':
                if (isset($_GET['id'])) {
                    unset($_SESSION['cart'][$_GET['id']]);
                }
                header('Location: index.php?p=cart');
                break;
            case 'submit':
                updateCart();
                header('Location: index.php?p=cart');
                break;
        }
    }
    if (!empty($_SESSION['cart'])) {
        $sm = $obj->prepare("SELECT * FROM product WHERE prod_id IN ('".implode("','", array_keys($_SESSION['cart']))."')");
        $sm->execute();
        $data = $sm->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($data); exit;
    }
?>
<section id="cart-view">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cart-view-area">
                    <div class="cart-view-table">
                        <form action="index.php?p=cart&action=submit" method="post">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Ảnh</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if (!empty($data)) {
                                                $i = 0;
                                                $total = 0;
                                                foreach ($data as $value) {
                                                    $i++;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i;?></td>
                                                        <td><a href="index.php?p=detail&id=<?php echo $value['prod_id']?>" class="aa-cart-title"><?php echo $value['prod_name'];?></a></td>
                                                        <td><a href="index.php?p=detail&id=<?php echo $value['prod_id']?>"><img src="public/image/productimage/<?php echo $value['prod_image'];?>" alt="img"></a></td>
                                                        <td><?php echo number_format($value['price']);?></td>
                                                        <td><input type="number" class="aa-cart-quantity" value="<?php echo $_SESSION['cart'][$value["prod_id"]];?>" name="quantity[<?php echo $value['prod_id']?>]"></td>
                                                        <td><?php echo number_format($value['price'] * $_SESSION['cart'][$value["prod_id"]]);?></td>
                                                        <td><a href="index.php?p=cart&action=delete&id=<?php echo $value["prod_id"];?>"><i class="fas fa-trash-alt"></i></a></td>
                                                    </tr>
                                                    <?php
                                                    $total += $value['price'] * $_SESSION['cart'][$value["prod_id"]];
                                                }
                                            }
                                        ?>
                                        <tr>
                                            <td colspan="7" class="aa-cart-view-bottom">
                                                <input class="aa-cart-view-btn" name="update" type="submit" value="Update cart">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                        <div class="cart-view-total">
                            <h4>Tổng tiền</h4>
                            <table class="aa-totals-table">
                                <tbody>
                                    <tr>
                                        <th>Total</th>
                                        <?php
                                            if(!empty($total)){
                                                ?>
                                                    <td><?php echo number_format($total); ?>VNĐ</td>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <td> 0 VNĐ</td>
                                                <?php
                                            }
                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                            <?php
                                if(empty($_SESSION['cart'])){
                                    ?>
                                        <a href='index.php?p=cart' class='aa-cart-view-btn'>Giỏ hàng trống</a>
                                    <?php
                                }else {
                                    if (empty($_SESSION['loginclient'])) {
                                        ?>
                                            <a href='' data-toggle="modal" data-target="#login-modal" class='aa-cart-view-btn'>Xin hãy đăng nhập trước khi thanh toán</a>
                                        <?php
                                    }
                                    if (!empty($_SESSION['cart']) && !empty($_SESSION['loginclient'])) {
                                        ?>
                                            <a href="index.php?p=order" class="aa-cart-view-btn">Đặt hàng</a>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>