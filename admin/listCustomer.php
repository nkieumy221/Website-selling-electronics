<?php include('../classes/customer.php');?>
<?php
    /* insert category */
    $class = new customer();
    /* Show list category */
    $showCustomer = $class->showCustomers();
    /* Delete category*/
    /* if (isset($_GET['deleteCategoryId'])) {
        $id = $_GET['deleteCategoryId'];
        $deleteCat = $class->deleteCategory($id);
    } */
    
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
                    Quản lý thông tin khách hàng
                </div>
                <div class="cat-list mt-16">
                    <table class="cat__table">
                        <thead class="cat__header">
                            <tr >
                                <td class="cat_header-item">ID</td>
                                <td class="cat_header-item">Tên tài khoản</td>
                                <td class="cat_header-item">Tên khách hàng</td>
                                <td class="cat_header-item">Địa chỉ</td>
                                <td class="cat_header-item">Điện thoại</td>
                                <td class="cat_header-item">Zipcode</td>
                                <td class="cat_header-item">Email</td>
                                <td class="cat_header-item"></td>
                            </tr>
                        </thead>
                        <tbody class="cat__body">
                            <?php 
                                if($showCustomer){
                                    $i = 0;
                                    while($result = $showCustomer->fetch_assoc()) {
                                        $i++;
                                    
                            ?>
                            <tr class="cat__row">
                                <td class="cat__item">
                                    <?php echo $i ?>
                                </td>
                                <td class="cat__item">
                                    <?php echo $result['username'] ?>
                                </td>
                                <td class="cat__item">
                                    <?php echo $result['TenKhachHang'] ?>
                                </td>
                                <td class="cat__item">
                                    <?php echo $result['DiaChi'] ?>
                                </td>
                                <td class="cat__item">
                                    <?php echo $result['zipcode'] ?>
                                    <td class="cat__item">
                                        <?php echo $result['DienThoai'] ?>
                                    </td>
                                </td>
                                <td class="cat__item">
                                    <?php echo $result['Email'] ?>
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