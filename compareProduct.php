<?php 
    include('./lib/handle.php'); 
?>
<?php 
    /* Delete product in cart */
    if (isset($_GET['compareID'])) {
        $id = $_GET['compareID'];
        $deleteProductCompare = $productClass->deleteProductCompare($id);
    }
    if (isset($_GET['productCompareId'])) {
        
        $customerId = Session::get('customerId');
        if(isset($customerId)){
            $customerId = Session::get('customerId');
        } else {
            $customerId = session_id(); 
        }
        $id = $_GET['productCompareId'];
        $insertCompare = $productClass->insertCompare($id, $customerId);
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
                <div class="cat-list mt-32">
                    <table class="cat__table">
                        <thead class="cat__header">
                            <tr>
                                <td class="cat_header-item">ID</td>
                                <td class="cat_header-item">Hình ảnh</td>
                                <td class="cat_header-item">Tên sản phẩm</td>
                                <td class="cat_header-item">Giá gốc</td>
                                <td class="cat_header-item">Giá khuyến mãi</td>
                                <td class="cat_header-item">Thông số kĩ thuật</td>
                                <td class="cat_header-item">Chi tiết</td>
                                <td class="cat_header-item">Xóa</td>
                            </tr>
                        </thead>
                        <tbody class="cat__body">
                            <?php 
                                $customerId = Session::get('customerId');
                                $productCompare = $productClass->showProductCompare($customerId);
                                if($productCompare) {
                                    $i = 0;
                                    while($row = $productCompare->fetch_assoc()){
                                        $i++;  
                                        $idProduct = $row['IDProduct'];
                                        $idCompare = $row['ID'];
                                        $productDetail = $productClass->showProductbyID($idProduct);
                                        while($result = $productDetail->fetch_assoc()){ 
                                    
                            ?>
                            <tr class="cat__row">
                                <td class="cat__item">
                                    <?php echo $i ?>
                                </td>
                                <td class="cat__item" >
                                    <img src="<?php echo $result['HinhAnh'] ?>" alt="" style="width:100px;">
                                </td>
                                <td class="cat__item">
                                    <?php echo $result['TenSanPham'] ?>
                                </td>
                                <td class="cat__item">
                                    <?php echo number_format($result['GiaGoc']) ?> đ
                                </td>
                                <td class="cat__item">
                                    <?php echo number_format($result['GiaKM']) ?> đ
                                </td>
                                <td class="cat__item">
                                    Ram: <?php echo $result['RAM'] ?> <br>
                                    CPU: <?php echo $result['CPU'] ?> <br>
                                    Bộ nhớ: <?php echo $result['BoNho'] ?> <br>
                                    Màn hình: <?php echo $result['ManHinh'] ?> <br>
                                </td>
                                <td class="cat__item">
                                    <a href="productDetail.php?productId=<?= $result['ID'] ?>" class ="cat__link">Xem chi tiết</a>
                                </td>
                                <td class="cat__item">
                                    <a href="?compareID=<?php echo $idCompare ?>"  class ="cat__link">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                                        } 
                                    }
                                }
                                ?>
                        </tbody>
                    </table>
                </div>    
            </div>
        </div>
        <?php include('./inc/footer.php'); ?>
    </div>
</body>
</html>