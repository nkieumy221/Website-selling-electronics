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
                    <span class="title-direct"><a href="">THÔNG TIN KHÁCH HÀNG</a></span>
                </div>

                <div class="local mt-32">
                <?php
                    $products = $recommendation->ratingProductQuery();
                    $matrix = array();
                    while($row = $products->fetch_assoc()){
                        $user = $recommendation->getUserName($row['IDUser']);
                        $userName = mysqli_fetch_array($user);
                        $product = $recommendation->getProductName($row['IDProduct']);
                        $productName = mysqli_fetch_array($product);
                        $matrix[$userName['username']][$productName['TenSanPham']] = $row['Rating'];
                    }
                ?>
                    <div class="sale__list row">
                        <?php 
                        $recommen = array();
                        $userActive = Session::get('customerName');
                        $recommen = getRecommendation($matrix,$userActive); 
                        foreach($recommen as $movie => $rating){
                            $product = $recommendation->getProductByName($movie);
                            while($row = $product->fetch_assoc()){
         
                        ?>
                        <div class="col c-3 sale__item">
                            <a href="productDetail.php?productId=<?= $row['ID'] ?>" class="sale__item-link">
                                <div class="sale__item-img">
                                    <img src="<?= $row['HinhAnh'] ?>" alt="" >
                                </div>
                                <div class="sale__item-name">
                                    <?= $row['TenSanPham'] ?>
                                </div>
                                <div class="sale__item-price">
                                    <div class="sale__item-price-sale">
                                        <?= number_format($row['GiaKM']) ?> đ
                                    </div>
                                    <div class="sale__item-price-origin">
                                        <?= number_format($row['GiaGoc']) ?> đ
                                    </div>
                                </div>
                                <div class="sale__item-config mt-16">
                                    <div class="sale__item-infor">
                                        <div class="item-infor__detail">
                                            <i class="fal fa-archive"></i>
                                            <?= $row['CPU'] ?>
                                        </div>
                                        <div class="item-infor__detail">
                                            <i class="fas fa-mobile-alt"></i>
                                            <?= $row['ManHinh'] ?>
                                        </div>
                                        <div class="item-infor__detail">
                                            <i class="fas fa-microchip"></i>
                                            <?= $row['RAM'] ?>
                                        </div>
                                        <div class="item-infor__detail">
                                            <i class="far fa-hdd"></i>
                                            <?= $row['BoNho'] ?>
                                        </div>
                                    </div>
                                    <div class="sale__item-pay mt-16">
                                        <img src="./assets/img/vnpay400.jpg" alt="">
                                        Giảm thêm 5% tối đa 700.000đ
                                    </div>
                                </div>
                                <div class="sale__item-btn mt-16">
                                    <div class="btn btn--primary">
                                        MUA NGAY
                                    </div>
                                    <div class="btn btn--warning">
                                        GIỎ HÀNG
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php  
                            }
                                }
                            ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include('./inc/footer.php'); ?>
    </div>
</body>
</html>