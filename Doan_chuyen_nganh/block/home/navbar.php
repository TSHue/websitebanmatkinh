<?php
    function getDataCategoryListMenu($conn) {
        $sm = $conn->prepare("SELECT * FROM category");
        $sm->execute();
        $data = $sm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    function getDataBrandListMenu($conn) {
        $sm = $conn->prepare("SELECT * FROM brand");
        $sm->execute();
        $data = $sm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
?>
<section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="index.php?p=home">Trang chủ</a></li>
              <li><a href="#">Giới Thiệu</a></li>
              <li><a href="index.php?p=product&brand=br1">Thương Hiệu <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <?php
                        $dataBr = getDataBrandListMenu($obj);
                        foreach ($dataBr as $item){
                          ?>
                          <li><a href="index.php?p=product&brand=<?php echo $item['brand_id']?>"><?php echo $item['brand_name']?></a></li>
                          <?php
                        }
                    ?>
                </ul>
              </li>
              <li><a href="index.php?p=product">Loại <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <?php
                        $dataCate = getDataCategoryListMenu($obj);
                        foreach ($dataCate as $item){
                          ?>
                          <li><a href="index.php?p=product&type=<?php echo $item['cate_id']?>"><?php echo $item['cate_name']?></a></li>
                          <?php
                        }
                    ?>
                </ul>
              </li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>