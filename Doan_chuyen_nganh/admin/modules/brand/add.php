<?php
    if (isset($_POST["btn-submit"])) {
        $data = array();
        $errors = array();
        $data["brand_id"]= $_POST["brand_id"];
        $data["brand_name"]= $_POST["brand_name"];

        if(empty($_POST["brand_id"])){
            $errors[]= "Mã thương hiệu không được để trống";
        } else {
            if(checkBrandIdExist($obj, $data)){
                $errors[]="Mã này đã tồn tại";
            }
        }

        if(empty($_POST["brand_name"])){
            $errors[]= "Tên thương hiệu không được để trống";
        }else {
            if(checkBrandNameExist($obj, $data)){
                $errors[]= "Thương hiệu này đã tồn tại";
            }
        }

        if (empty($errors)) {
            addBrandData($obj, $data);
            header("Location:index.php?d=place&m=brand&p=list");
            exit();
        }

        if (!empty($errors)){
?>
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-ban"></i> Thông báo!</h5>
    <?php foreach ($errors as $error) { echo '<li>'.$error.'</li>'; } ?>
</div>
<?php
        }
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
                   <label for="">Mã thương hiệu</label>
                   <input class="form-control" type="text" name="brand_id" require
                   <?php if (isset($_POST["brand_id"])) echo 'value="'.$_POST["brand_id"].'"' ?>>
               </div>
               <div class="form-group">
                   <label for="">Tên thương hiệu</label>
                   <input class="form-control" type="text" name="brand_name" require
                        <?php if (isset($_POST["brand_name"])) echo 'value="'.$_POST["brand_name"].'"' ?>
                    >
               </div>
               <button name="btn-submit" class="btn btn-success" type="submit">Thêm</button>
           </form>
        </div>
    </div>
</div>