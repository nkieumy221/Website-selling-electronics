<?php 
    include('./lib/handle.php'); 
?>
<?php 
    $search = '';
    if(isset($_GET['search']))
            $search = $_GET['search'];

    $search = $productClass->searchProduct($search);
    
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
    <!-- <meta http-equiv="refresh" content="5"> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <div class="main">
        <?php
            include('./inc/header.php'); 
        ?>
        <div class="">
            <div class="grid wide">
                <h2 class="sale__title">
                    Kết quả tìm kiếm
                </h2>
                <div class=" mt-16">
                    <div class="sale__list row">
                        <?php
                            if($search){
                            while ($row = $search->fetch_assoc()) {
                            
                        ?>
                        <div class="col c-3 sale__item">
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