<?php
?>
<aside class="aa-sidebar">
    <div class="aa-sidebar-widget">
            <h3>Thương Hiệu</h3>
            <ul class="aa-catg-nav">
                <?php
                    $data = getDataBrand($obj);
                    foreach ($data as $value) {
                        $row = rowTotalBrand($obj, $value['brand_id']);
                        ?>
                        <li><a href="index.php?p=product&brand=<?php echo $value['brand_id']?>"><?php echo $value['brand_name']?><p style="float:right"><?php echo $row?></p></a></li>
                        <?php
                    }
                ?>
            </ul>
    </div>
</aside>