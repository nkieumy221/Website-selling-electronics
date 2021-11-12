<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/grid.css">
    <link rel="stylesheet" href="./assets/css/cart.css">
    <link rel="stylesheet" href="./assets/css/payment.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="./assets/js/productDetails.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <div class="main">
        <?php
            include('./inc/header.php'); 
        ?>
        <div class="app__container">
            <div class="grid wide">
                <div class="row sm-gutter app__header">
                    <span class="title-direct"><a href="index.html">Thanh toán</a></span>
                    <span class="title-page"> / Chọn phương thức thanh toán</span>
                </div>
                <div class="progress__payment mt-32">
                    <div class="progress__step">
                        <div class="progress__step-number progress__step-number--active">1</div>
                        <div class="progress__step-name">
                            Phương thức thanh toán
                        </div>
                        <div class="progress__bar progress_bar--active"></div>
                    </div>
                    <div class="progress__step">
                        <div class="progress__step-number progress__step-number--active">2</div>
                        <div class="progress__step-name">
                            Thông tin đơn hàng
                        </div>
                        <div class="progress__bar"></div>
                    </div>
                    <div class="progress__step">
                        <div class="progress__step-number">3</div>
                        <div class="progress__step-name">
                            Hoàn thành
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col c-6">
                         <div class="products__list">
                            <ul class="row sm-gutter cart__header">
                                <li class="col c-2-5 cart__header-name">ID</li>
                                <li class="col c-2-5 cart__header-name">Tên sản phẩm</li>
                                <li class="col c-2-5 cart__header-name">Giá </li>
                                <li class="col c-2-5 cart__header-name">Số lượng</li>
                                <li class="col c-2-5 cart__header-name">Tổng</li>
                            </ul>
                            <div class="cart__body">
                                <ul class="row product__infor ">
                                    <li class="col c-2-5 product__img">
                                        1
                                    </li>
                                    <li class="col c-2-5 product__name">
                                        iPhone 12 64GB
                                    </li>
                                    <li class="col c-2-5 product__price">
                                        19.999.000 ₫
                                    </li>
                                    <li class="col c-2-5 product__quatity">
                                        1
                                    </li>
                                    <li class="col c-2-5 product__total">
                                        19.999.000 ₫
                                    </li>
                                </ul>
                                <ul class="row product__infor ">
                                    <li class="col c-2-5 product__img">
                                        2
                                    </li>
                                    <li class="col c-2-5 product__name">
                                        iPhone 12 64GB
                                    </li>
                                    <li class="col c-2-5 product__price">
                                        19.999.000 ₫
                                    </li>
                                    <li class="col c-2-5 product__quatity">
                                        1
                                    </li>
                                    <li class="col c-2-5 product__total">
                                        19.999.000 ₫
                                    </li>
                                </ul>
                            </div>
                            <ul class="row cart__foot">
                                <li class="col c-60"></li>
                                <li class="col c-2-5 total"><b>Tổng</b></li>
                                <li class="col c-2-5 product__total">12.244.555đ</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col c-6">
                        <div class="user__infor">
                            <ul class="row sm-gutter cart__header">
                                <li class="col c-12 cart__header-name">Thông tin khách hàng</li>
                            </ul>
                            <ul class="user__infor-list">
                                <li class="user__infor-item">
                                    <div class="user__title">
                                        Tên khách hàng:
                                    </div> 
                                    <div class="user__detail">
                                        Mây
                                    </div>
                                </li>
                                <li class="user__infor-item">
                                    <div class="user__title">
                                        Số điện thoại:
                                    </div> 
                                    <div class="user__detail">
                                        Mây
                                    </div>
                                </li>
                                <li class="user__infor-item">
                                    <div class="user__title">
                                        Địa chỉ:
                                    </div> 
                                    <div class="user__detail">
                                        Mây
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="row cart__foot">
                    <li class="col c-2 btn btn--warning"><a href="">Quay lại</a></li>
                    <li class="col c-8"></li>
                    <li class="col c-2 btn btn--warning"><a href="">Tiếp theo</a></li>
                </ul>
                
            </div>
        </div>
        <?php include('./inc/footer.php'); ?>
    </div>
</body>
</html>