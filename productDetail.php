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
    /* xử lý btn addcart */
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $quantity = $_POST['quantity'];
        $addCart = $cartClass->addToCart($id, $quantity);
    }
    /* Xử lí so sánh sản phẩm */
    $customerId = Session::get('customerId');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])) {
        $productId = $_GET['productId'];
        $insertCompare = $productClass->insertCompare($productId, $customerId);
    }
    /* Xử lí yêu thích sản phẩm*/
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])) {
        $productId = $_GET['productId'];
        $insertWishlist = $productClass->insertWishlist($productId, $customerId);
    }
    /* Xử lí bình luận */
    if(isset($_POST["cmt-submit"])){
        $comment = $commentClass->insertComment();
    }

    /* Đánh giá star */
    if(isset($_POST["binhchon"])){
        $startRating = $productClass->startRating($id);
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
                    $mota = '';
                    if($getProductDetail){
                        while($row = $getProductDetail->fetch_assoc()){
                            $mota = $row['MoTa'];
                            
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
                                <form action="" method="post" class="form__wishlist">
                                    <?php 
                                        $checkLogin = Session::get('customerLogin'); 
                                        if($checkLogin){         
                                    ?>
                                    <input type="hidden" name="productId" value="<?php echo $row['ID'] ?>">
                                    <input type="submit" name="wishlist" value="Yêu thích" class="btn btn-heart">
                                    <?php     
                                        }
                                    ?>
                                </form>
                                <form action="" method="post" class="compare">
                                    <?php 
                                        $checkLogin = Session::get('customerLogin'); 
                                        if($checkLogin){  
                                    ?>
                                    <input type="hidden" name="productId" value="<?php echo $row['ID'] ?>">
                                    <input type="submit" name="compare" value="So sánh" class="btn btn--gray btn-compare">
                                    <?php 
                                        }
                                        if(isset($insertCompare)){
                                            echo $insertCompare;
                                        }
                                        if(isset($insertWishlist)){
                                            echo $insertWishlist;
                                        }
                                    ?>
                                </form>
                            </div>
                            <div class="add_cart mt-16">
                                <form action="" method="post">
                                    <input type="number" class="buyfield" name="quantity" value="1" min="1"/>
                                    <input type="submit" class="btn btn--primary add_cart-btn" name="submit" value="Mua ngay"/>
                                </form>		
                            </div>
                            
                        </div>
                    </div>
                </div>
                <?php 
                        }
                    }
                ?>
            </div>
        </div>

        <div class="pd-body">
            <div class="grid wide">
                <div class="row sm-gutter">
                    <div class="col l-7 mt-32">
                        <div class="product__description ">
                            <h2 class="product__description-header">
                                Mô tả sản phẩm
                            <div class="product__description-content">
                                <?php   
                                    $story_desc = substr($mota,0,8000);  
                                    $story_desc = substr($story_desc,0,strrpos($story_desc,' '));  
                                    echo $story_desc."<a href='#'>Xem thêm...</a>";                                    
                                ?>
                            </div>
                        </div>
                    </div>
                    
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
                        <!-- Đánh giá tổng quan -->
                        <div class="col l-4">
                            <div class="evaluate__point">
                                Đánh giá nhận xét   
                                <div class="evaluate_rank">
                                    <?php 
                                        $avgRating = $productClass->avgRating($id);
                                        if($avgRating){
                                            echo $avgRating;
                                        }
                                    ?>
                                    /5
                                </div>
                                <div class="evaluate_star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="evaluate__quatity">
                                    <?php 
                                        $numberRating = $productClass->numberRating($id);
                                        if($numberRating){
                                            echo $numberRating;
                                        }
                                    ?>
                                    đánh giá &
                                    <?php 
                                        $numberCmt = $productClass->numberCmt($id);
                                        if($numberCmt){
                                            echo $numberCmt;
                                        }
                                    ?> 
                                    nhận xét
                                </div>
                            </div>
                        </div>
                        <!-- Phân tích rating -->
                        <div class="col l-4">
                            <div class="rate__process">
                                <?php 
                                    for($i=5; $i>0; $i--){

                                    
                                ?>
                                <div class="rate__process-item">
                                    <div class="rate__process-lable">
                                        <?= $i ?> <i class="fas fa-star"></i>
                                    </div>
                                    <div class="rate__process-bar ">
                                        <div class="rate__process-length" 
                                            style="width:<?php 
                                                $setProgessLengh = $productClass->setProgessLengh($id, $i);
                                                if($setProgessLengh){
                                                    echo $setProgessLengh;
                                                } else {
                                                    echo '0';
                                                }
                                            ?>%">

                                        </div>
                                    </div>
                                    <div class="rate__process-quatity">
                                        <?php 
                                            $numberByRating = $productClass->numberByRating($id,$i);
                                            if($numberByRating){
                                                echo $numberByRating;
                                            } else {
                                                echo '0';
                                            }
                                        ?>
                                    </div>
                                </div>
                                <?php 
                                    }
                                ?>
                            </div>
                        </div>
                        <!-- Người dùng đánh giá -->
                        <div class="col l-4">  
                            <?php 
                                $checkRated = $productClass->checkRated($id);
                                if(!$checkRated){
                            ?>
                            <div class="evaluate__point">
                                Bạn đã dùng sản phẩm này? 
                                <form class="ratings" action="#" method="POST" id="ratings">
                                    <input type="radio" id="star5" name="ratings" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                    <input type="radio" id="star4" name="ratings" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                    <input type="radio" id="star3" name="ratings" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                    <input type="radio" id="star2" name="ratings" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                    <input type="radio" id="star1" name="ratings" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                    <br>
                                    <button class="btn btn-star btn--primary" name="binhchon" onclick="myFunction()">Gửi đánh giá của bạn</button>
                                </form>
                            <script>
                            function myFunction() {
                                var x = document.getElementById("ratings");
                                if (x.style.display === "none") {
                                    x.style.display = "block";
                                } 
                                }
                            </script>
                            
                                <?php 
                                } 
                                else{

                                ?>
                            <div class="evaluate__point">
                                Bạn đã đánh giá cho sản phẩm này
                                <div class="evaluate_star">
                                <?php
                                        $ratings = $productClass->showRatingByUser($id);
                                        if($ratings){
                                        while ($ratingRow = $ratings->fetch_assoc()){
                                            $star = $ratingRow['Rating'];
                                            for($i = 0; $i < $star; $i++){       
                                ?>
                                        
                                        <i class="fas fa-star"></i>
                                
                                <?php             }
                                            }
                                        }
                                ?>
                                </div>
                                <?php
                                    }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-32 product__description ">
                    <h2 class="product__recomment-title">
                        Bình luận 
                    </h2>
                    <form action="" method="post" class="form-cmt mt-32">
                        <input type="hidden" value="<?php echo $id ?>" name="productId">
                        <input type="text" class="cmt-username" placeholder="Tên của bạn" name="cmt-username">
                        <div class="cmt-content__form">
                            <input type="text" class="cmt-input" placeholder="Viết câu hỏi của bạn" name="cmt-content">
                            <input type="submit" class="btn btn--primary cmt-btn" value="Gửi câu hỏi" name="cmt-submit">
                        </div>
                    </form>
                    <div class="comment">
                        <?php 
                            $cmtList = $commentClass->showComment($id);
                            $fm = new Format();
                            if($cmtList){
                                while($row = mysqli_fetch_assoc($cmtList)){
                        ?>
                        <div class="user-cmt__form mt-32">
                            <div class="user-cmt__img">
                                <img src="" alt="">
                                <div class="name-text">S</div>
                            </div>
                            <div class="user-cmt__body">
                                <div class="user-cmt_name">
                                    <b><?= $row['TenNguoiDung'] ?></b>
                                    <span class="user-cmt__time"><?php echo $fm->formatDate($row['time']); ?></span>
                                </div>
                                <div class="user-cmt__content">
                                    <?= $row['NoiDung'] ?>
                                </div>
                                <a href="" class="reply-btn">
                                    Trả lời
                                </a>
                            </div>
                        </div>
                        <?php 
                            $replyComment = $commentClass->showReplyComment($row['ID']);
                            if($replyComment){
                                while($row = mysqli_fetch_assoc($replyComment)){
                        ?>
                        <div class="reply-form">
                            <div class="user-reply__name">
                                <b><?php  
                                    $username = $customerClass->getUserName($row['IDUser']);
                                    echo $username; ?></b>
                                <span class="admin-tag">Quản trị viên</span>
                                <span class="user-cmt__time"><?php echo $fm->formatDate($row['Time']); ?></span>
                            </div>
                            <div class="user-cmt__content">
                                <?= $row['Body'] ?>
                            </div>
                        </div>
                        <?php
                                }
                            }
                        ?>
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