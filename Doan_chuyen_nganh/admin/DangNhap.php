<?php
    session_start();
    include "../connect.php";
    
        $error = "";
        if(isset($_POST['btnSubmit'])){
            $sm = $obj->prepare("SELECT * FROM t_account");
            $sm->execute();
            $data = $sm->fetchAll();
            foreach($data as $key => $value){
                if($value['level'] == 1){
                    $username = $value['username'];
                    $password = $value['password'];
                    $level = $value['level'];
                }
            }
            if($_POST['txtUsername'] =="" || $_POST['txtPassword']==""){
                $error="<p class= 'error'>Username hoac Password ko dc de trong</p>";
            }
            else if($_POST['txtUsername'] != $username){
                $error="<p class= 'error'>Nhap sai Username</p>";
            }
            else if($_POST['txtPassword'] != $password){
                $error="<p class= 'error'>Nhap sai Password</p>";
            }
            
            elseif($_POST['txtUsername'] == $username && $_POST['txtPassword'] == $password){
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['level'] = $level;
                header('Location: index.php');
            }
        }
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/dist/css/style.css">
    <script src="https://kit.fontawesome.com/00eabf4fb5.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <title>sign in</title>
</head>
<body>
    <div class="wrapper">
        <div class="background" >
            <form class="login_form" action="DangNhap.php" method="post">
                <span class="login_form_logo">
                    <i class="fas fa-user-tie"></i>
                </span>
                <p class="sign">sign in</p>
                <div class="textbox">
                    <i class="fas fa-user"></i>
                    <input class="input" type="text" name="txtUsername" placeholder="Username" >
                </div>
                <div class="textbox">
                    <i class="fas fa-lock"></i>
                    <input class="input" type="password" name="txtPassword" placeholder="Password">
                    
                </div>
                <?php echo $error; ?>
                <input class="btn_login" name="btnSubmit" type="submit" value="sign in">
            </form>
        </div>
    </div>
</body>
</html>