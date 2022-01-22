<?php 
    include('./lib/handle.php'); 
?>
<?php include('functions.php'); ?>
<?php 
    /* Kiểm tra id sản phẩm */
    if (!isset($_GET['productId']) || $_GET['productId'] == NULL) {
        
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
                    <div class="col m-12 l-12">
                        <span class="title-direct"><a href="index.html">Trang chủ</a></span>
                        <span class="title-page"> / Điện thoại</span>
                        <span class="title-page"> / Samsung</span>
                    </div>
                </div>
                <?php 
                    $getProductDetail = $productClass->getProductDetails($id);
                    $mota = '';
                    $brandId = '';
                    if($getProductDetail){
                        while($row = $getProductDetail->fetch_assoc()){
                            $mota = $row['MoTa'];
                            $brandId = $row['IDDanhMucCon'];
                            
                ?>
                <div class="row sm-gutter app__content mt-32">
                    <div class="col l-6 m-6 c-12">
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
                            <div class="product__intro-footer hide-on-mobile">
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
                    <div class="col l-6 m-6 c-12">
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
                            <div class= "frame-boder product__sale hide-on-mobile-tablet ">
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
                            <?php 
                                if($row['SoLuong'] > 0){
                            ?>
                            <div class="add_cart mt-16">
                                <form action="" method="post">
                                    <input type="number" class="buyfield" name="quantity" value="1" min="1"/>
                                    <input type="submit" class="btn btn--primary add_cart-btn" name="submit" value="Mua ngay"/>
                                </form>		
                            </div>
                            <?php 
                                } else {             
                            ?>
                            <div class="add_cart mt-16">
                                <h2 class="text-primary">
                                    <i class="fas fa-times"></i>
                                    Sản phẩm đã hết hàng
                                </h2>	
                            </div>
                            <?php 
                                }
                            ?>
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
                    <div class="col l-7 m-12 c-12 mt-32">
                        <div class="product__description ">
                            <h2 class="product__description-header">
                                Mô tả sản phẩm
                            <div class="product__description-content">
                                <?php   
                                    /* $story_desc = substr($mota,0,5000);  
                                    $story_desc = substr($story_desc,0,strrpos($story_desc,' '));  
                                    echo $story_desc."<a href='#'>Xem thêm...</a>";  */   
                                    echo $mota;                                
                                ?>
                                
                            </div>
                            <button class="readmore" onclick="readMore()">Xem thêm</button> 
                            <script> 
                                $status = false;
                                $desContent = document.querySelector('.product__description-content');
                                $readMoreBtn = document.querySelector('.readmore')
                                function readMore() {

                                    $desContent.style.height = $status ? '328px' : '100%';
                                    $readMoreBtn.innerText = $status ? 'Xem thêm' : 'Rút gọn';
                                    $status = !$status;

                                }
                            </script>
                        </div>
                    </div>
                    
                    <div class="col l-5 m-0 c-0 mt-32">
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
                        <div class="col l-4 m-4 c-6">
                            <div class="evaluate__point">
                                Đánh giá nhận xét   
                                <div class="evaluate_rank">
                                    <?php 
                                        $avgRating = $productClass->avgRating($id);
                                        if($avgRating){
                                            echo $avgRating;
                                        }else {
                                            echo '0';
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
                                        } else {
                                            echo '0';
                                        }
                                    ?>
                                    đánh giá &
                                    <?php 
                                        $numberCmt = $productClass->numberCmt($id);
                                        if($numberCmt){
                                            echo $numberCmt;
                                        } else {
                                            echo '0';
                                        }
                                    ?> 
                                    nhận xét
                                </div>
                            </div>
                        </div>
                        <!-- Phân tích rating -->
                        <div class="col l-4 m-4 c-0">
                            <div class="rate__process">
                                <?php 
                                    if($numberRating){
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
                                } else {
                                    for($i=5; $i>0; $i--){
                                ?>
                                    <div class="rate__process-item">
                                        <div class="rate__process-lable">
                                            <?= $i ?> <i class="fas fa-star"></i>
                                        </div>
                                        <div class="rate__process-bar ">
                                            <div class="rate__process-length" 
                                                style="width:0%">
                                            </div>
                                        </div>
                                        <div class="rate__process-quatity">
                                            0
                                        </div>
                                    </div>
                                <?php 
                                    }   
                                }
                                ?>
                            </div>
                        </div>
                        <!-- Người dùng đánh giá -->
                        <div class="col l-4 m-4 c-6">  
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
                <!-- // all comments -->
                <div class="mt-32 product__description">
                    <h2 class="product__recomment-title">
                        Bình luận 
                    </h2>
                    <!-- if user is not signed in, tell them to sign in. If signed in, present them with comment form -->
                    <?php if (isset($user_id)): ?>
                        <form class="clearfix cmt-content__form mt-32" action="productDetail.php" method="post" id="comment_form form-cmt">
                            <textarea name="comment_text" id="comment_text" class="cmt-input" cols="30" rows="3"></textarea>
                            <button class="btn btn--primary cmt-btn" id="submit_comment">Submit comment</button>
                        </form>
                    <?php else: ?>
                        <div class="well" style="margin-top: 20px;">
                            <h4 class="text-center"><a href="#">Sign in</a> to post a comment</h4>
                        </div>
                    <?php endif ?>
                    <!-- Display total number of comments on this post  -->
                    <h3><span id="comments_count"><?php echo count($comments) ?></span> Comment(s)</h3>
                    <hr>
                    <!-- comments wrapper -->
                    <div id="comments-wrapper">
                    <?php if (isset($comments)): ?>
                        <!-- Display comments -->
                        <?php foreach ($comments as $comment): ?>
                        <!-- comment -->
                        <div class="comment">
                            <div class="user-cmt__form">
                                <img src="./assets/img/default-avatar-profile-icon-vector-social-media-user-image-182145777.jpg" alt="" class="profile_pic">
                                <div class="comment-details">
                                    <span class="comment-name"><?php echo getUsernameById($comment['IDUser']) ?></span>
                                    <span class="comment-date"><?php echo date("F j, Y ", strtotime($comment["time"])); ?></span>
                                    <p><?php echo $comment['NoiDung']; ?></p>
                                    <a class="reply-btn" href="#" data-id="<?php echo $comment['ID']; ?>">Trả lời</a>
                                </div>
                                <!-- reply form -->
                                <form action="productDetail.php?productId=<?= $id ?>" class="reply_form clearfix" id="comment_reply_form_<?php echo $comment['ID'] ?>" data-id="<?php echo $comment['ID']; ?>">
                                    <input type="hidden" value="<?php echo $id ?>" name="productId">
                                    <textarea class="cmt-input" name="reply_text" id="reply_text" cols="30" rows="2"></textarea>
                                    <button class="btn btn--primary btn-xs pull-right submit-reply">Submit reply</button>
                                </form>
                            </div>

                            <!-- GET ALL REPLIES -->
                            <?php $replies = getRepliesByCommentId($comment['ID']) ?>
                            <div class="replies_wrapper_<?php echo $comment['ID']; ?> reply-form">
                                <?php if (isset($replies)): ?>
                                    <?php foreach ($replies as $reply): ?>
                                        <!-- reply -->
                                        <div class="comment reply clearfix">
                                            <img src="./assets/img/default-avatar-profile-icon-vector-social-media-user-image-182145777.jpg" alt="" class="profile_pic">
                                            <div class="comment-details">
                                                <span class="comment-name"><?php echo getUsernameById($reply['IDUser']) ?></span>
                                                <span class="comment-date"><?php echo date("F j, Y ", strtotime($reply["Time"])); ?></span>
                                                <p><?php echo $reply['Body']; ?></p>
                                                <a class="reply-btn" href="#">Trả lời</a>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </div>
                        </div>
                            <!-- // comment -->
                        <?php endforeach ?>
                    <?php else: ?>
                        <h2>Be the first to comment on this post</h2>
                    <?php endif ?>
                    </div><!-- comments wrapper -->
                </div>
                <!-- Slider bar product recomment-->
                <div class="mt-16"></div>
                <?php 
                    $customer = Session::get('customerName');
                    if($customer){

                ?>
                <div class="local">
                    <h2 class="sale__title">
                        Đề xuất cho bạn
                    </h2>
                    <div class="slider" id="slider">
                        <div class="slide" id="slide">
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
                                $recommen = getRecommendation($matrix,$userActive, 15); 
                                foreach($recommen as $movie => $rating){
                                    $product = $recommendation->getProductByName($movie);
                                    if($product){
                                    while($row = $product->fetch_assoc())
                                    {
                            ?>
                            <div class="item">
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
                                    </a>
                                </div>
                            </div>
                            <?php       }
                                    } 
                                }
                            ?>
                        </div>
                        <button class="ctrl-btn pro-prev">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="ctrl-btn pro-next">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                <?php 
                    }
                ?>
                <!-- Similar product -->
                <div class="mt-32">
                    <h2 class="sale__title">
                        Sản phẩm tương tự
                    </h2>
                    <div class="row">
                        <?php
                            $productSale = $productClass->showProductByBrand($brandId,10);
                            if($productSale){
                            while($row = $productSale->fetch_assoc())
                            {
                            
                        ?>
                        <div class="col l-2-4 c-3 m-4 sale__item">
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
                                </a>
                            </div>
                        </div>
                        <?php } 
                            }
                        ?>
                    </div>
                </div>

            </div>
        </div>
        <?php include('./inc/footer.php'); ?>
    </div>  

    <script>
        productScroll();

        function productScroll() {
        let slider = document.getElementById("slider");
        let next = document.getElementsByClassName("pro-next");
        let prev = document.getElementsByClassName("pro-prev");
        let slide = document.getElementById("slide");
        let item = document.getElementById("slide");

        for (let i = 0; i < next.length; i++) {
            //refer elements by class name

            let position = 0; //slider postion

            prev[i].addEventListener("click", function() {
            //click previos button
            if (position > 0) {
                //avoid slide left beyond the first item
                position -= 1;
                translateX(position); //translate items
            }
            });

            next[i].addEventListener("click", function() {
            if (position >= 0 && position < hiddenItems()) {
                //avoid slide right beyond the last item
                position += 1;
                translateX(position); //translate items
            }
            });
        }

        function hiddenItems() {
            //get hidden items
            let items = getCount(item, false);
            let visibleItems = slider.offsetWidth / 210;
            return items - Math.ceil(visibleItems);
        }
        }

        function translateX(position) {
        //translate items
        slide.style.left = position * -210 + "px";
        }

        function getCount(parent, getChildrensChildren) {
        //count no of items
        let relevantChildren = 0;
        let children = parent.childNodes.length;
        for (let i = 0; i < children; i++) {
            if (parent.childNodes[i].nodeType != 3) {
            if (getChildrensChildren)
                relevantChildren += getCount(parent.childNodes[i], true);
            relevantChildren++;
            }
        }
        return relevantChildren;
        }

    </script>
    <!-- Javascripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap Javascript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>
