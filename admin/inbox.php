<?php 
    include_once('../classes/cart.php');
    include_once('../helpers/format.php');
?>
<?php 
    $cartClass = new cart();
    if(isset($_GET['shiftid'])){
        $id = $_GET['shiftid'];
        $time = $_GET['time'];
        $price = $_GET['price'];
        $shifted = $cartClass->shifted($id,$time,$price);
   }

   if(isset($_GET['delid'])){
    $id = $_GET['delid'];
    $time = $_GET['time'];
    $price = $_GET['price'];
    $del_shifted = $cartClass->deShifted($id,$time,$price);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/grid.css">
    <link rel="stylesheet" href="./assets/css/frame.css">
    <link rel="stylesheet" href="./assets/css/category.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <meta http-equiv="refresh" content="5"> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>
<body>
    <div class="main">
        <?php include('./inc/header.php'); ?>
        
        <div class="main__content">
            <?php include('./inc/sliderbar.php'); ?>
            <div class="page_content">
                <div class="header__title">
                    Quản lý đơn hàng
                </div>
                <?php 
                    if(isset($shifted)){
                        echo $shifted;
                    }
                ?>
                <div class="cat-list mt-32">
                    <table class="cat__table">
                        <thead class="cat__header">
                            <tr >
                                <td class="cat_header-item">ID</td>
                                <td class="cat_header-item">Thời gian</td>
                                <td class="cat_header-item">Tên sản phẩm</td>
                                <td class="cat_header-item">Số lượng</td>
                                <td class="cat_header-item">Giá</td>
                                <td class="cat_header-item">ID khách hàng</td>
                                <td class="cat_header-item">Địa chỉ</td>
                                <td class="cat_header-item">Trạng thái</td>
                            </tr>
                        </thead>
                        <tbody class="cat__body">
                            <?php 
                                $cartClass = new cart();
                                $fm = new Format();
                                $getInboxCart = $cartClass->getInboxCart();
                                if($getInboxCart){
                                    $i = 0;
                                    while($result = $getInboxCart->fetch_assoc()) {
                                        $i++;
                                    
                            ?>
                            <tr class="cat__row">
                                <td class="cat__item">
                                    <?php echo $i ?>
                                </td>
                                <td class="cat__item">
                                    <?php echo $fm->formatDate($result['ThoiGian']); ?>
                                </td>
                                <td class="cat__item">
                                    <?php echo $result['TenSanPham'] ?>
                                </td>
                                <td class="cat__item">
                                    <?php echo $result['SoLuong'] ?>
                                </td>
                                <td class="cat__item">
                                    <?= number_format($result['Gia']) ?> đ
                                </td>
                                <td class="cat__item">
                                    <?= $result['IDKhachHang'] ?>
                                </td>
                                <td class="cat__item">
                                    <a href="customer.php?customerId=<?php echo $result['IDKhachHang'] ?>" class="cat__link">Xem chi tiết</a>
                                </td>
                                <td class="cat__item">
                                <?php 
                                    if($result['status']==0){
                                ?>
                                    <a href="?shiftid=<?php echo $result['ID'] ?>&price=<?php echo $result['Gia'] ?>&time=<?php echo $result['ThoiGian']?>" class="cat__link">Xác nhận</a>

                                <?php
                                    }elseif($result['status']==1){
                                ?>
                                <?php
                                    echo 'Đang giao...';
                                ?>
                                <?php
                                    }elseif($result['status']==2){
                                ?>
                                <a class="cat__link" href="?delid=<?php echo $result['ID'] ?>&price=<?php echo $result['Gia'] ?>&time=<?php echo $result['ThoiGian'] ?>">Xóa</a>
                                <?php
                                    }
                                ?>
                                </td>
                            </tr>
                            <?php 
                                    }
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</body>
</html>