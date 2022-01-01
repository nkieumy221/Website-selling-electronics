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
                        <div class="progress__bar progress_bar--active"></div>
                    </div>
                    <div class="progress__step">
                        <div class="progress__step-number progress__step-number--active">2</div>
                        <div class="progress__step-name ">
                            Thông tin đơn hàng
                        </div>
                        <div class="progress__bar progress_bar--active"></div>
                    </div>
                    <div class="progress__step">
                        <div class="progress__step-number progress__step-number--active">3</div>
                        <div class="progress__step-name ">
                            Hoàn thành
                        </div>
                    </div>
                </div>
                <div class="notify">
                    <div class="notify__success-icon">
                        <i class="far fa-check-circle"></i>
                    </div>
                    <div class="notify__success">
                        Đặt hàng thành công
                    </div>
                    <?php 
                        $customerId = Session::get('customerId');
                        $getAmount = $cartClass->getAmountPrice($customerId);
                        if($getAmount){
                            $amount = 0;
                            while($result = $getAmount->fetch_assoc()){
                                $price = $result['Gia'];
                                $amount += $price;
                            }
                        }
                    ?>
                    <div class="notify__infor">
                        <p>Chúng tôi sẽ liên hệ với bạn sớm nhất có thể</p>
                        <p>Kiểm tra đơn hàng <a href="orderDetails.php">tại đây</a></p>
                    </div>
                    <a href="" class="return-home-btn">
                        Trở về trang chủ
                    </a>
                </div>
        
            </div>        
        </div>
        <?php include('./inc/footer.php'); ?>
    </div>
</body>
</html>