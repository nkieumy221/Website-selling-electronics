<?php include('../classes/brand.php');?>
<?php
    /* insert brand */
    $brandClass = new brand();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $brandName = $_POST['brandName'];

        $insertBrand = $brandClass->insertbrand($brandName);
    }
    /* Show list brand */
    $showBrand = $brandClass->showBrand();
    /* Delete brand*/
    if (isset($_GET['deleteBrandId'])) {
        $id = $_GET['deleteBrandId'];
        $deleteBrand = $brandClass->deleteBrand($id);
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
                    Quản lý thương hiệu sản phẩm
                </div>
                <form method="post" action="listBrand.php" class="addcat-input mt-16">
                    <h2 class="addcat__title">Thêm thương hiệu</h2>
                    <input type="text" name="brandName" placeholder="Nhập tên thương hiệu..." id="reset" class="addcat__input">
                    <input type="submit" name="submit" value="Thêm" class="addcat__btn">
                    <?php
                        if(isset($insertBrand)){
                            echo $insertBrand;
                        }
                    ?>
                </form>
                <?php
                    if(isset($deleteBrand)){
                        echo $deleteBrand;
                    }
                ?>
                <div class="cat-list">
                    <table class="cat__table">
                        <thead class="cat__header">
                            <tr >
                                <td class="cat_header-item">ID</td>
                                <td class="cat_header-item">Tên thương hiệu</td>
                                <td class="cat_header-item">Danh mục</td>
                                <td class="cat_header-item">Chỉnh sửa</td>
                                <td class="cat_header-item">Xóa</td>
                            </tr>
                        </thead>
                        <tbody class="cat__body">
                            <?php 
                                if($showBrand){
                                    $i = 0;
                                    while($result = $showBrand->fetch_assoc()) {
                                        $i++;
                                    
                            ?>
                            <tr class="cat__row">
                                <td class="cat__item">
                                    <?php echo $i ?>
                                </td>
                                <td class="cat__item">
                                    <?php echo $result['TenThuongHieu'] ?>
                                </td>
                                <td class="cat__item">
                                    <?php echo $result['IDDanhMuc'] ?>
                                </td>
                                <td class="cat__item">
                                    <a href="editBrand.php?brandId=<?php echo $result['ID'] ?>" class ="cat__link">
                                        <i class="far fa-edit"></i>
                                    </a>
                                </td>
                                <td class="cat__item">
                                    <a href="?deleteBrandId=<?php echo $result['ID']; ?>" onclick="return confirm('Bạn có muốn xóa danh mục này?')" class ="cat__link">
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