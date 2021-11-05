<?php include('../classes/product.php');?>
<?php
    /* Insert Product */
    $productClass = new product();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $productName = $_POST['productName'];

        $insertProduct = $productClass->insertProduct($_POST, $_FILES);
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
                <form method="post" action="addProduct.php" class="addcat-input">
                    <h2 class="addcat__title">Thêm thương hiệu</h2>
                    <input type="text" name="productName" placeholder="Nhập tên thương hiệu..." id="reset" class="addcat__input">
                    <input type="submit" name="submit" value="Thêm" class="addcat__btn">
                    <?php
                        if(isset($insertProduct)){
                            echo $insertProduct;
                        }
                    ?>
                </form>
            </div>
        </div>

    </div>
</body>
</html>