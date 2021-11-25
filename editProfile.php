<?php 
    include('./lib/handle.php'); 
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
    <script src="./assets/js/productDetails.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <div class="main">
        <?php include('./inc/header.php'); ?>
        <div class="app__container">
            <div class="grid wide">
                <div class="row sm-gutter app__header">
                    <span class="title-direct"><a href="">CHỈNH SỬA THÔNG TIN KHÁCH HÀNG</a></span>
                </div>
                <form action="" method="post">
                    <table class="tblone">
                        <tr> 
                            <?php
                                $login_check = Session::get('customerLogin'); 
                                if($login_check==false){
                                    header('Location:index.php');
                                }
                                $id = Session::get('customerId');
                                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
                                    $UpdateCustomers = $customerClass->updateCustomers($_POST, $id);
                                }
                                if(isset($UpdateCustomers)){
                                    echo '<td colspan="3">'.$UpdateCustomers.'</td>';
                                }
                            ?>
                        </tr>
                        <?php
                            $id = Session::get('customerId');
                            $get_customers = $customerClass->showCustomer($id);
                            if($get_customers){
                                while($result = $get_customers->fetch_assoc()){
                        ?>
                        <tr>
                            <td>Tên khách hàng</td>
                            <td>:</td>
                            <td><input type="text" name="name" value="<?php echo $result['TenKhachHang'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td>:</td>
                            <td><input type="text" name="phone" value="<?php echo $result['DienThoai'] ?>"></td>
                        
                        </tr>
                        <tr>
                            <td>Zipcode</td>
                            <td>:</td>
                            <td><input type="text" name="zipcode" value="<?php echo $result['zipcode'] ?>"></td>
                            
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><input type="text" name="email" value="<?php echo $result['Email'] ?>"></td>
                            
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td>:</td>
                            <td><input type="text" name="address" value="<?php echo $result['DiaChi'] ?>"></td>
                            
                        </tr>
                        <tr>
                            <td colspan="3"><input type="submit" name="save" value="Save"></td>
                            
                        </tr> 
                        <?php
                            }
                        }
                        ?>
                    </table>
			    </form>
            </div>
        </div>
        <?php include('./inc/footer.php'); ?>
    </div>
</body>
</html>