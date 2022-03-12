<?php
    if (isset($_POST["btn-submit"])) {
        $data = array();
        $errors = array();
        $data["cate_id"]= $_POST["cate_id"];
        $data["cate_name"]= $_POST["cate_name"];

        if (empty($_POST["cate_id"])) {
            $errors[]= "Mã loại không được để trống";
        }else{
            if(checkCategoryIdExist($obj, $data)){
                $errors[]="Mã này đã tồn tại";
            }
        }

        if(empty($_POST["cate_name"])){
            $errors[]= "Tên loại không được để trống";
        }else {
            if(checkCategoryNameExist($obj, $data)){
                $errors[]= "Loại này đã tồn tại";
            }
        }

        if (empty($errors)) {
            addCategoryData($obj, $data);
            header("Location:index.php?d=place&m=category&p=list");
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
           <form role="form" action="" method="post">
               <div class="form-group">
                   <label for="">Mã loại</label>
                   <input class="form-control" type="text" name="cate_id" require
                   <?php if (isset($_POST["cate_id"])) echo 'value="'.$_POST["cate_id"].'"' ?>>
               </div>
               <div class="form-group">
                   <label for="">Tên loại</label>
                   <input class="form-control" type="text" name="cate_name" require
                   <?php if (isset($_POST["cate_name"])) echo 'value="'.$_POST["cate_name"].'"' ?>>
               </div>
               <button name="btn-submit" class="btn btn-success" type="submit">Thêm</button>
           </form>
        </div>
    </div>
</div>