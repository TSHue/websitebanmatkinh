<div class="tab-pane fade" id="women">
    <ul class="aa-product-catg">
        <?php
            $onePerPage=4;
            $start = 0;
            $data = getProductDataByType($obj, 'TK', $start, $onePerPage);
            foreach ($data as $value) {?>
            <!-- start single product item -->
            <li>
                <figure>
                    <a href="index.php?p=detail&id=<?php echo $value['prod_id']?>"><img src="public/image/productimage/<?php echo $value['prod_image'];?>" width="100%" height="100%"></a>
                    <form action="index.php?p=cart&action=add" method="post">
                        <input type="hidden" value="1" name="quantity[<?php echo $value['prod_id']?>]">
                        <button class="aa-add-card-btn btn1"type="submit"><span class="fa fa-shopping-cart"></span>Thêm vào giỏ hàng</button>
                    </form>
                    <figcaption>
                        <h4 class="aa-product-title"><a href="index.php?p=detail&id=<?php echo $value['prod_id']?>"><?php echo $value['prod_name']?></a></h4>
                        <span class="aa-product-price"><?php echo number_format($value["price"]); ?>VNĐ</span>
                    </figcaption>
                </figure>
            </li>
            <?php
        }?>
    </ul>
    <a class="aa-browse-btn" href="index.php?p=product&type=TK">Xem tất cả sản phẩm<span class="fa fa-long-arrow-right"></span></a>
</div>