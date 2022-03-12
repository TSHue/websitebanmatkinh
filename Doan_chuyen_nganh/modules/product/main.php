<section id="aa-catg-head-banner">
    <?php include 'content/banner.php'?>
</section>
<section id="aa-product-category">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
                <div class="aa-product-catg-content">
                    <?php include 'content/product_head.php'?>
                    <div class="aa-product-catg-body">
                        <?php
                            if (empty($_GET['search'])) {
                                include 'content/product.php';
                            }else {
                                include 'content/product_search_name.php';
                            }
                         ?>
                    </div>
                    <div class="aa-product-catg-pagination">
                        <?php include 'content/product_pagination.php'?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
                <?php include 'content/sidebar.php'?>
            </div>
        </div>
    </div>
</section>