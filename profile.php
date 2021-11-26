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
                    <div class="col c-3">
                        <ul class="slider__bar">
                            <li class="slider__item">
                                <a href="#" class="slider__link">Thông tin khách hàng</a>
                            </li>
                            <li class="slider__item">
                                <a href="compareProduct.php" class="slider__link">So sánh sản phẩm</a>
                            </li>
                            <li class="slider__item">
                                <a href="wishlist.php" class="slider__link">Sản phẩm yêu thích</a>
                            </li>
                            <li class="slider__item">
                                <a href="orderDetails.php" class="slider__link">Đơn hàng</a>
                            </li>
                            <li class="slider__item">
                                <a href="user_recommendation.php" class="slider__link">Hệ thống gợi ý sản phẩm</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col c-9">
                        <div class="row sm-gutter app__header">
                            <h2 class="title-direct"><a href="">THÔNG TIN KHÁCH HÀNG</a></h2>
                        </div>
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
                                <td>Tên khách hàng</td>
                                <td>:</td>
                                <td><?php echo $result['TenKhachHang'] ?></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td>:</td>
                                <td><?php echo $result['DiaChi'] ?></td>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td>:</td>
                                <td><?php echo $result['DienThoai'] ?></td>
                            </tr>
                            <tr>
                                <td>Zipcode</td>
                                <td>:</td>
                                <td><?php echo $result['zipcode'] ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><?php echo $result['Email'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="3"><a href="editProfile.php" class="btn btn--gray">Update Profile</a></td>
                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
            <?php include('./inc/footer.php'); ?>
        </div>
</body>
</html>