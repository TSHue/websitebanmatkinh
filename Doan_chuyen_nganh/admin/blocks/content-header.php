<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Admin</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <form method="post">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <?php if (isset($_GET["m"])) { ?>
                        <li class="breadcrumb-item ">
                            <?php 
                                $m = $_GET["m"];
                                switch ($m) {
                                    case 'order': echo "Đơn đặt hàng"; break;
                                    case 'brand': echo "Thương Hiệu"; break;
                                    case 'category': echo "Loại";break;
                                    case 'product': echo "Sản Phẩm";break;
                                }
                            }
                            ?>
                        </li>
                        <?php if (isset($_GET["p"])) { ?>
                        <li class="breadcrumb-item active">
                            <?php
                                $p = $_GET["p"];
                                switch ($p) {
                                    case 'add': echo "Thêm"; break;
                                    case 'delete': echo "Xóa"; break;
                                    case 'edit': echo "Sửa"; break;
                                    case 'list': echo "Danh Sách"; break;
                                    case 'detail': echo "Chi tiết đơn đặt hàng"; break;
                                }
                            ?>
                        </li>
                        <?php } ?>
                    </ol>
                </form>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>