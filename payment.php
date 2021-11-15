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
        <?php include('./inc/header.php'); ?>
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
                        <div class="progress__bar"></div>
                    </div>
                    <div class="progress__step">
                        <div class="progress__step-number">2</div>
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

                <div class="choose__table mt-32">
                    <ul class="choose__list">
                        <li class="choose__title">
                            <h1>Chọn phương thức thanh toán</h1>
                        </li>
                        <li class="option">
                            <a href="" class="option__link">
                                <img src="./assets/img/vnpay400.jpg" class="option__img" alt="">
                                <div class="option__name">
                                    Thanh toán bằng VNPAY
                                </div>
                            </a>
                        </li>
                        <li class="option">
                            <a href="billDetail.php" class="option__link">
                                <img src="./assets/img/paycash.jpg" class="option__img" alt="">
                                <div class="option__name">
                                    Thanh toán khi nhận hàng
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                
            </div>
        </div>
        <?php include('./inc/footer.php'); ?>
    </div>
</body>
</html>