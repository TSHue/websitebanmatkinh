<ul class="aa-product-catg">
    <?php
        $onePerPage = 5;
        if (isset($_GET['search'])) {
            $name = $_GET['search'];
            $totalRow = rowTotalName($obj, $name);
            if ($totalRow == 0) {
                ?>
                <h3>Không sản phẩm này trong shop</h3>
                <?php
            }
            $totalPage = ceil($totalRow/$onePerPage);
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                if ($page < 1 || $page > $totalPage) {
                    $page = 1;
                }
            }else {
                $page = 1;
            }
            $start = ($page - 1) * $onePerPage;
            $data = getProductDataByName($obj, $name, $start, $onePerPage);
            foreach ($data as $value) {
                ?>
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
            }
        }
    ?>
</ul>