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
    <link rel="stylesheet" href="./assets/css/listProducts.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <div class="main">
        <?php include('./inc/header.php'); ?>
        <?php 
            if(isset($_GET['idCategory'])){
                $getProduct = $categoryClass->showProductByCategory($_GET['idCategory']);
                $idCategory = $_GET['idCategory'];
            }
            if(isset($_GET['idBrand'])){
                $getProduct = $categoryClass->showProductByBrand($_GET['idBrand']);
                $idBrand = $_GET['idBrand'];
            }

        ?>
        <div class="app__container">
            <div class="grid wide">
                <!-- Direction -->
                <div class="row sm-gutter app__header">
                    <span class="title-direct"><a href="index.html">Trang chủ</a></span>
                    <?php 
                        if(isset($_GET['idCategory'])){
                            $getNameCategory = $categoryClass->getNameByCategory($_GET['idCategory']);
                            if($getNameCategory){
                                $row = $getNameCategory->fetch_assoc();     
                    ?> 
                        <span class="title-page"> / <?= $row['TenDanhMuc'] ?></span>
                    <?php
                            }
                        }
                    ?>
                    <?php
                        if(isset($_GET['idBrand'])){
                            $getNameBrand = $categoryClass->getNameByBrand($_GET['idBrand']);
                            if($getNameBrand){
                                $row1 = $getNameBrand->fetch_assoc();   
                                $idCategory = $row1['IDDanhMuc'];
                                
                    ?> 
                    <span class="title-page"> / <?= $row1['TenThuongHieu'] ?></span>    
                    <?php    
                            }
                        }
                    ?>
                </div>
                <!-- Slide banner -->
                <div class="local">
                    <div class="row">                
                        <div class="col c-12 l-12 m-12 banner_slide">
                            <div class="banner_slide-img">
                                <img src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/1/637686909938218976_F-C1_1200x300.png" alt="banner1" class="mySlides">
                                <img src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/9/24/637680387364945356_F-C1_1200x300.png" alt="banner1" class="mySlides">
                                <img src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/4/637689670035281931_F-C1_1200x300.png" alt="banner1" class="mySlides">
                                <img src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/15/637698551289929221_F-C1_1200x300.png" alt="banner1" class="mySlides">
                                <img src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/15/637698556740753264_F-C1_1200x300.png" alt="banner1" class="mySlides">

                                <div class="local-slide__left " onclick="plusSlides(-1)"><!-- local-slide__none-direct -->
                                    <i class="local-slide__left-icon fas fa-chevron-left"></i>
                                </div>
                                <div class="local-slide__right " onclick="plusSlides(1)">
                                    <i class="local-slide__left-icon fas fa-chevron-right"></i>
                                </div>
                            </div>
                            <ul class="banner_slide-list-title">
                                <li class="banner_slide-title-name banner_slide-title-name--active"></li>
                                <li class="banner_slide-title-name "></li>
                                <li class="banner_slide-title-name"></li>
                                <li class="banner_slide-title-name"></li>
                                <li class="banner_slide-title-name"></li>
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

                    </div>
                </div>
                <div class="row sm-gutter app__content">
                    <div class="col l-3 m-0 c-0">
                        <nav class="category">
                            <div class="category_menu">
                                <h3 class="category__heading">
                                    Hãng sản xuất
                                </h3>
                                <ul class="category-list row">
                                    <li class="category-item l-6">
                                        <input type="checkbox" class="category-item__check" checked>
                                        <span class="category-item__name">Tất cả</span>
                                    </li>
                                    <?php 
                                        $getLogoBrand = $categoryClass->showBrandLogo($idCategory);
                                        if($getLogoBrand){
                                            while($row = $getLogoBrand->fetch_assoc()){
                                    ?>
                                    <li class="category-item l-6">
                                        <input type="checkbox" class="category-item__check"
                                                name= <?= $row['ID']?>
                                            <?php
                                                if(isset($idBrand) && $idBrand == $row["ID"]){
                                                    echo "checked";
                                                }
                                            ?>
                                        >
                                        <span class="category-item__name"><?= $row['TenThuongHieu'] ?></span>
                                    </li>
                                    <?php 
                                            }
                                        }
                                    ?>
                                </ul>
                            </div>
                            <div class="category_menu">
                                <h3 class="category__heading">
                                    Mức giá
                                </h3>
                                <ul class="category-list row">
                                    <li class="category-item l-12">
                                        <input type="checkbox" class="category-item__check" checked >
                                        <span class="category-item__name">Tất cả</span>
                                    </li>
                                    <li class="category-item l-12">
                                        <input type="checkbox" class="category-item__check">
                                        <span class="category-item__name">Dưới 2 triệu</span>
                                    </li>
                                    <li class="category-item l-12">
                                        <input type="checkbox" class="category-item__check">
                                        <span class="category-item__name">Từ 2 - 4 triệu</span>
                                    </li>
                                    <li class="category-item l-12">
                                        <input type="checkbox" class="category-item__check">
                                        <span class="category-item__name">Từ 4 - 7 triệu</span>
                                    </li>
                                    <li class="category-item l-12">
                                        <input type="checkbox" class="category-item__check">
                                        <span class="category-item__name">Từ 7 - 13 triệu</span>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="col l-9 m-12 c-12">
                        <!-- Category img's item -->
                        <div class="category-img">
                            <div class="category-img__name">
                                <h1>Điện thoại <span>(321 sản phẩm)</span></h1>
                            </div>
                            <ul class="category-img__list">                
                            <?php 
                                $getLogoBrand = $categoryClass->showBrandLogo($idCategory);
                                if($getLogoBrand){
                                    while($row = $getLogoBrand->fetch_assoc()){
                            ?>
                                <li class="category-img__item">
                                    <a href="listProducts.php?idBrand=<?= $row['ID'] ?>" class="category-img__link">
                                        <img src="./assets/img/logoBrand/<?= $row['logo'] ?>" >
                                    </a>
                                </li>
                            <?php }
                                }
                            ?>
                            </ul> 
                        </div>
                        <!-- Home filter -->
                        <div class="home-filter hide-on-mobile-tablet mt-16">
                            <span class="home-filter__label">Sắp xếp theo</span>
                            <button class="home-filter__btn btn btn--primary">Phố biến</button>
                            <button class="home-filter__btn btn ">Mới nhất</button>
                            <button class="home-filter__btn btn">Bán chạy</button>
                            <div class="select-input">
                                <span class="select-input__label">Giá</span>
                                <i class="select-input__icon fas fa-angle-down"></i>
                                <ul class="select-input__list">
                                    <li class="select-input__item">
                                        <a href="" class="select-input__link">Giá : Thấp đến cao</a>
                                    </li>
                                    <li class="select-input__item">
                                        <a href="" class="select-input__link">Giá : Cao đến thấp</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="home-filter__pag">
                                <span class="home-filter__pag-num">
                                    <span class="home-filter__pag-curent">1</span>/14
                                </span>
                                <div class="home-filter__pag-control">
                                    <a href="" class="home-filter__pag-btn home-filter__pag-btn--disable">
                                        <div class="home-filter__pag-icon fas fa-angle-left"></div>
                                    </a>
                                    <a href="" class="home-filter__pag-btn">
                                        <div class="home-filter__pag-icon fas fa-angle-right"></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Home product -->
                        
                         <div class="sale__list row mt-16">       
                            <?php 
                                if($getProduct){
                                    while($row = $getProduct->fetch_assoc()){      
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
                            <?php 
                                    }
                                } 
                            ?>
                        </div>
                         <!-- Pagination -->
                        <ul class="pagination">
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">
                                    <i class="pagination-item__icon fas fa-angle-left"></i>
                                </a>
                            </li>
                            <li class="pagination-item pagination-item--active">
                                <a href="" class="pagination-item__link">
                                    1
                                </a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">
                                    2
                                </a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">
                                    3
                                </a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">
                                    4
                                </a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">
                                    5
                                </a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">
                                    ...
                                </a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">
                                    14
                                </a>
                            </li>
                            <li class="pagination-item">
                                <a href="" class="pagination-item__link">
                                    <i class="pagination-item__icon fas fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <?php include('./inc/footer.php'); ?>
    </div>
</body>
</html>