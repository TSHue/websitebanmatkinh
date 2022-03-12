<?php
if(!isset($_GET["id"])){
    header("location:index.php?m=category&p=list");
    exit();
} else {
    $data["cate_id"] = $_GET["id"];
    $cate = getDataCategory($obj, $data["cate_id"]);
    if (isset($_POST["btn-edit"])) {
        $errors = array();
        $data["cate_name"] = $_POST["cate_name"];
        if (empty($_POST["cate_name"])) {
            $errors[] = "Tên loại không được để trống";
        } else {
            if(checkCategoryExistById($obj, $data)){
                $errors[]= "Loại này đã tồn tại";
            }
        }
        if (empty($errors)) {
            editCategoryData($obj, $data);
            header("location:index.php?m=category&p=list");
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
            <form role="form" action="" method="post">
                <div class="form-group">
                    <label for="">Tên loại</label>
                    <input class="form-control" type="text" name="cate_name"
                        value="<?php if (isset($_POST["cate_name"])) echo $_POST["cate_name"]; else echo $cate["cate_name"] ?>"
                        autofocus
                    >
                </div>
                <button name="btn-edit" class="btn btn-success" type="submit">Sửa</button>
            </form>
            </div>
        </div>
    </div>
<?php
}
?>