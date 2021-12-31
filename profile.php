<?php 
    include('./lib/handle.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/grid.css">
    <link rel="stylesheet" href="./assets/css/profile.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="./assets/js/productDetails.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <div class="main">
        <?php include('./inc/header.php'); ?>
        <div class="app__container">
            <div class="grid wide">
                <div class="row">
                    <div class="col c-3 mt-16">
                        <ul class="slider__bar">
                            <li class="slider__header">
                                <img src="https://i.pinimg.com/736x/21/2d/12/212d12e421963f8a66f95aece1182069.jpg" alt="" class="user__img">
                                <div class="user__infor">
                                    <div class="user__name">
                                        <?php echo Session::get('customerName'); ?>
                                    </div>
                                    <div class="user__edit">
                                        <a href="editProfile.php" class="">
                                            <i class="far fa-edit"></i>
                                            Sửa hồ sơ
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="slider__item mt-16">
                                <i class="far fa-user"></i>
                                <a href="#" class="slider__link slider__link--active">Tài khoản của tôi</a>
                            </li>
                            <li class="slider__item">
                                <i class="fas fa-compress"></i>
                                <a href="compareProduct.php" class="slider__link">So sánh sản phẩm</a>
                            </li>
                            <li class="slider__item">
                                <i class="far fa-heart"></i>
                                <a href="wishlist.php" class="slider__link">Sản phẩm yêu thích</a>
                            </li>
                            <li class="slider__item">
                                <i class="far fa-list-alt"></i>
                                <a href="orderDetails.php" class="slider__link">Đơn hàng</a>
                            </li>
                            <li class="slider__item">
                                <i class="far fa-question-circle"></i>
                                <a href="user_recommendation.php" class="slider__link">Hệ thống gợi ý sản phẩm</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col c-9 pd-body mt-16">
                        <div class="body__header">
                            <h3 class="title">Hồ Sơ Của Tôi</h3> <br>
                            <p class="subtitle">Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                        </div>
                        <div class="body__content">
                            <table class="tblone">
                                <?php
                                    $login_check = Session::get('customerLogin'); 
                                    if($login_check==false){
                                        header('Location:index.php');
                                    }
                                    
                                    $id = Session::get('customerId');
                                    
                                    $getCustomers = $customerClass->showCustomer($id);
                                    if($getCustomers){
                                        while($result = $getCustomers->fetch_assoc()){
                                ?>
                                <tr>
                                    <td class="tb__title">Tên khách hàng</td>
                                    <td class="tb__infor"><?php echo $result['TenKhachHang']; ?></td>
                                </tr>
                                <tr>
                                    <td class="tb__title">Địa chỉ</td>
                                    <td class="tb__infor"><?php echo $result['DiaChi'] ?></td>
                                </tr>
                                <tr>
                                    <td class="tb__title">Số điện thoại</td>
                                    <td class="tb__infor"><?php echo $result['DienThoai'] ?></td>
                                </tr>
                                <tr>
                                    <td class="tb__title">Zipcode</td>
                                    <td class="tb__infor"><?php echo $result['zipcode'] ?></td>
                                </tr>
                                <tr>
                                    <td class="tb__title">Email</td>
                                    <td class="tb__infor"><?php echo $result['Email'] ?></td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </table>
                            <div class="img__infor">
                                <img src="https://i.pinimg.com/736x/21/2d/12/212d12e421963f8a66f95aece1182069.jpg" alt="" class="">
                                <div class="user__edit text-center mt-16">
                                    <a href="editProfile.php" class="">
                                        <i class="far fa-edit"></i>
                                        Sửa hồ sơ
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
            <?php include('./inc/footer.php'); ?>
        </div>
</body>
</html>