<?php include('../classes/category.php');?>
<?php
    /* show category update */
    $class = new category();
    if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
        echo "<script>window.location = 'listCategory.php'</script>";
    } else {
        $id = $_GET['catId'];
    }
    /* Update category */
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $catName = $_POST['catName'];

        $updateCat = $class->updateCategory($catName, $id);
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
                    Chỉnh sửa thông tin danh mục sản phẩm
                </div>
                <?php 
                    $getCatName = $class->getCategoryById($id);
                    if($getCatName) {
                        while($result = $getCatName->fetch_assoc()){

                ?>
                <form method="post" action="" class="addcat-input">
                    <h2 class="addcat__title">Sửa danh mục</h2>
                    <input type="text" name="catName" value="<?php echo $result['TenDanhMuc']?>" placeholder="Nhập tên danh mục..." class="addcat__input">
                    <input type="submit" name="submit" value="Cập nhật" class="addcat__btn">
                    <?php 
                    if(isset($updateCat)) {
                            echo $updateCat;
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