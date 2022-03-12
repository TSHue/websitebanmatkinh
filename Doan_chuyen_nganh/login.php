<?php
    function checkAccountExistLogin($conn, $data){
        $sm = $conn->prepare("SELECT * FROM t_account WHERE username = :username");
        $sm->bindParam(":username", $data['username'], PDO::PARAM_STR);
        $sm->execute();
        $count = $sm->rowCount();
        if($count != 0)
            return true;
        return false;
    }
     function getDataAccount($conn, $data){
        $sm = $conn->prepare("SELECT * FROM t_account WHERE username = :username");
        $sm->bindParam(":username", $data['username'], PDO::PARAM_STR);
        $sm->execute();
        $account = $sm->fetchAll(PDO::FETCH_ASSOC);
        return $account;
    }

    if (isset($_POST['login'])) {
        $data = array();
        $error = "";
        if ($_POST['username'] == "" || $_POST['password'] == "") {
            ?>
            <script>alert('Username hoac Password ko dc de trong');</script>
            <?php
        } else {
            $data['username'] = $_POST['username'];
            $data['password'] = $_POST['password'];
            $data['level'] = 2;
            if (checkAccountExistLogin($obj, $data)) {
                $account = getDataAccount($obj, $data);
                foreach ($account as $value) {
                    $username = $value['username'];
                    $password = $value['password'];
                    $level = $value['level'];
                }
                if ($password == $_POST['password']) {
                    $_SESSION['loginclient']['username'] = $username;
                    $_SESSION['loginclient']['password'] = $password;
                    $_SESSION['loginclient']['level'] = $level;
                    header('Location: index.php');
                    exit;
                }else {
                    ?>
                    <script>alert('Nhập sai Password');</script>
                    <?php
                }
            }else {
                ?>
                <script>alert('Tài khoản không tồn tại');</script>
                <?php
            }
        }
    }
?>
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">                      
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Đăng nhập</h4>
                <form class="aa-login-form" action="index.php" method="POST">
                    <label for="">Username<span>*</span></label>
                    <input type="text" name="username" placeholder="Username">
                    <label for="">Password<span>*</span></label>
                    <input type="password" name="password" placeholder="Password">
                    <button class="aa-browse-btn" type="submit" name="login">Login</button>
                    <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
                </form>
            </div>                        
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div> 