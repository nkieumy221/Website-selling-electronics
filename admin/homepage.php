<?php 
    include('../classes/overview.php');
    include('../classes/cart.php');
?>
<?php
    $overview = new overview();
    $cartClass = new cart();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tổng quan</title>

    <link rel="stylesheet" href="./assets/css/grid.css">
    <link rel="stylesheet" href="./assets/css/frame.css">
    <link rel="stylesheet" href="./assets/css/category.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <meta http-equiv="refresh" content="5"> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>
<body>
    <div class="main">
        <?php include('./inc/header.php'); ?>
        
        <div class="main__content">
            <?php include('./inc/sliderbar.php'); ?>
            <div class="page_content">
                <div class="header__title">
                    Tổng quan
                </div>
                <div class="row body mt-16">
                    <div class="col l-4">
                        <div class="overvirew__item">
                            <div class="overvirew__infor">
                                <i class="fas fa-money-check-alt"></i>
                                <div class="overview__right">
                                    <div class="overvirew__infor-name">Doanh thu tháng</div>
                                    <div class="overvirew__infor-number">
                                        <?php echo number_format($overview->revenueMonth()); ?>    đ
                                    </div>
                                </div>
                            </div>
                            <div class="overview__item-more">
                                <a href="">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col l-4">
                        <div class="overvirew__item">
                            <div class="overvirew__infor">
                                <i class="fas fa-globe-europe"></i>
                                <div class="overview__right">
                                    <div class="overvirew__infor-name">Doanh thu năm</div>
                                    <div class="overvirew__infor-number">
                                        <?php echo number_format($overview->revenueOverview()); ?>đ
                                    </div>
                                </div>
                            </div>
                            <div class="overview__item-more">
                                <a href="">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col l-4">
                        <div class="overvirew__item">
                            <div class="overvirew__infor">
                                <i class="fas fa-shipping-fast"></i>
                                <div class="overview__right">
                                    <div class="overvirew__infor-name">Đơn hàng</div>
                                    <div class="overvirew__infor-number">
                                        <?php echo $overview->numberOrder() ?>
                                    </div>
                                </div>
                            </div>
                            <div class="overview__item-more">
                                <a href="">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
                <h2 class="mt-32">
                    Thống kê
                </h2>
                <div class="row mt-32">
                    <div class="col l-10">
                        <canvas id="myChart" style="width:100%;max-width:800px;margin-left: 40px;"></canvas>
                    </div>
                    <div class="col l-2 chart-right">
                        <div class="line__item">
                            <div class="line__color line__color--green"></div>
                            <div class="line__name">Doanh thu</div>
                        </div>
                        <div class="line__item ">
                            <div class="line__color line__color--red"></div>
                            <div class="line__name">Đơn hàng</div>
                        </div>
                        <div class="line__item ">
                            <div class="line__color line__color--blue"></div>
                            <div class="line__name">Khách hàng</div>
                        </div>
                    </div>
                </div>
                <?php 
                    if(isset($shifted)){
                        echo $shifted;
                    }
                ?>
                <h2 class="mt-32">
                    Đơn hàng mới nhất
                </h2>
                <div class="cat-list mt-32">
                    <table class="cat__table">
                        <thead class="cat__header">
                            <tr >
                                <td class="cat_header-item">ID</td>
                                <td class="cat_header-item">Thời gian</td>
                                <td class="cat_header-item">Tên sản phẩm</td>
                                <td class="cat_header-item">Số lượng</td>
                                <td class="cat_header-item">Giá</td>
                                <td class="cat_header-item">ID khách hàng</td>
                                <td class="cat_header-item">Địa chỉ</td>
                                <td class="cat_header-item">Trạng thái</td>
                            </tr>
                        </thead>
                        <tbody class="cat__body">
                            <?php 
                                $cartClass = new cart();
                                $fm = new Format();
                                $getInboxCart = $cartClass->getInboxCart();
                                if($getInboxCart){
                                    $i = 0;
                                    while($result = $getInboxCart->fetch_assoc()) {
                                        $i++;
                                    
                            ?>
                            <tr class="cat__row">
                                <td class="cat__item">
                                    <?php echo $i ?>
                                </td>
                                <td class="cat__item">
                                    <?php echo $fm->formatDate($result['ThoiGian']); ?>
                                </td>
                                <td class="cat__item">
                                    <?php echo $result['TenSanPham'] ?>
                                </td>
                                <td class="cat__item">
                                    <?php echo $result['SoLuong'] ?>
                                </td>
                                <td class="cat__item">
                                    <?= number_format($result['Gia']) ?> đ
                                </td>
                                <td class="cat__item">
                                    <?= $result['IDKhachHang'] ?>
                                </td>
                                <td class="cat__item">
                                    <a href="customer.php?customerId=<?php echo $result['IDKhachHang'] ?>" class="cat__link">Xem chi tiết</a>
                                </td>
                                <td class="cat__item">
                                <?php 
                                    if($result['status']==0){
                                ?>
                                    <a href="?shiftid=<?php echo $result['ID'] ?>&price=<?php echo $result['Gia'] ?>&time=<?php echo $result['ThoiGian']?>" class="cat__link">Xác nhận</a>

                                <?php
                                    }elseif($result['status']==1){
                                ?>
                                <?php
                                    echo 'Đang giao...';
                                ?>
                                <?php
                                    }elseif($result['status']==2){
                                ?>
                                <a class="cat__link" href="?delid=<?php echo $result['ID'] ?>&price=<?php echo $result['Gia'] ?>&time=<?php echo $result['ThoiGian'] ?>">Xóa</a>
                                <?php
                                    }
                                ?>
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
    <script>
        var xValues = [1,2,3,4,5,6,7,8,9,10,11,12];

        new Chart("myChart", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{ 
            data: [860,1140,1060,1060,1070,1110,1330,2210,2830,2478,3574,4251],
            borderColor: "red",
            fill: false
            }, { 
            data: [1600,1700,1700,1900,2000,2700,4000,4400,5000,5100,6000,7000],
            borderColor: "green",
            fill: false
            }, { 
            data: [300,700,2000,5000,6000,4000,2000,1000,530,640,200,100],
            borderColor: "blue",
            fill: false
            }]
        },
        options: {
            legend: {display: false}
        }
        });
    </script>
</body>
</html>