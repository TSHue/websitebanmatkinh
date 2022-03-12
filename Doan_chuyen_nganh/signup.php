<?php
    function createClientAccount($conn, $data){
        $sm = $conn->prepare("INSERT INTO t_account (username, email, password, level) VALUES (:username, :email, :password, :level)");
        $sm->bindParam(":username", $data['username'], PDO::PARAM_STR);
        $sm->bindParam(":email", $data['email'], PDO::PARAM_STR);
        $sm->bindParam(":password", $data['password'], PDO::PARAM_STR);
        $sm->bindParam(":level", $data['level'], PDO::PARAM_INT);
        $sm->execute();
    }

    function checkAccountNameExist($conn, $data) {
        $sm_check = $conn->prepare("SELECT * FROM t_account WHERE username = :username");
        $sm_check->bindParam(":username", $data["username"], PDO::PARAM_STR);
        $sm_check->execute();
        $count = $sm_check->rowCount();
        if ($count != 0) return true;
        return false;
    }

    function checkAccountEmailExist($conn, $data) {
        $sm_check = $conn->prepare("SELECT * FROM t_account WHERE email = :email");
        $sm_check->bindParam(":email", $data["email"], PDO::PARAM_STR);
        $sm_check->execute();
        $count = $sm_check->rowCount();
        if ($count != 0) return true;
        return false;
    }

    if (isset($_POST['signup'])) {
        $data = array();
        $data['username'] = $_POST['username'];
        $data['email'] = $_POST['email'];
        if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])){
            ?>
            <script>alert('Username hoặc Password hoặc Email ko đc để trống');</script>
            <?php
        } 
        else if (checkAccountNameExist($obj, $data)) {
            ?>
            <script>alert('Username này đã tồn tại. Xin hãy đổi tên khác');</script>
            <?php
        }
        else if (checkAccountEmailExist($obj, $data)) {
            ?>
            <script>alert('Email này đã tồn tại. Xin hãy đổi email khác');</script>
            <?php
        }
        else{
            $data['password'] = $_POST['password'];
            $data['level'] = 2;
            createClientAccount($obj, $data);
            ?>
            <script>alert('Chúc mừng bạn đã đăng ký thành công. Mời bạn đăng nhập để tiếp tục mua sắm');</script>
            <?php
        }
    }
?>
<div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">                      
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Đăng ký</h4>
                <form class="aa-login-form" action="" method="POST">
                <label for="">Username<span>*</span></label>
                <input type="text" name="username" placeholder="Username" require>
                <label for="">Password<span>*</span></label>
                <input type="password" name="password" placeholder="Password">
                <label for="">Email<span>*</span></label>
                <input type="text" name="email" placeholder="Email" require>
                <button class="aa-browse-btn" type="submit" name="signup">Signup</button>
                <label for="rememberme" class="rememberme"> &emsp; </label>
                </form>
            </div>                        
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div> 