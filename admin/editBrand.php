<?php include('../classes/brand.php');?>
<?php
    /* show category update */
    $brandClass = new brand();
    if (!isset($_GET['brandId']) || $_GET['brandId'] == NULL) {
        echo "<script>window.location = 'listBrand.php'</script>";
    } else {
        $id = $_GET['brandId'];
    }
    /* Update category */
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $brandName = $_POST['brandName'];

        $updateBrand = $brandClass->updateBrand($brandName, $id);
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
                    Chỉnh sửa thông tin thương hiệu sản phẩm
                </div>
                <?php 
                    $getBrandName = $brandClass->getBrandById($id);
                    if($getBrandName) {
                        while($result = $getBrandName->fetch_assoc()){

                ?>
                <form method="post" action="" class="addcat-input">
                    <h2 class="addcat__title">Sửa danh mục</h2>
                    <input type="text" name="brandName" value="<?php echo $result['TenThuongHieu']?>" placeholder="Nhập tên    ..." class="addcat__input">
                    <input type="submit" name="submit" value="Cập nhật" class="addcat__btn">
                    <?php 
                    if(isset($updateBrand)) {
                            echo $updateBrand;
                        }
                    ?>
                </form>

                <?php }
                }
                ?>

                
            </div>
        </div>

    </div>
</body>
</html>