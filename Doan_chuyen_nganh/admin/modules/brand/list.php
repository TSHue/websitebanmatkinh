<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Danh sách Thương hiệu
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>STT</th>
                        <th>Mã thương hiệu</th>
                        <th>Tên thương hiệu</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $data = getDataBrandList($obj);
                        $i=0;
                        foreach ($data as $value) {
                            $i++;
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $value['brand_id'];?></td>
                                    <td><?php echo $value['brand_name'];?></td>
                                    <td>
                                        <a class="btn btn-danger" onclick="return acceptDelete('Bạn có thực sự muốn xóa thương hiệu này không?')" href="index.php?m=brand&p=delete&id=<?php echo $value["brand_id"]?>"><i class="far fa-trash-alt"> Xóa</i></a>
                                        &nbsp;
                                        <a class="btn btn-primary" href="index.php?m=brand&p=edit&id=<?php echo $value["brand_id"]?>"><i class="fas fa-edit"> Sửa</i></a>
                                    </td>
                                </tr>
                            <?php
                        }
                        
                    ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="index.php?m=brand&p=add"><button type="submit" name="them" class="btn btn-primary"><i class="fas fa-plus"> Thêm</i></button></a>
        </div>
    </div>
</div>