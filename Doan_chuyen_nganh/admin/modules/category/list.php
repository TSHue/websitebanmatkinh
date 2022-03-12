<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Danh sách Loại
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>STT</th>
                        <th>Mã loại</th>
                        <th>Tên loại</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $data = getDataCategoryList($obj);
                        $i=0;
                        foreach ($data as $key => $value) {
                            $i++;
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $value['cate_id'];?></td>
                                    <td><?php echo $value['cate_name'];?></td>
                                    <td>
                                        <a class="btn btn-primary" href="index.php?m=category&p=edit&id=<?php echo $value["cate_id"]?>"><i class="fas fa-edit"> Sửa</i></a>
                                        &nbsp;
                                        <a class="btn btn-danger" onclick="return acceptDelete('Bạn có thực sự muốn xóa loại sản phẩm này không?')" href="index.php?m=category&p=delete&id=<?php echo $value["cate_id"]?>"><i class="far fa-trash-alt"> Xóa</i></a>
                                    </td>
                                </tr>
                            <?php
                        }
                        
                    ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="index.php?m=category&p=add"><button type="submit" name="them" class="btn btn-primary"><i class="fas fa-plus"> Thêm</i></button></a>
        </div>
        </div>
    </div>
</div>