<?php include('../classes/comment.php');?>
<?php
    $commentClass = new comment();
    /* Show list brand */
    $showComments = $commentClass->showAllComments();
    /* Delete brand*/
    if (isset($_GET['deleteCommentId'])) {
        $id = $_GET['deleteCommentId'];
        $deleteComment = $commentClass->deleteComment($id);
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
                    Bình luận
                </div>
                <div class="cat-list">
                    <table class="cat__table">
                        <thead class="cat__header">
                            <tr >
                                <td class="cat_header-item">Thời gian</td>
                                <td class="cat_header-item">ID Sản Phẩm</td>
                                <td class="cat_header-item">ID Người dùng</td>
                                <td class="cat_header-item">Nội dung bình luận</td>
                                <td class="cat_header-item">Xem chi tiết</td>
                                <td class="cat_header-item">Tình trạng</td>
                                <td class="cat_header-item">Trả lời</td>
                                <td class="cat_header-item">Xóa</td>
                            </tr>
                        </thead>
                        <tbody class="cat__body">
                            <?php 
                                if($showComments){
                                    $i = 0;
                                    while($comment = $showComments->fetch_assoc()) {
                                        $i++;
                                    
                            ?>
                            <tr class="cat__row">
                                <td class="cat__item">
                                    <?php echo $comment["time"]; ?>
                                </td>
                                <td class="cat__item">
                                    <?php echo $commentClass->getProductnameById($comment['IDSanPham']); ?>
                                </td>
                                <td class="cat__item">
                                    <?php echo $commentClass->getUsernameById($comment['IDUser']) ?>        
                                </td>
                                <td class="cat__item">
                                    <?php echo $comment['NoiDung']; ?>
                                </td>
                                <td class="cat__item">
                                    <a href="../productDetail.php?productId=<?= $comment['IDSanPham'] ?>" class ="cat__link">
                                        Xem chi tiết
                                    </a>
                                </td>
                                <td class="cat__item">
                                    <?php 
                                        if($commentClass->checkReplyCmt($comment['ID'])){
                                            echo "Đã trả lời";
                                        } else {
                                            echo "Chưa trả lời";
                                        }
                                    ?>
                                </td>
                                <td class="cat__item">
                                    <a href="replycomment.php?commentID=<?php echo $comment['ID'] ?>" class ="cat__link">
                                        Trả lời
                                    </a>
                                </td>
                                <td class="cat__item">
                                    <a href="?deleteCommentId=<?php echo $comment['ID']; ?>" onclick="return confirm('Bạn có muốn xóa danh mục này?')" class ="cat__link">
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