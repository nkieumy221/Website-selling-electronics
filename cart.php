<html>
    <head>
        <title>Giỏ hàng</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link href="font/fontawesome-pro-5.0.13/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="ThanhToan.css">
        <style>
        .cart{
            padding-bottom: 45px;
        }
        .xoagiohang a{
            color:black;
        }
        .xoagiohang a:hover{
            color:black;
            text-decoration: none;
        }
        .dathang a{
            color:black;
        }
        .dathang a:hover{
            color:black;
            text-decoration: none;
        }
        .count a{
            color:orange;
            font-size: 20px;
        }
        .count a:hover{
            color:orange;
        }
        .price{
            
            margin-top: 35px;
        }
        .note{
            margin-top: 35px;
        }
        </style>
    </head>
    <body>
        <?php 
            $total=0;
            if(isset($_POST['submit'])){
                foreach($_POST['qty'] as $key=>$value){
                    if(($value == 0) and (is_numeric($value))){
                        unset($_SESSION['cart'][$key]);
                    }
                    else if( ($value > 0) and (is_numeric($value))){
                        $_SESSION['cart'][$key]=$value;
                    
                    } 
                }
                header("location:cart.php");
            }
            
            include('head.php'); 
        ?>
        <section id="cart">
                        <div class="container cart text-left">
                            <div class="row">
                                <div class="col-md-12 test">
                                    <table class="table table-wrapper" border="0">
                                        <thead class="thead">
                                            <tr>
                                                <th scope="col" class="table1">Sản phẩm</th>
                                                <th scope="col" class="table2">Mô tả</th>
                                                <th scope="col" class="table3">Giá bán</th>
                                                <th scope="col" class="table4">Số lượng</th>
                                                <th scope="col" class="table5">Tổng tiền</th>
                                                <th scope="col" class="table6">Xóa sách</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr id="row2">
                                            <?php
                                                $ok=1;
                                                if(isset($_SESSION['cart'])){
                                                    foreach($_SESSION['cart'] as $key => $value){
                                                        if(isset($key)){
                                                            $ok=2;
                                                        }
                                                    }
                                                }
                                                $iddonhang=0;
                                                if($ok == 2){
                                                    echo "<form action='cart.php' method='POST'>";
                                                    foreach($_SESSION['cart'] as $key=>$value){
                                                        $item[]=$key;
                                                    }
                                                    $str = implode(",",$item);
                                                    $connection = mysqli_connect("localhost","root","","hanghoa");
                                                    $sql ="SELECT * FROM hanghoa where id in ($str)";
                                                    $query = mysqli_query($connection,$sql);                             
                                                    while($row=mysqli_fetch_assoc($query)){
        
                                                        echo '<tr id="row1">
                                                                <td>';
                                                        echo "<div class='img-product'>
                                                            <img src = '".$row['hinhanh']."'> 
                                                            </div>
                                                            </td>";
                                                        echo '
                                                        <td>
                                                            <div class="note" style="">
                                                        <span>'.$row['TenHang'].'</span>
                                                        </div>
                                                                                    </td>';
                                                        echo '<td>
                                                        <div class="price">
                                                            <span class="price1"> '.$row['DonGia'].' </span>
                                                            </div>
                                                        </td>';
                                                        echo '<td>
                                                        <div >
                                                            <div class="form-group row">';
                                                            ?>
                                                            <input type="text" style="width: 50px;margin-top:35px;" value="<?= $_SESSION["cart"][$row['id']] ?>" name="qty[<?= $row['id'] ?>]">
                                                           
                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                        <?php
                                                        
                                                        echo "<td>
                                                        <div class='count' style='width: 100px;'>
                                                        <p > ".$_SESSION['cart'][$row['id']]*$row['DonGia'] ." đ</p>
                                                        </div>
                                                                                    </td>";
                                                        echo "<td>
                                                        <div class='count'>
                                                        
                                                        <a href='delcart.php?productid=$row[id]'><i class='fas fa-trash-alt'></i></a></p>
                                                        </div>
                                                                                    </td>";
                                                        echo "</tr>";
                                                        $total+= $_SESSION['cart'][$row['id']]*$row['DonGia'];
                                                        
                                                    }
                                                    
                                                    
                                                    
                                                    echo '</tr>
                                                                                
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </section>
                                    </div>
                                    </div>
                                    </section>
                                    <!------------------------Confirm order--------------------------->

                                    <section id="footer">
                                    <div class="container footer">
                                    <div class="row">
                                    <div class="col-md-12">
                                    <div class="footer-right">
                                    <ul class="footer-right-1" style="font-size:17px;">
                                        <li class="footer-right-1-1">Tổng tiền tạm tính</li>
                                        <li class="footer-right-1-2">Phí giao hàng</li>
                                        <li class="footer-right-1-3">Tổng tiền thanh toán</li>
                                    </ul>
                                    <ul class="footer-right-2">';
                                                    
                                    echo " <li class='footer-right-2-1'>".$total."</li>
                                    <li class='footer-right-2-2'>0 đ</li>
                                    <li class='footer-right-2-3'>".$total."</li>
                                    </ul>
                                        </div>";
                                    ?>
                                    <div class="footer-center">
                                    <div class="choose-wrapper-1">
                                        <a href="index.php"><i class="fas fa-arrow-left"></i><span>Quay về trang chủ</span></a>
                                    </div>
                                    <div class="choose-wrapper-2">
                                    <button name="dathang"class="dathang"><a href="thanhtoan.php">Đặt hàng</a></button>
                                    </div>
                                    <div class="choose-wrapper-2">
                                        <button class="btn btn-warning mr-2" name="submit" >Cap Nhat Gio Hang</button>
                                    </div>
                                    <div class="choose-wrapper-2">
                                    <button type="button" class="xoagiohang"><a href="delcart.php?productid=0">Xoa Bo Gio Hang</a></button></br>
                                    </div>
                                    
                                                <?php
                                                }
                                                else
                                                {
                                                echo "<div class='pro'>";
                                                echo "<p align='center'>Bạn hổng còn món nào trong giỏi hàng. HiHi!!!<br /><a href='index.php'>Buy Ebook</a></p>";
                                                echo "</div>";
                                                }
                                            ?>  
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
        
    </body>
</html>
