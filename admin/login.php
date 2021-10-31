<?php
    include('../classes/adminlogin.php');

    $class = new adminLogin();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $adminUser = $_POST['adminUser'];
        $adminPassword = md5($_POST['adminPassword']);
        $login_check = $class->login_admin($adminUser, $adminPassword);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/grid.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="./assets/js/productDetails.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <div class="main">
        <div class="container">
            <form action="login.php" method="post" class="form__login">
                <div class="form__icon">
                    <i class="far fa-user"></i>
                </div>
                <h1 class="form__title">
                    Đăng nhập hệ thống quản lý bán hàng
                </h1>
                <div class="input-icons">
                    <i class="fa fa-user icon"></i>
                    <input class="input-field" 
                           type="text" 
                           placeholder="Username"
                           name="adminUser"
                           required="">
                </div>
                <div class="input-icons">
                    <i class="fas fa-unlock-alt icon"></i>
                    <input class="input-field" 
                           type="password" 
                           placeholder="Password"
                           name="adminPassword"
                           required="" >
                </div>
                <div class="login__btn">
                    <?php 
                        if(isset($login_check)){
                            echo $login_check;
                            echo $adminUser;
                            echo $adminPassword;
                        }
                    ?>
                </div>
                <div class="login__btn">
                    <input type="submit" value="Đăng nhập" class="btn btn-login mt-16">
                </div>
            </form>
        </div>
    </div>
</body>
</html>