<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Danh sách Sản phẩm
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Mã sản phẩm</th>
                        <th class="text-center">Tên sản phẩm</th>
                        <th class="text-center">Mô tả</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Thương hiệu</th>
                        <th class="text-center">Loại</th>
                        <th class="text-center">Hình</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $data = getDataProductList($obj);
                        $br = getDataBrandList($obj);
                        $i=0;
                        foreach ($data as $key => $value) {
                            $i++;
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $value['prod_id'];?></td>
                                    <td><?php echo $value['prod_name'];?></td>
                                    <td><?php echo $value['prod_desc'];?></td>
                                    <td><?php echo $value['price'];?></td>
                                    <td><?php foreach($br as $val){
                                        if ($val['brand_id']== $value['prod_brand']) {
                                            echo $val['brand_name']; 
                                        }
                                        }?>
                                    </td>
                                    <td><?php echo $value['prod_type'];?></td>
                                    <td><img style="width:100px" src="../public/image/productimage/<?php echo $value['prod_image'];?>"></td>
                                    <td class="text-center">
                                        <a class="btn btn-primary" href="index.php?m=product&p=edit&id=<?php echo $value["prod_id"]?>"><i class="fas fa-edit"></i> Sửa</a>
                                        <a class="btn btn-danger" onclick="return acceptDelete('Bạn có thực sự muốn xóa sản phẩm này không?')" href="index.php?m=product&p=delete&id=<?php echo $value["prod_id"]?>"><i class="far fa-trash-alt"></i> Xóa</a>
                                    </td>
                                </tr>
                            <?php
                        }
                        
                    ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="index.php?m=product&p=add"><button type="submit" name="them" class="btn btn-primary"><i class="fas fa-plus"> Thêm</i></button></a>
        </div>
    </div>
</div>