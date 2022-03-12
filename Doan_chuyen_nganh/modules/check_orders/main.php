<div class="container">
    <div class="row" style="min-height: 800px;">
        <div class="col-md-12">
            <h3 class="text-center">Thông tin đơn hàng của bạn</h3>
            <?php
                if (!empty($_SESSION['loginclient'])) {
                    include 'content/checkorders.php';
                }else {
                    ?>
                        <h4>Vui lòng đăng nhập để xem đơn hàng cua bạn</h4>
                    <?php
                }
            ?>
        </div>
    </div>
</div>