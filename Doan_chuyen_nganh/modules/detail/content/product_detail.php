<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $data = getProductById($obj, $id);
        foreach ($data as $value) {
            ?>
            <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="aa-product-view-slider">
                    <div id="demo-1" class="simpleLens-gallery-container">
                        <div class="simpleLens-container">
                            <div class="simpleLens-big-image-container">
                                <img src="public/image/productimage/<?php echo $value['prod_image']?>"class="simpleLens-big-image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="aa-product-view-content">
                    <h3><?php echo $value['prod_name']?></h3>
                    <div class="aa-price-block">
                        <span class="aa-product-view-price"><?php echo number_format($value['price'])?>VNĐ</span>
                        <p class="aa-prod-category">
                            Thương Hiệu: <a href="index.php?p=product&brand=<?php echo $value['prod_brand']?>"><?php echo $value['product_brand']?></a>
                            <br>
                            Loại: <a href="index.php?p=product&type=<?php echo $value['prod_type']?>"><?php echo $value['product_type']?></a><br>
                            Mô tả: <span><?php echo $value['prod_desc']?></span>
                        </p>
                        <form action="index.php?p=cart&action=add" method="post">
                            <div class="aa-prod-view-bottom">
                                <input type="hidden" value="1" name="quantity[<?php echo $value['prod_id']?>]">
                                <input class="aa-add-to-cart-btn" type="submit" value="Thêm vào giỏ hàng">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
    }
?>