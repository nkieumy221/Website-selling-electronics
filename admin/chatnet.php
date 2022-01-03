<?php include('../classes/comment.php');?>
<?php
    /* insert brand */
    $commentClass = new comment();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $query = $_POST['query'];
        $reply = $_POST['reply'];

        $insertTextSample = $commentClass->insertTextSample($query, $reply);
    }
    /* Show list brand */
    $showText = $commentClass->showText();
    /* Delete brand*/
    if (isset($_GET['deleteText'])) {
        $id = $_GET['deleteText'];
        $deleteText = $commentClass->deleteText($id);
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
                    Tư vấn khách hàng
                </div>
                <form method="post" action="chatnet.php" class="addcat-input mt-16">
                    <h2 class="addcat__title">Thêm mẫu câu tự động</h2>
                    <input type="text" name="query" placeholder="Nhập mẫu câu hỏi..." id="reset" class="addcat__input">
                    <input type="text" name="reply" placeholder="Nhập nội dung trả lời..." id="reset" class="addcat__input">
                    <input type="submit" name="submit" value="Thêm" class="addcat__btn">
                </form>
                <?php
                    if(isset($deleteText)){
                        echo $deleteText;
                    }
                ?>
                <div class="cat-list">
                    <table class="cat__table">
                        <thead class="cat__header">
                            <tr >
                                <td class="cat_header-item">ID</td>
                                <td class="cat_header-item">Câu hỏi</td>
                                <td class="cat_header-item">Trả lời</td>
                                <td class="cat_header-item">Chỉnh sửa</td>
                                <td class="cat_header-item">Xóa</td>
                            </tr>
                        </thead>
                        <tbody class="cat__body">
                            <?php 
                                if($showText){
                                    $i = 0;
                                    while($result = $showText->fetch_assoc()) {
                                        $i++;
                                    
                            ?>
                            <tr class="cat__row">
                                <td class="cat__item">
                                    <?php echo $i ?>
                                </td>
                                <td class="cat__item">
                                    <?php echo $result['queries'] ?>
                                </td>
                                <td class="cat__item">
                                    <?php echo $result['replies'] ?>
                                </td>
                                <td class="cat__item">
                                    <a href="editBrand.php?brandId=<?php echo $result['id'] ?>" class ="cat__link">
                                        <i class="far fa-edit"></i>
                                    </a>
                                </td>
                                <td class="cat__item">
                                    <a href="?deleteText=<?php echo $result['id']; ?>" onclick="return confirm('Bạn có muốn xóa danh mục này?')" class ="cat__link">
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