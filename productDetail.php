<?php 
    include('./lib/handle.php'); 
?>
<?php 
    /* Kiểm tra id sản phẩm */
    if (!isset($_GET['productId']) || $_GET['productId'] == NULL) {
        echo "<script>window.location = '404.php'</script>";
    } else {
        $id = $_GET['productId'];
    }   
?>
<?php 
    include_once('./classes/cart.php');
    /* xử lý btn addcart */
    $class = new cart();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $quantity = $_POST['quantity'];
        $addCart = $class->addToCart($id, $quantity);
    }
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
    <link rel="stylesheet" href="./assets/css/productDetail.css">
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
        
        <div class="pd-header">
            <div class="grid wide mt-16">
                <!-- Direction -->
                <div class="row sm-gutter app__header">
                    <span class="title-direct"><a href="index.html">Trang chủ</a></span>
                    <span class="title-page"> / Điện thoại</span>
                    <span class="title-page"> / Samsung</span>
                </div>
                <?php 
                    $getProductDetail = $productClass->getProductDetails($id);
                    if($getProductDetail){
                        while($row = $getProductDetail->fetch_assoc()){

                        
                ?>
                <div class="row sm-gutter app__content mt-32">
                    <div class="col l-6 m-0 c-0">
                        <div class="product__intro">
                            <div class="product__img">
                                <img src="<?= $row['HinhAnh'] ?>" class="product_img">
                            </div>
                            <ul class="frame-boder product__details-list ">
                                <div class="product__detail">
                                    <i class="fal fa-archive"></i>
                                    Màn hình : <?= $row['ManHinh'] ?>”
                                </div>
                                <div class="product__detail">
                                    <i class="fas fa-mobile-alt"></i>
                                    <?= $row['CPU'] ?>
                                </div>
                                <div class="product__detail">
                                    <i class="fas fa-microchip"></i>
                                    <?= $row['RAM'] ?>
                                </div>
                                <div class="product__detail">
                                    <i class="far fa-hdd"></i>
                                    <?= $row['BoNho'] ?>
                                </div>
                                <div class="product__detail">
                                    <a href="" class="product__sale-link">Xem chi tiết thông số kĩ thuật</a>
                                </div>
                            </ul>
                            <div class="product__intro-footer">
                                <div class="product__intro-footer-item">
                                    <i class="fas fa-award"></i>
                                    Hàng chính hãng - bảo hành 12 Tháng
                                </div>
                                <div class="product__intro-footer-item">
                                    <i class="fas fa-truck"></i>
                                    Giao hàng toàn quốc.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col l-6 m-12 c-12">
                        <div class="product__infor">
                            <div class="product__name">
                                <?= $row['TenSanPham'] ?>
                            </div>
                            <div class="product__price">
                                <div class="product__price-sale">
                                    <?= number_format($row['GiaKM']) ?> đ
                                </div>
                                <div class="product__price-origin">
                                    <?= number_format($row['GiaGoc']) ?> đ
                                </div>
                            </div>
                            <div class="frame-boder product__exhibit ">
                                <b>Bảo hành: </b> Phiên bản thị trường Mỹ, mới 100% Fullbox đầy đủ phụ kiện chính hãng. Vui lòng chọn màu để xem giá chi tiết.
                            </div>
                            <div class= "frame-boder product__sale ">
                                <div class="product__sale-title">
                                    Khuyến mãi
                                </div>
                                <ul class="product__sale-list">
                                    <li class="product__sale-item">
                                        <i class="fas fa-check-circle product__sale-icon"></i>
                                        <div class="product__sale-name">Giảm đến 300.000đ khi mua bảo hành (rơi vỡ + vào nước) kèm máy</div>
                                        <a href="" class="product__sale-link">Xem chi tiết</a>
                                    </li>
                                    <li class="product__sale-item">
                                        <i class="fas fa-check-circle product__sale-icon"></i>
                                        <div class="product__sale-name">Gói dịch vụ ưu tiên Z Pass Priority & phòng chờ hạng thương gia tại sân bay</div>
                                    </li>
                                    <li class="product__sale-item">
                                        <i class="fas fa-check-circle product__sale-icon"></i>
                                        <div class="product__sale-name">Giảm đến 300.000đ khi mua bảo hành (rơi vỡ + vào nước) kèm máy</div>
                                        <a href="" class="product__sale-link">Xem chi tiết</a>
                                    </li>
                                    <li class="product__sale-item">
                                        <i class="fas fa-check-circle product__sale-icon"></i>
                                        <div class="product__sale-name">Thu cũ đổi mới - Trợ giá ngay 15%</div>
                                        <a href="" class="product__sale-link">Xem chi tiết</a>
                                    </li>
                                    <li class="product__sale-item">
                                        <i class="fas fa-check-circle product__sale-icon"></i>
                                        <div class="product__sale-name">Trúng 1.000 quà tặng đỉnh cao</div>
                                        <a href="" class="product__sale-link">Xem chi tiết</a>
                                    </li>
                                    <li class="product__sale-item">
                                        <i class="fas fa-check-circle product__sale-icon"></i>
                                        <div class="product__sale-name">Ưu đãi dán màn hình 01 năm</div>
                                    </li>
                                    <li class="product__sale-item">
                                        <i class="fas fa-check-circle product__sale-icon"></i>
                                        <div class="product__sale-name">Giảm 10% Tai nghe Galaxy Buds2 khi mua kèm máy</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="vn_pay">
                                <div class="vn_pay-img">
                                    <img src="./assets/img/Logo-VNPAYQR-(1).jpg" alt="">
                                </div>
                                <div class="vn_pay-body">
                                    <div class="vn_pay-title">
                                        THANH TOÁN VNPAYQR
                                    </div>
                                    <div class="vn_pay-content">
                                        Giảm ngay 400.000đ khi thanh toán 100% qua VNPAY-QR (Giá trị thanh toán cuối cùng sau khi áp dụng các khuyến mại khác trên 8 triệu) 
                                        <a class="product__sale-link" href="">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                            <div class="add_cart mt-16">
                                <form action="" method="post">
                                    <input type="number" class="buyfield" name="quantity" value="1" min="1"/>
                                    <input type="submit" class="btn btn--primary add_cart-btn" name="submit" value="Mua ngay"/>
                                </form>	
                                <?php
                                    if(isset($addCart)){
                                        echo $addCart;
                                    }
                                ?>	
                            </div>
                            
                            <div class="btn btn--primary buy_now mt-16">
                                <div class="buy_now-title">
                                    MUA NGAY
                                </div>
                                <div class="buy_now-content">
                                    Gọi điện xác nhận và giao hàng tận nơi
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="pd-body">
            <div class="grid wide">
                <div class="row sm-gutter">
                    <div class="col l-7 mt-32">
                        <div class="product__description ">
                            <h2 class="product__description-header">
                                Mô tả sản phẩm
                            </h2>
                            <div class="product__description-content">
                                <?= $row['MoTa'] ?>
                                <span id="dots">...</span><span id="more">
                                
                                <button class="btn btn--border " href="" onclick="myFunction()" id="myBtn">Xem thêm</a>
                                <script>
                                    function myFunction() {
                                        var dots = document.getElementById("dots");
                                        var moreText = document.getElementById("more");
                                        var btnText = document.getElementById("myBtn");
                                        
                                        if (dots.style.display === "none") {
                                            dots.style.display = "inline";
                                            btnText.innerHTML = "Xem thêm"; 
                                            moreText.style.display = "none";
                                        } else {
                                            dots.style.display = "none";
                                            btnText.innerHTML = "Rút gọn"; 
                                            moreText.style.display = "inline";
                                        }
                                    }
                                    </script>
                            </div>
                        </div>
                    </div>
                    <?php 
                            }
                        }
                    ?>
                    <div class="col l-5 mt-32">
                        <div class="product__recomment">
                            <h2 class="product__recomment-title">
                                Phụ kiện thường mua kèm
                            </h2>
                            <?php
                                $idCategory = 4;
                                $limit = 4;
                                $productSale = $productClass->showProductByCategory($idCategory,$limit);
                                if($productSale){
                                while($row = mysqli_fetch_assoc($productSale))
                                {
                                
                            ?>
                            <ul class="product__recomment-list">
                                <li class="product__recomment-item">
                                    <img src="<?= $row['HinhAnh'] ?>" alt="" class="product__recomment-item-img">
                                    <div class="product__recomment-item-content">
                                        <div class="product__recomment-item-name">
                                            <?= $row['TenSanPham'] ?>
                                        </div>
                                        <div class="product__recomment-item-price">
                                            <?= number_format($row['GiaKM']) ?> đ
                                            <div class="product__recomment-item-price--origin">
                                                <?= number_format($row['GiaGoc']) ?> đ
                                            </div>
                                        </div>
                                        <div class="btn btn--warning">
                                            Thêm vào giỏ hàng
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <?php 
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="mt-32 product__description ">
                    <h2 class="product__recomment-title">
                        Đánh giá & Nhận xét 
                    </h2>
                    <div class="row sm-gutter mt-32">
                        <div class="col l-4">
                            <div class="evaluate__point">
                                Đánh giá nhận xét   
                                <div class="evaluate_rank">
                                    5/5
                                </div>
                                <div class="evaluate_star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="evaluate__quatity">
                                    1 đánh giá & 0 nhận xét
                                </div>
                            </div>
                        </div>
                        <div class="col l-4">
                            <div class="rate__process">
                                <div class="rate__process-item">
                                    <div class="rate__process-lable">
                                        5 <i class="fas fa-star"></i>
                                    </div>
                                    <div class="rate__process-bar rate__process-bar--full">

                                    </div>
                                    <div class="rate__process-quatity">
                                        1
                                    </div>
                                </div>
                                <div class="rate__process-item">
                                    <div class="rate__process-lable">
                                        4 <i class="fas fa-star"></i>
                                    </div>
                                    <div class="rate__process-bar">

                                    </div>
                                    <div class="rate__process-quatity">
                                        0
                                    </div>
                                </div>
                                <div class="rate__process-item">
                                    <div class="rate__process-lable">
                                        3 <i class="fas fa-star"></i>
                                    </div>
                                    <div class="rate__process-bar">

                                    </div>
                                    <div class="rate__process-quatity">
                                        0
                                    </div>
                                </div>
                                <div class="rate__process-item">
                                    <div class="rate__process-lable">
                                        2 <i class="fas fa-star"></i>
                                    </div>
                                    <div class="rate__process-bar">

                                    </div>
                                    <div class="rate__process-quatity">
                                        0
                                    </div>
                                </div>
                                <div class="rate__process-item">
                                    <div class="rate__process-lable">
                                        1 <i class="fas fa-star"></i>
                                    </div>
                                    <div class="rate__process-bar">

                                    </div>
                                    <div class="rate__process-quatity">
                                        0
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col l-4">
                            <div class="evaluate__point">
                                Bạn đã dùng sản phẩm này? 
                                <div class="btn btn--primary">Gửi đánh giá của bạn</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-32 product__description ">
                    <h2 class="product__recomment-title">
                        Bình luận 
                    </h2>
                    <div class="form-cmt mt-32">
                        <input type="text" class="cmt-input" placeholder="Viết câu hỏi của bạn">
                        <button class="btn btn--primary cmt-btn">Gửi câu hỏi</button>
                    </div>
                    <div class="comment">
                        <div class="user-cmt__form mt-32">
                            <div class="user-cmt__img">
                                <img src="" alt="">
                                <div class="name-text">S</div>
                            </div>
                            <div class="user-cmt__body">
                                <div class="user-cmt_name">
                                    <b>Nguyễn Hà</b>
                                    <span class="user-cmt__time">1 giờ trước</span>
                                </div>
                                <div class="user-cmt__content">
                                    Trả góp qua thẻ tín dụng SCB có mất phí chuyển đổi không ah
                                </div>
                                <a href="" class="reply-btn">
                                    Trả lời
                                </a>
                            </div>
                        </div>
                        <div class="reply-form">
                            <div class="user-reply__name">
                                <b>Nguyễn Văn Khoa </b>
                                <span class="admin-tag">Quản trị viên</span>
                                <span class="user-cmt__time">1 giờ trước</span>
                            </div>
                            <div class="user-cmt__content">
                                Chào Selena, <br>
                                Dạ sẽ tùy vào số tiền trả trước và số tháng trả góp nhé. Để được tư vấn chi tiết bạn vui lòng để lại SĐT hoặc bớt chút thời gian liên hệ tổng đài miễn phí 18006601, bên mình sẽ hỗ trợ bạn nhanh nhất ạ.
                                Thân mến!
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