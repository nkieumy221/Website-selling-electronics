<?php 
    include('./lib/handle.php'); 
?>
<?php 
    /* Delete product in cart */
    if (isset($_GET['compareID'])) {
        $id = $_GET['compareID'];
        $deleteProductCompare = $productClass->deleteProductCompare($id);
    }
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
                    <span class="title-direct"><a href="index.html">Trang chủ</a></span>
                    <span class="title-page"> / So sánh sản phẩm</span>
                </div>
                <?php 
                    if(isset($updateQuantity)){
                        echo $updateQuantity;
                    }
                ?>
                <div class="products__list mt-32">
                    <ul class="row sm-gutter cart__header">
                        <li class="col c-2 cart__header-name">ID</li>
                        <li class="col c-2 cart__header-name">Hình ảnh </li>
                        <li class="col c-2 cart__header-name">Tên sản phẩm</li>
                        <li class="col c-2 cart__header-name">Giá </li>
                        <li class="col c-2 cart__header-name"></li>
                        <li class="col c-2 cart__header-name"></li>
                    </ul>
                    <div class="cart__body">
                        <?php
                            $customerId = Session::get('customerId');
                            $productCompare = $productClass->showProductCompare($customerId);
                            if($productCompare) {
                                $i = 0;
                                while($row = $productCompare->fetch_assoc()){
                                    $i++;  
                        ?>
                        <ul class="row product__infor ">
                            <li class="col c-2 product__img">
                                <?php echo $i ?>
                            </li>
                            <li class="col c-2 product__img">
                                <img src="<?= $row['image'] ?>" alt="">
                            </li>
                            <li class="col c-2 product__name">
                                <?= $row['productName'] ?>
                            </li>
                            <li class="col c-2 product__price">
                                <?= number_format($row['price']) ?> đ
                            </li>
                            <li class="col c-2 delete-btn">
                                <a href="productDetail.php?productId=<?= $row['ID'] ?>">Xem chi tiết</a>
                            </li>
                            <li class="col c-2 delete-btn">
                                <a href="?compareID=<?php echo $row['ID'] ?>">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </li>
                        </ul>
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