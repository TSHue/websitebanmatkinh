<?php
if(!isset($_GET["id"])){
    header("location:index.php?m=brand&p=list");
    exit();
}else{
    $data["brand_id"] = $_GET["id"];
    $brand = getDataBrand($obj, $data["brand_id"]);
    if (isset($_POST["btn-edit"])) {
        $data["brand_name"] = $_POST["brand_name"];
        $errors = array();
        if (empty($_POST["brand_name"])) {
            $errors[] = "Tên thương hiệu không được để trống";
        } else {
            if(checkBrandExistById($obj, $data)){
                $errors[]= "Thương hiệu này đã tồn tại";
            }
        }
        if (empty($errors)) {
            editBrandData($obj, $data);
            header("location:index.php?m=brand&p=list");
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
                Chỉnh sửa thương hiệu
            </div>
            <div class="card-body">
                <form role="form" action="" method="post">
                    <div class="form-group">
                        <label for="">Tên thương hiệu</label>
                        <input class="form-control" type="text" name="brand_name"
                        value="<?php if (isset($_POST["brand_name"])) echo $_POST["brand_name"]; else echo $brand["brand_name"] ?>"
                        >
                    </div>
                    <button name="btn-edit" class="btn btn-success" type="submit">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>