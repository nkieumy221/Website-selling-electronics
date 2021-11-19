<?php 
    include('../lib/session.php'); 
    Session::checkSession();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <div class="header__left">
            <div class="header__logo">
                <img src="../assets/img/foxu.png" alt="" class="header__logo-img">
            </div>
            <div class="header__search">                
                <i class="fas fa-search icon"></i>
                <input class="input-field" 
                        type="text" 
                        placeholder="Tìm kiếm..."
                        name="search">
            </div>
        </div>
        <div class="header__right">
            <div class="notify__bell">
                <a href="inbox.php">
                    <i class="fas fa-bell"></i>
                </a>
            </div>
            <div class="user__name">
                Hello 
                <b> <?php echo Session::get('adminName'); ?></b>
            </div>

            <?php 
                if(isset($_GET['action']) && $_GET['action'] == 'logout'){
                    Session::destroy();
                } 
            ?>
            <div class="logout-btn">
                <a href="?action=logout"class="logout__link">
                    Đăng xuất
                </a>
            </div>
        </div>
    </div>
</body>
</html>