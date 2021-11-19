<?php 
    include('./lib/handle.php'); 
?>
<?php
	if(isset($_GET['confirmid'])){
     	$id = $_GET['confirmid'];
     	$time = $_GET['time'];
     	$price = $_GET['price'];
     	$shifted_confirm = $cartClass->shiftedConfirm($id,$time,$price);
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
        <?php
            include('./inc/header.php'); 
        ?>
        <div class="app__container">
            <div class="grid wide">
                <div class="row sm-gutter app__header">
                    <span class="title-direct"><a href="index.html">Thanh toán</a></span>
                    <span class="title-page"> / Chọn phương thức thanh toán</span>
                </div>
                <div class="row sm-gutter mt-32">
                    <table class="products__list">
                        <tr class="cart__header">
                            <td class="cart__header-name">ID</td>
                            <td class="cart__header-name">Tên sản phẩm</td>
                            <td class="cart__header-name">Giá </td>
                            <td class="cart__header-name">Số lượng</td>
                            <td class="cart__header-name">Thời gian</td>
                            <td class="cart__header-name">Hoạt động</td>
                        </tr>
                        <?php
                            $customerId = Session::get('customerId');
                            $productCart = $cartClass->showProductOrdered($customerId);
                            $i = 0;
                            if($productCart) {
                                $subtotal = 0;
                                while($row = $productCart->fetch_assoc()){
                                    $i = $i + 1;    
                        ?>
                        <tr class="cart__body product__infor">
                            <td class="product__img">
                                <?= $i ?>
                            </td>
                            <td class="product__name">
                                <?= $row['TenSanPham'] ?>
                            </td>
                            <td class="product__price">
                                <?= number_format($row['Gia']) ?> đ
                            </td>
                            <td class="product__quatity">
                                <?= $row['SoLuong'] ?>
                            </td>
                            <td class="product__quatity">
                                <?= $fm->formatDate($row['ThoiGian']) ?>
                            </td>
                            <?php if($row['status']==0){  ?>
                                <td><?php echo 'N/A';?></td>
                            <?php  }elseif($row['status']==1){ ?>
                                <td class="product__price"><a href="?confirmid=<?php echo $customerId ?>&price=<?php echo $row['Gia'] ?>&time=<?php echo $row['ThoiGian'] ?>">Xác nhận</a></td>
                            <?php }else{ ?>
                                <td><?php echo 'Đã nhận được hàng'; ?></td>
                            <?php }	?>
                        </tr>
                        
                        <?php 
                                }   
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <?php include('./inc/footer.php'); ?>
    </div>
</body>
</html>