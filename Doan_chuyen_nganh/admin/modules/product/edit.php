<?php
if(!isset($_GET["id"])){
    header("location:index.php?m=product&p=list");
    exit();
}else {
    $data["prod_id"] = $_GET["id"];
    $prod = getDataProduct($obj, $data["prod_id"]);
    if (isset($_POST["btn-edit"])) {
        $data["prod_name"]= $_POST["prod_name"];
        $errors = array();

        if (empty($_POST["prod_name"])) {
            $errors[] = "Tên sản phẩm không được để trống";
        }

        if (empty($_POST["price"])) {
            $errors[] = "Giá sản phẩm không được để trống";
        }

        if (!empty($_FILES['prod_image']["name"])) {
            $data['prod_image']= time() . "-" . $_FILES['prod_image']["name"];
            $data["image_tmp"] = $_FILES["prod_image"]["tmp_name"];
            $strposImage = mb_strrpos($data['prod_image'], ".");
            $substrImage = mb_substr($data['prod_image'], $strposImage + 1);
            if (($substrImage != 'jpg') && ($substrImage != 'jpeg') && ($substrImage != 'png') && ($substrImage != 'gif')) {
                $errors[] = "<li>Please enter the correct image file format (jpg, jpeg, png, gif).</li>";
            } else {
                $data["prod_image"] = time().'-'.$_FILES["prod_image"]["name"];
                $data["image_tmp"] = $_FILES["prod_image"]["tmp_name"];
                move_uploaded_file($data["image_tmp"], "../public/image/productimage/".$data["prod_image"]);
            }
        }

        if (empty($errors)) {
            $data["prod_desc"]= $_POST["prod_desc"];
            $data["price"]= $_POST["price"];
            $data["prod_brand"]= $_POST["prod_brand"];
            $data["prod_type"]= $_POST["prod_type"];
            editProductData($obj, $data);
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
            Sửa
        </div>
        <div class="card-body">
           <form role="form" method="post" action="" enctype="multipart/form-data">
               <div class="form-group">
                   <label for="">Tên sản phẩm</label>
                   <input class="form-control" type="text" name="prod_name"
                        value="<?php if (isset($_POST["prod_name"])) echo $_POST["prod_name"]; else echo $prod["prod_name"] ?>"
                   >
               </div>
               <div class="form-group">
                   <label for="">Mô tả</label>
                   <input class="form-control" type="text" name="prod_desc"
                   value="<?php if (isset($_POST["prod_desc"])) echo $_POST["prod_desc"]; else echo $prod["prod_desc"] ?>"
                   >
               </div>
               <div class="form-group">
                   <label for="">Giá</label>
                   <input class="form-control" type="number" name="price"
                   value="<?php if (isset($_POST["price"])) echo $_POST["price"]; else echo $prod["price"] ?>"
                   >
               </div>
               <div class="form-group">
                   <label>Thương hiệu</label>
                   <select name="prod_brand" class="form-control" required>
                        <option value="">Chọn thương hiệu</option>
                        <?php
                            $data = getDataBrandList($obj);
                            foreach ($data as $item) {
                        ?>
                            <option value="<?php echo $item['brand_id']; ?>" <?php if ((isset($_POST["prod_brand"]) && $_POST["prod_brand"] == $item["brand_id"]) || $prod["prod_brand"] == $item["brand_id"]) echo "selected"; ?>><?php echo $item['brand_name']; ?></option>
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
                            <option value="<?php echo $item['cate_id']; ?>" <?php if ((isset($_POST["prod_type"]) && $_POST["prod_type"] == $item["cate_id"]) || $prod["prod_type"] == $item["cate_id"]) echo "selected"; ?>><?php echo $item['cate_name']; ?></option>
                        <?php } ?>
                    </select>
               </div>
               <div class="form-group">
                   <label for="">Ảnh sản phẩm</label>
                   <input type="file" name="prod_image" require>
                   <br>
                   <img  width="80px" height="80px" src="../public/image/productimage/<?php echo $prod['prod_image']; ?>" alt="">
               </div>
               <button name="btn-edit" class="btn btn-success" type="submit">Sửa</button>
           </form>
        </div>
    </div>
</div>
<?php
}
?>