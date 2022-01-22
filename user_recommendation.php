<?php 
    include('./lib/handle.php'); 
?>
<?php 
    $products = $recommendation->ratingProductQuery();
    $matrix = array();                                                        
    $userActive = Session::get('customerName');
    $userID= Session::get('customerId');
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
    <link rel="stylesheet" href="./assets/css/user_recommendation.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="./assets/js/productDetails.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <div class="main">
        <div class="app__container">
            <div class="grid wide">
                <div class="header">
                    <h3 class="title-direct">Hệ thống gợi ý sản phẩm</h3>
                </div>
                <div class="row sm-gutter body">
                    <div class="col c-4">
                        <h4 class="title">Danh sách sản phẩm người dùng <span style="color:red"><?= $userActive ?></span> đã đánh giá</h4>
                        <table class="table">
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Rating đã đánh giá</th>
                            </tr>
                        <?php 
                            $ratingsUser = $recommendation->getRatingByUserId($userID);
                            if($ratingsUser){
                            while($row = $ratingsUser->fetch_assoc())
                            {
                        ?>
                            <tr>
                                <td class="product_name">
                                    <?php  
                                    $productName = $recommendation->getProductName($row['IDProduct']); 
                                    echo $productName;
                                    ?>
                                </td>
                                <td><?= $row['Rating'] ?></td>
                            </tr>
                        <?php 
                                }
                            }
                        ?>
                        </table>
                    </div>
                    <div class="col l-4">
                        <h4 class="title">Danh sách người dùng tương tự</h4>
                        <table class="table">
                            <tr>
                                <th>Tên người dùng</th>
                                <th>Độ tương tự</th>
                            </tr>
                            
                                <?php
                                    while($row = $products->fetch_assoc()){
                                        $userName = $recommendation->getUserName($row['IDUser']);
                                        $productName = $recommendation->getProductName($row['IDProduct']);
                                        $matrix[$userName][$productName] = $row['Rating'];
                                    }
                                    getSimilarity($matrix,$userActive);
                                ?>
                            
                        </table>
                    </div>
                    <div class="col c-4">
                        <h4 class="title">Danh sách sản phẩm gợi ý</h4>
                        <table class="table">
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Rating dự đoán</th>
                            </tr>
                        <?php
                            while($row = $products->fetch_assoc()){
                                $userName = $recommendation->getUserName($row['IDUser']);
                                $productName = $recommendation->getProductName($row['IDProduct']);
                                $matrix[$userName][$productName] = $row['Rating'];
                            }
                            $recommen = array();
                            $recommen = getRecommendation($matrix,$userActive,10);
                            foreach($recommen as $movie=>$rating){
        
                           
                        ?>
                            <tr>
                                <td class="product_name"><?= $movie ?></td>
                                <td><?= $rating ?></td>
                            </tr>
                            <?php  } ?>
                        </table>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>