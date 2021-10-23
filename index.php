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
    <!-- <meta http-equiv="refresh" content="5"> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <div class="main">
        <?php
            include('header.php'); 
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
            </div>
            <div class="grid wide">
                <div class="local mt-32">
                    <div class="row">                
                        <div class="banner_slide col c-8">
                            <div class="banner_slide-img">
                                <img src="./assets/img/banner1.jpg" alt="banner1" class="mySlides">
                                <img src="./assets/img/banner2.jpg" alt="banner1" class="mySlides">
                                <img src="./assets/img/banner3.jpg" alt="banner1" class="mySlides">
                                <img src="./assets/img/banner4.jpg" alt="banner1" class="mySlides">
                                <img src="./assets/img/banner5.jpg" alt="banner1" class="mySlides">
                                <img src="./assets/img/banner6.jpg" alt="banner1" class="mySlides">

                                <div class="local-slide__left " onclick="plusSlides(-1)"><!-- local-slide__none-direct -->
                                    <i class="local-slide__left-icon fas fa-chevron-left"></i>
                                </div>
                                <div class="local-slide__right " onclick="plusSlides(1)">
                                    <i class="local-slide__left-icon fas fa-chevron-right"></i>
                                </div>
                            </div>
                            <ul class="banner_slide-list-title">
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
                        <div class="banner_infor col c-4">
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
                                    <a href="" class="banner_infor-highlight-details-item">
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

                <div class="local mt-32">
                    <div class="row">                
                        <a href class="col c-2 category__item">
                            <div class="category__item-img">
                                <img src="./assets/img/dien-thoai.png" alt="">
                            </div>
                            <div class="category__item-name">
                                Điện thoại
                            </div>
                        </a>
                        <a href class="col c-2 category__item">
                            <div class="category__item-img">
                                <img src="./assets/img/laptop.png" alt="">
                            </div>
                            <div class="category__item-name">
                                Laptop
                            </div>
                        </a>
                        <a href class="col c-2 category__item">
                            <div class="category__item-img">
                                <img src="./assets/img/apple.png" alt="">
                            </div>
                            <div class="category__item-name">
                                Apple
                            </div>
                        </a>
                        <a href class="col c-2 category__item">
                            <div class="category__item-img">
                                <img src="./assets/img/chuyentrangsamsung8_7.png" alt="">
                            </div>
                            <div class="category__item-name">
                                Samsung
                            </div>
                        </a>
                        <a href class="col c-2 category__item">
                            <div class="category__item-img">
                                <img src="./assets/img/smart-watch.png" alt="">
                            </div>
                            <div class="category__item-name">
                                Đồng hồ thông minh
                            </div>
                        </a>
                        <a href class="col c-2 category__item">
                            <div class="category__item-img">
                                <img src="./assets/img/xiaomi2.png" alt="">
                            </div>
                            <div class="category__item-name">
                                Xiaomi
                            </div>
                        </a>
                        <a href class="col c-2 category__item">
                            <div class="category__item-img">
                                <img src="./assets/img/may_cu.png" alt="">
                            </div>
                            <div class="category__item-name">
                                Máy cũ
                            </div>
                        </a>
                        <a href class="col c-2 category__item">
                            <div class="category__item-img">
                                <img src="./assets/img/tablet.png" alt="">
                            </div>
                            <div class="category__item-name">
                                Tablet
                            </div>
                        </a>
                        <a href class="col c-2 category__item">
                            <div class="category__item-img">
                                <img src="./assets/img/giadung.png" alt="">
                            </div>
                            <div class="category__item-name">
                                Đồ gia dụng
                            </div>
                        </a>
                        <a href class="col c-2 category__item">
                            <div class="category__item-img">
                                <img src="./assets/img/donghothoitrang.png" alt="">
                            </div>
                            <div class="category__item-name">
                                Đồng hồ thời trang
                            </div>
                        </a>
                        <a href class="col c-2 category__item">
                            <div class="category__item-img">
                                <img src="./assets/img/mayban.png" alt="">
                            </div>
                            <div class="category__item-name">
                                Máy tính bàn
                            </div>
                        </a>
                        <a href class="col c-2 category__item">
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

            <div class="grid wide">
                <div class="local mt-32">
                    <h2 class="sale__title">
                        <i class="fab fa-hotjar"></i>
                        KHUYẾN MÃI HOT
                    </h2>
                    <div class="sale__list row">
                        <?php
                            $conn = mysqli_connect("localhost","root","","electronicshop");
                            $sqlKM = "SELECT * FROM hanghoa LIMIT 4";
                            
                            $resultKM = mysqli_query($conn,$sqlKM);

                            while($row = mysqli_fetch_assoc($resultKM))
                            {
                            
                        ?>
                        <div class="col c-3 sale__item">
                            <a href="" class="sale__item-link">
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
                                        <img src="./assets/img/vnpay400.jpeg" alt="">
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
                        <?php } ?>
                    </div>
                </div>

                <div class=" mt-32">
                    <img src="./assets/img/adver.jpg" alt="" class="advertisement-img">
                </div>

                <div class="local mt-32">
                    <div class="program_sale">
                        <div class="program_sale__header">
                            <img src="./assets/img/Desk-Tagline.png" alt="">
                            <div class="program_sale-time mt-32">
                                Áp dụng:
                                <b>26/09</b> - <b>20/11</b>
                            </div>
                        </div>
                        <div class="row program_sale__content mt-16">
                            <div class=" col c-3">
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
                            <div class=" col c-3">
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
                            <div class=" col c-3">
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
                            <div class=" col c-3">
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
                        <div class="program_sale__banner mt-16">
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

                <div class="local mt-32">
                    <h2 class="sale__title">
                        <i class="fab fa-hotjar"></i>
                        ĐIỆN THOẠI GIẢM ĐẾN 30%++
                    </h2>
                    <div class="sale__list row">
                        <?php
                            $conn = mysqli_connect("localhost","root","","electronicshop");
                            $sqlKM = "SELECT * FROM hanghoa WHERE IDDanhMucLon = 1 LIMIT 8";
                            
                            $resultKM = mysqli_query($conn,$sqlKM);

                            while($row = mysqli_fetch_assoc($resultKM))
                            {
                            
                        ?>
                        <div class="col c-3 sale__item">
                            <a href="" class="sale__item-link">
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
                                        <img src="./assets/img/vnpay400.jpeg" alt="">
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
                        <?php } ?>
                    </div>
                </div>

                <div class="local mt-32">
                    <h2 class="sale__title">
                        <i class="fab fa-hotjar"></i>
                        LAPTOP GIẢM ĐẾN 15%++
                    </h2>
                    <div class="sale__list row">
                        <?php
                            $conn = mysqli_connect("localhost","root","","electronicshop");
                            $sqlKM = "SELECT * FROM hanghoa WHERE IDDanhMucLon = 2 LIMIT 8";
                            
                            $resultKM = mysqli_query($conn,$sqlKM);

                            while($row = mysqli_fetch_assoc($resultKM))
                            {
                            
                        ?>
                        <div class="col c-3 sale__item">
                            <a href="" class="sale__item-link">
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
                                        <img src="./assets/img/vnpay400.jpeg" alt="">
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
                        <?php } ?>
                    </div>
                </div>

                <div class="local mt-32">
                    <h2 class="sale__title">
                        <i class="fab fa-hotjar"></i>
                        TABLET GIẢM ĐẾN 10%++
                    </h2>
                    <div class="sale__list row">
                        <?php
                            $conn = mysqli_connect("localhost","root","","electronicshop");
                            $sqlKM = "SELECT * FROM hanghoa WHERE IDDanhMucLon = 3 LIMIT 8";
                            
                            $resultKM = mysqli_query($conn,$sqlKM);

                            while($row = mysqli_fetch_assoc($resultKM))
                            {
                            
                        ?>
                        <div class="col c-3 sale__item">
                            <a href='Chitietsanpham.php?id=<?= $row['ID'] ?>' class="sale__item-link">
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
                                        <img src="./assets/img/vnpay400.jpeg" alt="">
                                        Giảm thêm 5% tối đa 700.000đ
                                    </div>
                                </div>
                                <div class="sale__item-btn mt-16">
                                    <div class="btn btn--primary">
                                        MUA NGAY
                                    </div>
                                    <div class="btn btn--warning">
                                        <!-- <a href="addcart.php?item=<?= $row['ID'] ?>" class="btn btn--warning text-white"> -->GIỎ HÀNG<!-- </a> -->
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="local mt-32">
                    <h2 class="sale__title">
                        PHỤ KIỆN HOT
                    </h2>
                    <div class="row">                
                        <a href class="col c-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <div class="category__item-name">
                                Phụ kiện nổi bật
                            </div>
                        </a>
                        <a href class="col c-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-suitcase"></i>
                            </div>
                            <div class="category__item-name">
                                Bao da ốp lưng
                            </div>
                        </a>
                        <a href class="col c-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-car-battery"></i>
                            </div>
                            <div class="category__item-name">
                                Sạc dự phòng
                            </div>
                        </a>
                        <a href class="col c-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-sticky-note"></i>
                            </div>
                            <div class="category__item-name">
                                Thẻ nhớ
                            </div>
                        </a>
                        <a href class="col c-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fab fa-apple"></i>    
                            </div>
                            <div class="category__item-name">
                                Phụ kiện Apple
                            </div>
                        </a>
                        <a href class="col c-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-mobile"></i>
                            </div>
                            <div class="category__item-name">
                                Miếng dán màn hình
                            </div>
                        </a>
                        <a href class="col c-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-headphones"></i>
                            </div>
                            <div class="category__item-name">
                                Tai nghe
                            </div>
                        </a>
                        <a href class="col c-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-shredder"></i>
                            </div>
                            <div class="category__item-name">
                                Mực ink
                            </div>
                        </a>
                        <a href class="col c-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-volume-up"></i>
                            </div>
                            <div class="category__item-name">
                                Loa
                            </div>
                        </a>
                        <a href class="col c-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="far fa-hdd"></i>
                            </div>
                            <div class="category__item-name">
                                USB - Ổ cứng
                            </div>
                        </a>
                        <a href class="col c-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-charging-station"></i>
                            </div>
                            <div class="category__item-name">
                                Sạc cáp
                            </div>
                        </a>
                        <a href class="col c-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-mouse-pointer"></i>
                            </div>
                            <div class="category__item-name">
                                Chuột
                            </div>
                        </a>
                        <a href class="col c-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-keyboard"></i>
                            </div>
                            <div class="category__item-name">
                                Bàn phím
                            </div>
                        </a>
                        <a href class="col c-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-backpack"></i>
                            </div>
                            <div class="category__item-name">
                                Balo - Túi xách
                            </div>
                        </a>
                        <a href class="col c-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-tv"></i>
                            </div>
                            <div class="category__item-name">
                                TV - BOX
                            </div>
                        </a>
                        <a href class="col c-1-8 category__item">
                            <div class="category__item-icon">
                                <i class="fas fa-ellipsis-h"></i>
                            </div>
                            <div class="category__item-name">
                                Phụ kiện khác
                            </div>
                        </a>
                    </div>
                </div>

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
        <?php include('footer.php'); ?>
    </div>

    
</body>
</html>