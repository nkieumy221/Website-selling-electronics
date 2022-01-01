<?php include('../classes/category.php');?>
<?php
    /* insert category */
    $class = new category();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $catName = $_POST['catName'];

        $insertCat = $class->insertCategory($catName);
    }
    /* Show list category */
    $showCat = $class->showCategory();
    /* Delete category*/
    if (isset($_GET['deleteCategoryId'])) {
        $id = $_GET['deleteCategoryId'];
        $deleteCat = $class->deleteCategory($id);
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
                    Quản lý danh mục sản phẩm
                </div>
                <form method="post" action="listCategory.php" class="addcat-input mt-16">
                    <div class="addcat__title">Thêm danh mục</div>
                    <input type="text" name="catName" placeholder="Nhập tên danh mục..." id="reset" class="addcat__input">
                    <script>
                        document.getElementById("reset").reset();
                    </script>
                    <input type="submit" name="submit" value="Thêm" class="addcat__btn">
                    <?php
                        if(isset($insertCat)){
                            echo $insertCat;
                        }
                    ?>
                </form>
                <?php
                    if(isset($deleteCat)){
                        echo $deleteCat;
                    }
                ?>
                <div class="cat-list mt-16">
                    <table class="cat__table">
                        <thead class="cat__header">
                            <tr >
                                <td class="cat_header-item">ID</td>
                                <td class="cat_header-item">Tên danh mục</td>
                                <td class="cat_header-item">Chỉnh sửa</td>
                                <td class="cat_header-item">Xóa</td>
                            </tr>
                        </thead>
                        <tbody class="cat__body">
                            <?php 
                                if($showCat){
                                    $i = 0;
                                    while($result = $showCat->fetch_assoc()) {
                                        $i++;
                                    
                            ?>
                            <tr class="cat__row">
                                <td class="cat__item">
                                    <?php echo $i ?>
                                </td>
                                <td class="cat__item">
                                    <?php echo $result['TenDanhMuc'] ?>
                                </td>
                                <td class="cat__item">
                                    <a href="editCate.php?catId=<?php echo $result['ID'] ?>" class ="cat__link">
                                        <i class="far fa-edit"></i>
                                    </a>
                                </td>
                                <td class="cat__item">
                                    <a href="?deleteCategoryId=<?php echo $result['ID']; ?>" onclick="return confirm('Bạn có muốn xóa danh mục này?')" class ="cat__link">
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