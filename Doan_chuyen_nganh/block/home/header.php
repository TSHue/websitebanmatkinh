<header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
        <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="aa-header-top-area">
                <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                    <li>
                    <a href="index.php?p=checkorders">Đơn hàng của bạn</a>
                    </li>
                    <li>
                        <?php
                            if (!empty($_SESSION['loginclient'])) {
                                ?>
                                    <a href="#">Xin chào <?php echo $_SESSION['loginclient']['username'];?></a>
                                <?php
                            } else {
                                ?>
                                    <a href="" data-toggle="modal" data-target="#signup-modal">Đăng ký</a>
                                <?php
                            }
                        ?>
                    </li>
                    <li>
                        <?php
                        if (!empty($_SESSION['loginclient'])) {
                            ?>
                            <a href="./logout.php">Đăng xuất</a>
                            <?php
                        } else {
                            ?>
                                <a href="" data-toggle="modal" data-target="#login-modal">Đăng nhập</a>
                            <?php
                        }
                        ?>
                    </li>
                </ul>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- / header top  -->
    <!-- start header bottom  -->
    <div class="aa-header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-header-bottom-area">
                        <!-- logo  -->
                        <div class="aa-logo">
                            <!-- Text based logo -->
                            <a href="index.php?p=home">
                                <span class="fa fa-shopping-cart"></span><p>glasses<strong> Shop</strong> <span>Your Shopping Partner</span></p>
                            </a>
                            <!-- img based logo -->
                            <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
                        </div>
                        <!-- / logo  -->
                        <!-- cart box -->
                        <div class="aa-cartbox">
                            <a class="aa-cart-link" href="index.php?p=cart">
                                <span class="fa fa-shopping-basket"></span>
                                <span class="aa-cart-title">GIỎ HÀNG</span>
                                <span class="aa-cart-notify">
                                    <?php
                                        if (empty($_SESSION['cart'])) {
                                            echo 0;
                                        }else {
                                            echo count($_SESSION['cart']);
                                        }
                                    ?>
                                </span>
                            </a>
                            <!-- <div class="aa-cartbox-summary">
                                <ul>
                                    <li>
                                        <a class="aa-cartbox-img" href="#"><img src="img/woman-small-2.jpg" alt="img"></a>
                                        <div class="aa-cartbox-info">
                                        <h4><a href="#">Product Name</a></h4>
                                        <p>1 x $250</p>
                                        </div>
                                        <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                                    </li>
                                    <li>
                                        <a class="aa-cartbox-img" href="#"><img src="img/woman-small-1.jpg" alt="img"></a>
                                        <div class="aa-cartbox-info">
                                        <h4><a href="#">Product Name</a></h4>
                                        <p>1 x $250</p>
                                        </div>
                                        <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                                    </li>                    
                                    <li>
                                        <span class="aa-cartbox-total-title">
                                        Total
                                        </span>
                                        <span class="aa-cartbox-total-price">
                                        $500
                                        </span>
                                    </li>
                                </ul>
                                <a class="aa-cartbox-checkout aa-primary-btn" href="checkout.html">Checkout</a>
                            </div> -->
                        </div>
                        <!-- / cart box -->
                        <!-- search box -->
                        <div class="aa-search-box">
                            <?php
                                if (isset($_POST['btn_search'])) {
                                    header("Location:index.php?p=product&search=".$_POST['search']);
                                }
                            ?>
                            <form action="" method="POST">
                                <input type="text" name="search" placeholder="Nhập tên sản phẩm" value="<?php if (isset($_GET['search'])) {
                                    echo $_GET['search'];
                                }?>">
                                <button type="submit" name="btn_search"><span class="fa fa-search"></span></button>
                            </form>
                        </div>
                        <!-- / search box -->             
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / header bottom  -->
</header>