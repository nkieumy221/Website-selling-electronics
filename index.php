<?php 
    include('./lib/handle.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/grid.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="./assets/js/index.js"></script>
    <!-- <meta http-equiv="refresh" content="5"> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>
<body>
    <div class="main">
        <?php
            include('./inc/header.php'); 
        ?>
        <div class="app__container">
            <div class="grid wide">
                <div class="row">
                    <div class="banner_sale mt-32">
                        <div class="banner_sale-img">
                            <img src="./assets/img/banner_sale.png" class="" alt="">
                        </div>
                    </div>
                </div>
                <!-- Banner slide -->
                <div class="local mt-86">
                    <div class="row">                
                        <div class="banner_slide col c-12 l-8 m-8">
                            <div class="banner_slide-img">
                                <img src="./assets/img/banner1.jpg" alt="banner1" class="mySlides">
                                <img src="./assets/img/banner2.jpg" alt="banner1" class="mySlides">
                                <img src="./assets/img/banner3.jpg" alt="banner1" class="mySlides">
                                <img src="./assets/img/banner4.jpg" alt="banner1" class="mySlides">
                                <img src="./assets/img/banner5.jpg" alt="banner1" class="mySlides">
                                <img src="./assets/img/banner6.jpg" alt="banner1" class="mySlides">

                                <div class="local-slide__left hide-on-mobile" onclick="plusSlides(-1)"><!-- local-slide__none-direct -->
                                    <i class="local-slide__left-icon fas fa-chevron-left"></i>
                                </div>
                                <div class="local-slide__right hide-on-mobile" onclick="plusSlides(1)">
                                    <i class="local-slide__left-icon fas fa-chevron-right"></i>
                                </div>
                            </div>
                            <ul class="banner_slide-list-title hide-on-mobile-tablet">
                                <li class="banner_slide-title-name banner_slide-title-name--active">
                                    Galaxy Z Fold3 | Z Flip3 5G bảo hành 2
                                </li>
                                <li class="banner_slide-title-name">
                                    Đăng kí trước siêu phẩm iPhone 13
                                </li>
                                <li class="banner_slide-title-name">
                                    Laptop bảo hành đến 3 năm - Giảm đến 15%
                                </li>
                                <li class="banner_slide-title-name">
                                    iPhone 12 Series giảm sốc đến 4 triệu
                                </li>
                                <li class="banner_slide-title-name">
                                    iPhone 12 Series giảm sốc đến 4 triệu
                                </li>
                                <li class="banner_slide-title-name banner_slide-title-name--active">
                                    Galaxy Z Fold3 | Z Flip3 5G bảo hành 2
                                </li>
                            </ul>

                            <script>
                                var slideIndex = 0;
                                showSlides(slideIndex);
                                
                                function plusSlides(n) {
                                  showSlides(slideIndex += n);
                                }
                                
                                function currentSlide(n) {
                                  showSlides(slideIndex = n);
                                }
                                
                                function showSlides(n) {
                                  var i;
                                  var slides = document.getElementsByClassName("mySlides");
                                  var dots = document.getElementsByClassName("banner_slide-title-name");
                                  if (n > slides.length) {slideIndex = 1}    
                                  if (n < 1) {slideIndex = slides.length}
                                  for (i = 0; i < slides.length; i++) {
                                      slides[i].style.display = "none";  
                                  }
                                  slideIndex++;
                                  if (slideIndex > slides.length) {slideIndex = 1}   
                                  for (i = 0; i < dots.length; i++) {
                                      dots[i].className = dots[i].className.replace(" banner_slide-title-name--active", "");
                                  }
                                  slides[slideIndex-1].style.display = "block";  
                                  dots[slideIndex-1].className += " banner_slide-title-name--active";
                                  setTimeout(showSlides, 2000);
                                }
                            </script>
                        </div>
                        <div class="banner_infor col c-4 hide-on-mobile">
                            <div class="banner_infor-img">
                                <img src="./assets/img/bn_min1.jpg" alt="" class="banner_slide-img">
                            </div>
                            <div class="banner_infor-img">
                                <img src="./assets/img/bn_min2.jpg" alt="" class="banner_slide-img">
                            </div>
                            <div class="banner_infor-highlight">
                                <div class="banner_infor-highlight-title">
                                    <div class="banner_infor-highlight-title--name">
                                        Thông tin nổi bật
                                    </div>
                                    <div class="banner_infor-highlight-title--more">
                                        <a href="">Xem tất cả</a>
                                    </div>
                                </div>
                                <div class="banner_infor-highlight-details">
                                    <a href="/" class="banner_infor-highlight-details-item">
                                        <div class="banner_infor-highlight-details-item--img">
                                            <img src="./assets/img/buge3.png" alt="">
                                        </div>
                                        <div class="banner_infor-highlight-details-item--name">
                                            Galaxy Buds2 - Tặng bao da chính hãng
                                        </div>
                                    </a>
                                    <a href="" class="banner_infor-highlight-details-item hide-on-mobile-tablet">
                                        <div class="banner_infor-highlight-details-item--img">
                                            <img src="./assets/img/oppoST.png" alt="">
                                        </div>
                                        <div class="banner_infor-highlight-details-item--name">
                                            OPPO Reno6 Z 5G ưu đãi hấp dẫn
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Category list -->
                <div class="local mt-32">
                    <div class="row hide-on-mobile">                
                        <a href class="col l-2 m-4 category__item">
                            <div class="category__item-img">
                                <img src="./assets/img/dien-thoai.png" alt="">
                            </div>
                            <div class="category__item-name">
                                Điện thoại
                            </div>
                        </a>
                        <a href class="col l-2 m-4 category__item">
                            <div class="category__item-img">
                                <img src="./assets/img/laptop.png" alt="">
                            </div>
                            <div class="category__item-name">
                                Laptop
                            </div>
                        </a>
                        <a href class="col l-2 m-4 category__item">
                            <div class="category__item-img">
                                <img src="./assets/img/apple.png" alt="">
                            </div>
                            <div class="category__item-name">
                                Apple
                            </div>
                        </a>
                        <a href class="col l-2 m-4 category__item">
                            <div class="category__item-img">
                                <img src="./assets/img/chuyentrangsamsung8_7.png" alt="">
                            </div>
                            <div class="category__item-name">
                                Samsung
                            </div>
                        </a>
                        <a href class="col l-2 m-4 category__item">
                            <div class="category__item-img">
                                <img src="./assets/img/smart-watch.png" alt="">
                            </div>
                            <div class="category__item-name">
                                Đồng hồ thông minh
                            </div>
                        </a>
                        <a href class="col l-2 m-4 category__item">
                            <div class="category__item-img">
                                <img src="./assets/img/xiaomi2.png" alt="">
                            </div>
                            <div class="category__item-name">
                                Xiaomi
                            </div>
                        </a>
                        <a href class="col l-2 m-4 category__item hide-on-tablet">
                            <div class="category__item-img">
                                <img src="./assets/img/may_cu.png" alt="">
                            </div>
                            <div class="category__item-name">
                                Máy cũ
                            </div>
                        </a>
                        <a href class="col l-2 m-4 category__item hide-on-tablet">
                            <div class="category__item-img">
                                <img src="./assets/img/tablet.png" alt="">
                            </div>
                            <div class="category__item-name">
                                Tablet
                            </div>
                        </a>
                        <a href class="col l-2 m-4 category__item hide-on-tablet">
                            <div class="category__item-img">
                                <img src="./assets/img/giadung.png" alt="">
                            </div>
                            <div class="category__item-name">
                                Đồ gia dụng
                            </div>
                        </a>
                        <a href class="col l-2 m-4 category__item hide-on-tablet">
                            <div class="category__item-img">
                                <img src="./assets/img/donghothoitrang.png" alt="">
                            </div>
                            <div class="category__item-name">
                                Đồng hồ thời trang
                            </div>
                        </a>
                        <a href class="col l-2 m-4 category__item hide-on-tablet">
                            <div class="category__item-img">
                                <img src="./assets/img/mayban.png" alt="">
                            </div>
                            <div class="category__item-name">
                                Máy tính bàn
                            </div>
                        </a>
                        <a href class="col l-2 m-4 category__item hide-on-tablet">
                            <div class="category__item-img">
                                <img src="./assets/img/may-in.png" alt="">
                            </div>
                            <div class="category__item-name">
                                Máy in
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- main center -->
            <div class="grid wide">
                <!-- Product sale list -->
                <?php 
                    $customer = Session::get('customerName');
                    if($customer){

                ?>
                <!-- Product Recommentdation -->
                <div class="local mt-32">
                    <h2 class="sale__title">
                        <i class="fab fa-hotjar"></i>
                        GỢI Ý CHO BẠN
                    </h2>
                    <div class="sale__list row">
                        <?php
                            $products = $recommendation->ratingProductQuery();
                            $matrix = array();
                            while($row = $products->fetch_assoc()){
                                $userName = $recommendation->getUserName($row['IDUser']);
                                $productName = $recommendation->getProductName($row['IDProduct']);
                                $matrix[$userName][$productName] = $row['Rating'];
                            }
                            $recommen = array();
                            $userActive = Session::get('customerName');
                            $recommen = getRecommendation($matrix,$userActive, 8); 
                            foreach($recommen as $movie => $rating){
                                $product = $recommendation->getProductByName($movie);
                            if($product){
                            while($row = $product->fetch_assoc())
                            {
                            
                        ?>
                        <div class="col l-3 m-4 c-6 sale__item">
                            <div class="sale__item-link">
                                <a href="productDetail.php?productId=<?= $row['ID'] ?>" class="">
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
                                </a>
                                <div class="sale__item-btn mt-16">
                                    <a href="productDetail.php?productId=<?= $row['ID'] ?>" class="btn btn--primary">
                                        MUA NGAY
                                    </a>
                                    <a href="compareProduct.php?productCompareId=<?= $row['ID'] ?>" class="btn btn--gray">
                                        SO SÁNH
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php } 
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php }
                    else {
                ?>
                <div class="local mt-32">
                    <h2 class="sale__title">
                        <i class="fab fa-hotjar"></i>
                        KHUYẾN MÃI HOT
                    </h2>
                    <div class="sale__list row">
                        <?php
                            $productSale = $productClass->showProductSales(4);
                            if($productSale){
                            while($row = $productSale->fetch_assoc())
                            {
                            
                        ?>
                        <div class="col l-3 m-6 c-6 sale__item">
                            <div class=" sale__item-link">
                                <a href="productDetail.php?productId=<?= $row['ID'] ?>" class="">
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
                                </a>
                                <div class="sale__item-btn mt-16">
                                    <a href="productDetail.php?productId=<?= $row['ID'] ?>" class="btn btn--primary">
                                        MUA NGAY
                                    </a>
                                    <a href="compareProduct.php?productCompareId=<?= $row['ID'] ?>" class="btn btn--gray">
                                        SO SÁNH
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php } 
                            }
                        ?>
                    </div>
                </div>
                <?php
                } ?>
                <!-- Sale program -->
                <div class=" mt-32">
                    <img src="./assets/img/adver.jpg" alt="" class="advertisement-img">
                </div>
                <div class="local mt-32 hide-on-mobile">
                    <div class="program_sale">
                        <div class="program_sale__header">
                            <img src="./assets/img/Desk-Tagline.png" alt="">
                            <div class="program_sale-time mt-32">
                                Áp dụng:
                                <b>26/09</b> - <b>20/11</b>
                            </div>
                        </div>
                        <div class="row program_sale__content mt-16">
                            <div class=" col l-3 m-3 c-3">
                                <div class="sale__content-item">
                                    <div class="sale__content-img">
                                        <img src="./assets/img/p-s1.png" alt="">
                                    </div>
                                    <div class="sale__content-tile">
                                        <p class="sale__content-name">APPLE</p>
                                        <p class="sale__content-reduce">
                                            GIẢM ĐẾN
                                            <span class="sale__content-price"> 20%++</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class=" col l-3 m-3 c-3">
                                <div class="sale__content-item">
                                    <div class="sale__content-img">
                                        <img src="./assets/img/desktop-html-img03.jpg" alt="">
                                    </div>
                                    <div class="sale__content-tile">
                                        <p class="sale__content-name">ĐIỆN THOẠI</p>
                                        <p class="sale__content-reduce">
                                            GIẢM ĐẾN
                                            <span class="sale__content-price"> 30%++</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class=" col l-3 m-3 c-3">
                                <div class="sale__content-item">
                                    <div class="sale__content-img">
                                        <img src="./assets/img/desktop-html-img02.jpg" alt="">
                                    </div>
                                    <div class="sale__content-tile">
                                        <p class="sale__content-name">LAPTOP</p>
                                        <p class="sale__content-reduce">
                                            GIẢM ĐẾN
                                            <span class="sale__content-price"> 15%++</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class=" col l-3 m-3 c-3">
                                <div class="sale__content-item">
                                    <div class="sale__content-img">
                                        <img src="./assets/img/desktop-html-img01.png" alt="">
                                    </div>
                                    <div class="sale__content-tile">
                                        <p class="sale__content-name">PHỤ KIỆN</p>
                                        <p class="sale__content-reduce">
                                            GIẢM ĐẾN
                                            <span class="sale__content-price"> 50%++</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="program_sale__reduce mt-16">
                            <img src="./assets/img/giam700.png" alt="">
                        </div>
                        <div class="program_sale__banner hide-on-mobile mt-16">
                            <div class="content">
                                <img src="./assets/img/trung.png" alt="">
                                <span class="program_sale__gift">
                                    <span class="gift">1000</span> 
                                    quà tặng +
                                    <span class="gift"> 10.000</span> 
                                    ưu đãi.
                                    <a href="">Xem chi tiết</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile sale -->
                <div class="local mt-32">
                    <h2 class="sale__title">
                        <i class="fab fa-hotjar"></i>
                        ĐIỆN THOẠI GIẢM ĐẾN 30%++
                    </h2>
                    <div class="sale__list row">
                        <?php
                            $idCategory = 1;
                            $limit = 8;
                            $productSale = $productClass->showProductByCategory($idCategory,$limit);
                            if($productSale){
                            while($row = mysqli_fetch_assoc($productSale))
                            {
                            
                        ?>
                        <div class="col col l-3 m-6 c-6 sale__item">
                            <div class="sale__item-link">
                                <a href="productDetail.php?productId=<?= $row['ID'] ?>" class="">
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
                                </a>
                                <div class="sale__item-btn mt-16">
                                    <a href="productDetail.php?productId=<?= $row['ID'] ?>" class="btn btn--primary">
                                        MUA NGAY
                                    </a>
                                    <a href="compareProduct.php?productCompareId=<?= $row['ID'] ?>" class="btn btn--gray">
                                        SO SÁNH
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php }
                            } ?>
                    </div>
                </div>
                <!-- Laptop sale -->
                <div class="local mt-32">
                    <h2 class="sale__title">
                        <i class="fab fa-hotjar"></i>
                        LAPTOP GIẢM ĐẾN 15%++
                    </h2>
                    <div class="sale__list row">
                        <?php
                            $idCategory = 2;
                            $limit = 8;
                            $productSale = $productClass->showProductByCategory($idCategory,$limit);
                            if($productSale){
                            while($row = mysqli_fetch_assoc($productSale))
                            {
                        ?>
                        <div class="col col l-3 m-6 c-6 sale__item">
                            <div class="sale__item-link">
                                <a href="productDetail.php?productId=<?= $row['ID'] ?>" class="">
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
                                </a>
                                <div class="sale__item-btn mt-16">
                                    <a href="productDetail.php?productId=<?= $row['ID'] ?>" class="btn btn--primary">
                                        MUA NGAY
                                    </a>
                                    <a href="compareProduct.php?productCompareId=<?= $row['ID'] ?>" class="btn btn--gray">
                                        SO SÁNH
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php }
                            } ?>
                    </div>
                </div>
                <!-- Tablet sale -->
                <div class="local mt-32">
                    <h2 class="sale__title">
                        <i class="fab fa-hotjar"></i>
                        TABLET GIẢM ĐẾN 10%++
                    </h2>
                    <div class="sale__list row">
                        <?php
                            $idCategory = 3;
                            $limit = 8;
                            $productSale = $productClass->showProductByCategory($idCategory,$limit);
                            if($productSale){
                            while($row = mysqli_fetch_assoc($productSale))
                            {
                        ?>
                        <div class="col col l-3 m-6 c-6 sale__item">
                            <div class="sale__item-link">
                                <a href='productDetail.php?productId=<?= $row['ID'] ?>' class="">
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
                                </a>
                                <div class="sale__item-btn mt-16">
                                    <a href="productDetail.php?productId=<?= $row['ID'] ?>" class="btn btn--primary">
                                        MUA NGAY
                                    </a>
                                    <a href="compareProduct.php?productCompareId=<?= $row['ID'] ?>" class="btn btn--gray">
                                        SO SÁNH
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php }
                            } ?>
                    </div>
                </div>
                <!-- Phone accessories list -->
                <div class="local mt-32 hide-on-mobile-tablet">
                    <h2 class="sale__title">
                        PHỤ KIỆN HOT
                    </h2>
                    <div class="row">                
                        <a href class="col l-1-8  category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <div class="category__item-name">
                                Phụ kiện nổi bật
                            </div>
                        </a>
                        <a href class="col l-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-suitcase"></i>
                            </div>
                            <div class="category__item-name">
                                Bao da ốp lưng
                            </div>
                        </a>
                        <a href class="col l-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-car-battery"></i>
                            </div>
                            <div class="category__item-name">
                                Sạc dự phòng
                            </div>
                        </a>
                        <a href class="col l-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-sticky-note"></i>
                            </div>
                            <div class="category__item-name">
                                Thẻ nhớ
                            </div>
                        </a>
                        <a href class="col l-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fab fa-apple"></i>    
                            </div>
                            <div class="category__item-name">
                                Phụ kiện Apple
                            </div>
                        </a>
                        <a href class="col l-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-mobile"></i>
                            </div>
                            <div class="category__item-name">
                                Miếng dán màn hình
                            </div>
                        </a>
                        <a href class="col l-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-headphones"></i>
                            </div>
                            <div class="category__item-name">
                                Tai nghe
                            </div>
                        </a>
                        <a href class="col l-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-shredder"></i>
                            </div>
                            <div class="category__item-name">
                                Mực ink
                            </div>
                        </a>
                        <a href class="col l-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-volume-up"></i>
                            </div>
                            <div class="category__item-name">
                                Loa
                            </div>
                        </a>
                        <a href class="col l-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="far fa-hdd"></i>
                            </div>
                            <div class="category__item-name">
                                USB - Ổ cứng
                            </div>
                        </a>
                        <a href class="col l-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-charging-station"></i>
                            </div>
                            <div class="category__item-name">
                                Sạc cáp
                            </div>
                        </a>
                        <a href class="col l-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-mouse-pointer"></i>
                            </div>
                            <div class="category__item-name">
                                Chuột
                            </div>
                        </a>
                        <a href class="col l-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-keyboard"></i>
                            </div>
                            <div class="category__item-name">
                                Bàn phím
                            </div>
                        </a>
                        <a href class="col l-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-backpack"></i>
                            </div>
                            <div class="category__item-name">
                                Balo - Túi xách
                            </div>
                        </a>
                        <a href class="col l-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-tv"></i>
                            </div>
                            <div class="category__item-name">
                                TV - BOX
                            </div>
                        </a>
                        <a href class="col l-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-ellipsis-h"></i>
                            </div>
                            <div class="category__item-name">
                                Phụ kiện khác
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Img baner footer -->
                <div class="mt-32">
                    <div class="row">
                        <div class="col c-4">
                            <img src="./assets/img/icon-desktop-1.jpg" alt="" class='lazy-load-image-loaded'>
                        </div>
                        <div class="col c-4">
                            <img src="./assets/img/icon-desktop-2.jpg" alt=""  class='lazy-load-image-loaded'>
                        </div>
                        <div class="col c-4">
                            <img src="./assets/img/icon-desktop-3.jpg" alt=""  class='lazy-load-image-loaded'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('./inc/footer.php'); ?>
    </div>
    <!-- Back to top -->
    <button onclick="topFunction()" id="backToTop" title="Go to top"><i class="fas fa-angle-up"></i></button>
    <!-- Chatbot -->
    <div id="body"> 
    
        <div id="chat-circle" class=" btn-raised" onclick="moForm()">
            <div id="chat-overlay"></div>
            <i class="far fa-comments"></i>
        </div>
        
        <div class="wrapper" id="wrapper">
            <div class="title" onclick="dongForm()">Hỗ trợ tư vấn online</div>
            <div class="form">
                <div class="bot-inbox inbox">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="msg-header">
                        <p>Xin chào,chúng tôi có thể giúp gì cho bạn?</p>
                    </div>
                </div>
            </div>
            <div class="typing-field">
                <div class="input-data">
                    <input id="data" type="text" placeholder="Type something here.." required>
                    <button id="send-btn">Send</button>
                </div>
            </div>
        </div>
        <script type="text/javascript" >
            $(document).ready(function(){
                $("#send-btn").on("click", function(){
                    $value = $("#data").val();
                    $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                    $(".form").append($msg);
                    $("#data").val('');
                    
                    // start ajax code
                    $.ajax({
                        url: 'message.php',
                        type: 'POST',
                        data: 'text='+$value,
                        success: function(result){
                            $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                            $(".form").append($replay);
                            // when chat goes down the scroll bar automatically comes to the bottom
                            $(".form").scrollTop($(".form")[0].scrollHeight);
                        }
                    });
                });
            });
        </script>
    
    </div>
</body>
</html>