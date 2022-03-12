<?php
    if (isset($_POST["btn-submit"])) {
        $data = array();
        $errors = array();
        $data["prod_id"]= $_POST["prod_id"];

        if(empty($_POST["prod_id"])){
            $errors[]= "Mã sản phẩm không được để trống";
        } else {
            if(checkProductIdExist($obj, $data)){
                $errors[]="Mã này đã tồn tại";
            }
        }

        if(empty($_POST["prod_name"])){
            $errors[]= "Tên sản phẩm không được để trống";
        }
        if(empty($_POST["price"])){
            $errors[]= "Giá sản phẩm không được để trống";
        }

        if (!empty($_FILES['prod_image']["name"])) {
            $data['prod_image']= time() . "-" . $_FILES['prod_image']["name"];
            $data["image_tmp"] = $_FILES["image"]["tmp_name"];
            $strposImage = mb_strrpos($data['prod_image'], ".");
            $substrImage = mb_substr($data['prod_image'], $strposImage + 1);
            if (($substrImage != 'jpg') && ($substrImage != 'jpeg') && ($substrImage != 'png') && ($substrImage != 'gif')) {
                $errors[] = "<li>Please enter the correct image file format (jpg, jpeg, png, gif).</li>";
            } else {
                $data["prod_image"] = time().'-'.$_FILES["prod_image"]["name"];
                $data["image_tmp"] = $_FILES["prod_image"]["tmp_name"];
            }
        }

        if (empty($errors)) {
            $data["prod_name"]= $_POST["prod_name"];
            $data["prod_desc"]= $_POST["prod_desc"];
            $data["price"]= $_POST["price"];
            $data["prod_brand"]= $_POST["prod_brand"];
            $data["prod_type"]= $_POST["prod_type"];
            $data["prod_image"] =$_FILES["prod_image"]["name"];
            move_uploaded_file($data["image_tmp"], "../public/image/productimage/".$data["prod_image"]);
            addProductData($obj, $data);
            header("Location:index.php?d=place&m=product&p=list");
            exit();
        }
        if (!empty($errors))
?>
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-ban"></i> Thông báo!</h5>
    <?php foreach ($errors as $error) { echo '<li>'.$error.'</li>'; } ?>
</div>
<?php
    }
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Thêm
        </div>
        <div class="card-body">
           <form role="form" method="post" action="" enctype="multipart/form-data">
               <div class="form-group">
                   <label for="">Mã sản phẩm</label>
                   <input class="form-control" type="text" name="prod_id" require>
               </div>
               <div class="form-group">
                   <label for="">Tên sản phẩm</label>
                   <input class="form-control" type="text" name="prod_name" require>
               </div>
               <div class="form-group">
                   <label for="">Mô tả</label>
                   <input class="form-control" type="text" name="prod_desc" require>
               </div>
               <div class="form-group">
                   <label for="">Giá</label>
                   <input class="form-control" type="number" name="price" require>
               </div>
               <div class="form-group">
                    <label for="">Thương hiệu</label>
                    <select name="prod_brand" class="form-control" required>
                        <option value="">Chọn thương hiệu</option>
                        <?php
                            $data = getDataBrandList($obj);
                            foreach ($data as $item) {
                        ?>
                            <option value="<?php echo $item['brand_id']; ?>" <?php if (isset($_POST["prod_brand"]) && $_POST["prod_brand"] == $item["brand_id"]) echo "selected"; ?>><?php echo $item['brand_name']; ?></option>
                        <?php } ?>
                    </select>
               </div>
               <div class="form-group">
                   <label for="">Loại</label>
                   <select name="prod_type" class="form-control" required>
                        <option value="">Chọn loại</option>
                        <?php
                            $data = getDataCategoryList($obj);
                            foreach ($data as $item) {
                        ?>
                            <option value="<?php echo $item['cate_id']; ?>" <?php if (isset($_POST["prod_type"]) && $_POST["prod_type"] == $item["cate_id"]) echo "selected"; ?>><?php echo $item['cate_name']; ?></option>
                        <?php } ?>
                    </select>
               </div>
               <div class="form-group">
                   <label for="">Ảnh sản phẩm</label>
                   <input type="file" name="prod_image" require>
               </div>
               <button name="btn-submit" class="btn btn-success" type="submit">Thêm</button>
           </form>
        </div>
    </div>
</div>