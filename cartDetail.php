<?php 
    include('./lib/handle.php'); 
?>
<?php 
    /* xử lý btn addcart */
    $cartClass = new cart();
    /* Delete product in cart */
    if (isset($_GET['cartId'])) {
        $id = $_GET['cartId'];
        $deleteCart = $cartClass->deleteCart($id);
    }
    /* Update quantity of product */
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $cartId = $_POST['cartId'];
        $quantity = $_POST['quantity'];
        $updateQuantity = $cartClass->updateQuantity($cartId, $quantity);
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
                    <span class="title-page"> / Giỏ hàng</span>
                </div>
                <?php 
                    if(isset($updateQuantity)){
                        echo $updateQuantity;
                    }
                ?>
                <div class="products__list mt-32">
                    <ul class="row sm-gutter cart__header">
                        <li class="col c-2 cart__header-name">Hình ảnh </li>
                        <li class="col c-2 cart__header-name">Tên sản phẩm</li>
                        <li class="col c-2 cart__header-name">Giá </li>
                        <li class="col c-2 cart__header-name">Số lượng</li>
                        <li class="col c-2 cart__header-name">Tổng</li>
                        <li class="col c-2 cart__header-name"></li>
                    </ul>
                    <div class="cart__body">
                        <?php
                            $productCart = $cartClass->showProductCart();
                            $qtyProduct = 0;
                            if($productCart) {
                                $subtotal = 0;
                                while($row = $productCart->fetch_assoc()){
                                    $qtyProduct = $qtyProduct + 1;    
                        ?>
                        <ul class="row product__infor ">
                            <li class="col c-2 product__img">
                                <img src="<?= $row['HinhAnh'] ?>" alt="">
                            </li>
                            <li class="col c-2 product__name">
                                <?= $row['TenSanPham'] ?>
                            </li>
                            <li class="col c-2 product__price">
                                <?= number_format($row['Gia']) ?> đ
                            </li>
                            <li class="col c-2 product__quatity">
                                <form action="" method="post" class="form-quantity">
                                    <input type="hidden" name="cartId" value="<?php echo $row['IDCart'] ?>" class="form-quantity__input"/>
                                    <input type="number" name="quantity" min="0"  value="<?php echo $row['SoLuong'] ?>" class="form-quantity__input"/>
                                    <input type="submit" name="submit" value="Cập nhật" class="btn btn--default"/>
								</form>
                            </li>
                            <li class="col c-2 product__total">
                                <?php 
                                    $total = $row['Gia'] * $row['SoLuong'];
                                    $subtotal += $total;
                                    echo number_format($total);
                                ?> đ
                            </li>
                            <li class="col c-2 delete-btn">
                                <a href="?cartId=<?php echo $row['IDCart'] ?>">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </li>
                        </ul>
                        <?php 
                                }   
                            }
                            Session::set('Qty', $qtyProduct);
                        ?>
                    </div>
                    <?php 
                        $checkCart = $cartClass->checkCart();
                        if($checkCart){
                    ?>
                        <ul class="row cart__foot">
                            <li class="col c-2 btn btn--warning"><a href="index.php">Tiếp tục mua hàng</a></li>
                            <li class="col c-4"></li>
                            <li class="col c-2 total"><b>Tổng</b></li>
                            <li class="col c-2 product__total">
                                <?php 
                                    echo number_format($subtotal);
                                ?> đ
                            </li>
                            <li class="col c-2 btn btn--primary"><a href="payment.php">Thanh toán</a></li>
                        </ul>
                        
                    <?php 
                        } else {
                            echo 
                            '<div class="empty_cart">
                                <img src="./assets/img/empty_cart.png" alt="">
                            </div>
                            <ul class="row cart__foot">
                                <li class="col c-5"></li>
                                <li class="col c-2 btn btn--warning"><a href="index.php">Tiếp tục mua hàng</a></li>
                            </ul>
                            ';
                        }
                    ?>
                </div>
                
            </div>
        </div>
        <?php include('./inc/footer.php'); ?>
    </div>
</body>
</html>