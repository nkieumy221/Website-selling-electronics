<?php 
    include_once('../classes/product.php');
    include_once('../helpers/format.php');
    ?>
<?php
    $format = new Format();
    $productClass = new product();
    /* Show list product */
    $showProduct = $productClass->showProduct();
    /* Delete product*/
    if (isset($_GET['deleteProductId'])) {
        $id = $_GET['deleteProductId'];
        $deleteProduct = $productClass->deleteProduct($id);
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
                    Quản lý hàng hóa
                </div>
                <a href="addProduct.php" class="add__btn mt-32">Thêm sản phẩm</a>
                <?php
                    if(isset($deleteProduct)){
                        echo $deleteProduct;
                    }
                ?>
                <div class="cat-list mt-16">
                    <table class="cat__table">
                        <thead class="cat__header">
                            <tr >
                                <td class="cat_header-item">ID</td>
                                <td class="cat_header-item">Hình ảnh</td>
                                <td class="cat_header-item">Tên sản phẩm</td>
                                <td class="cat_header-item">Danh mục</td>
                                <td class="cat_header-item">Thương hiệu</td>
                                <td class="cat_header-item">Số lượng</td>
                                <td class="cat_header-item">Giá gốc</td>
                                <td class="cat_header-item">Giá khuyến mãi</td>
                                <td class="cat_header-item">Thông số kĩ thuật</td>
                                <td class="cat_header-item">Sửa</td>
                                <td class="cat_header-item">Xóa</td>
                            </tr>
                        </thead>
                        <tbody class="cat__body">
                            <?php 
                                if($showProduct){
                                    $i = 0;
                                    while($result = $showProduct->fetch_assoc()) {
                                        $i++;
                                    
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
                                    <?php echo $result['TenDanhMuc'] ?>
                                </td>
                                <td class="cat__item">
                                    <?php echo $result['TenThuongHieu'] ?>
                                </td>
                                <td class="cat__item">
                                    <?php echo $result['SoLuong'] ?>
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
                                    <a href="editProduct.php?productId=<?php echo $result['ID'] ?>" class ="cat__link">
                                        <i class="far fa-edit"></i>
                                    </a>
                                </td>
                                <td class="cat__item">
                                    <a href="?deleteProductId=<?php echo $result['ID']; ?>" onclick="return confirm('Bạn có muốn xóa danh mục này?')" class ="cat__link">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
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