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
                <div class="row sm-gutter app__header">
                    <span class="title-direct"><a href="index.html">Trang chủ</a></span>
                    <span class="title-page"> / Giỏ hàng</span>
                </div>
                <div class="products__list mt-32">
                    <ul class="row sm-gutter cart__header">
                        <li class="col c-2 cart__header-name">Hình ảnh </li>
                        <li class="col c-2 cart__header-name">Tên sản phẩm</li>
                        <li class="col c-2 cart__header-name">Giá </li>
                        <li class="col c-2 cart__header-name">Số lượng</li>
                        <li class="col c-2 cart__header-name">Tổng</li>
                        <li class="col c-2 cart__header-name"></li>
                    </ul>
                    <div class="cart__body">
                        <ul class="row product__infor ">
                            <li class="col c-2 product__img">
                                <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/1/637686973775896947_ip-12-dd.jpg" alt="">
                            </li>
                            <li class="col c-2 product__name">
                                iPhone 12 64GB
                            </li>
                            <li class="col c-2 product__price">
                                19.999.000 ₫
                            </li>
                            <li class="col c-2 product__quatity">
                                1
                            </li>
                            <li class="col c-2 product__total">
                                19.999.000 ₫
                            </li>
                            <li class="col c-2 delete-btn">
                                <i class="far fa-trash-alt"></i>
                            </li>
                        </ul>
                        <ul class="row product__infor ">
                            <li class="col c-2 product__img">
                                <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/1/637686973775896947_ip-12-dd.jpg" alt="">
                            </li>
                            <li class="col c-2 product__name">
                                iPhone 12 64GB
                            </li>
                            <li class="col c-2 product__price">
                                19.999.000 ₫
                            </li>
                            <li class="col c-2 product__quatity">
                                1
                            </li>
                            <li class="col c-2 product__total">
                                19.999.000 ₫
                            </li>
                            <li class="col c-2 delete-btn">
                                <i class="far fa-trash-alt"></i>
                            </li>
                        </ul>
                        <ul class="row">
                            <div class="col c-10"></div>
                            <div class="col c-2">
                                <div class="btn btn--warning">
                                    <a href="">Cập nhập giỏ hàng</a>
                                </div>
                            </div>
                        </ul>
                    </div>
                    <ul class="row cart__foot">
                        <li class="col c-2 btn btn--warning"><a href="">Tiếp tục mua hàng</a></li>
                        <li class="col c-4"></li>
                        <li class="col c-2 total"><b>Tổng</b></li>
                        <li class="col c-2 product__total">12.244.555đ</li>
                        <li class="col c-2 btn btn--primary"><a href="">Thanh toán</a></li>
                    </ul>
                </div>
                
            </div>
        </div>
        <?php include('./inc/footer.php'); ?>
    </div>
</body>
</html>