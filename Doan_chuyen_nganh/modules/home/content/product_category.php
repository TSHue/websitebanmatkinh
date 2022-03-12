<section id="aa-product">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="aa-product-area">
            <div class="aa-product-inner">
              <!-- start prduct navigation -->
              <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#men" data-toggle="tab">Gọng kính</a></li>
                <li><a href="#women" data-toggle="tab">Tròng kính</a></li>
                <li><a href="#sports" data-toggle="tab">Kính Mát</a></li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Start gong product category -->
                <?php include 'product_cate/gong.php'?>
                <!-- / gong product category -->

                <!-- start trong product category -->
                <?php include 'product_cate/trong.php'?>
                <!-- / trong product category -->
                <!-- start kinh mat product category -->
                <?php include 'product_cate/kinhmat.php'?>
                <!-- / kinh mat product category -->
                <!-- start electronic product category -->
                
                <!-- / electronic product category -->
              </div>
              <!-- quick view modal -->                  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>