<?php include('../classes/brand.php'); ?>
<?php include('../classes/category.php');?>
<?php include('../classes/product.php');?>
<?php
    /* Insert Product */
    $productClass = new product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
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
    <!-- boostrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
</head>
<body>
    <div class="main">
        <?php include('./inc/header.php'); ?>
        
        <div class="main__content">
            <?php include('./inc/sliderbar.php'); ?>
            <div class="page_content">
                <form action="addProduct.php" method="POST" enctype="multipart/form-data">
                    <table class="form">
                        <tr>
                            <td>
                                <label>Tên sản phẩm</label>
                            </td>
                            <td>
                                <input type="text" name="ten" placeholder="Nhập tên sản phẩm..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Danh mục sản phẩm</label>
                            </td>
                            <td>
                                <select id="select" name="category">
                                    <option>Chọn danh mục</option>
                                    <?php
                                    $cat = new category();
                                    $catlist = $cat->showCategory();

                                    if($catlist){
                                        while($result = $catlist->fetch_assoc()){
                                    ?>

                                    <option value="<?php echo $result['ID'] ?>"><?php echo $result['TenDanhMuc'] ?></option>

                                    <?php
                                        }
                                    }
                                ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Thương hiệu sản phẩm</label>
                            </td>
                            <td>
                                <select id="select" name="brand">
                                    <option>Chọn thương hiệu</option>

                                    <?php
                                    $brand = new brand();
                                    $brandlist = $brand->showBrand();

                                    if($brandlist){
                                        while($result = $brandlist->fetch_assoc()){
                                    ?>

                                    <option value="<?php echo $result['ID'] ?>"><?php echo $result['TenThuongHieu'] ?></option>

                                    <?php
                                        }
                                    }
                                ?>
                                
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Mô tả</label>
                            </td>
                            <td>
                                <textarea name="product_desc" class="tinymce" id="summernote"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Giá gốc</label>
                            </td>
                            <td>
                                <input type="text" name="priceOrigin" placeholder="Nhập giá gốc..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Giá Khuyến Mãi</label>
                            </td>
                            <td>
                                <input type="text" name="priceSale" placeholder="Nhập giá khuyến mãi..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Cấu hình Ram</label>
                            </td>
                            <td>
                                <input type="text" name="ram" placeholder="Ram..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Cấu hình Bộ nhớ</label>
                            </td>
                            <td>
                                <input type="text" name="memo" placeholder="Bộ nhớ..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Cấu hình CPU</label>
                            </td>
                            <td>
                                <input type="text" name="cpu" placeholder="CPU..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Màn hình</label>
                            </td>
                            <td>
                                <input type="text" name="screen" placeholder="Màn hình..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Số lượng</label>
                            </td>
                            <td>
                                <input type="text" name="quatity" placeholder="Nhập số lượng" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Đăng tải hình ảnh</label>
                            </td>
                            <td>
                                <input type="file" name="image" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <label>Loại sản phẩm</label>
                            </td>
                            <td>
                                <select id="select" name="type">
                                    <option>Chọn loại sản phẩm</option>
                                    <option value="0">Không nổi bật</option>
                                    <option value="1">Nổi bật</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

    </div>
</body>
</html>

<!-- summernot editor -->
<script type="text/javascript">
    $('textarea#summernote').summernote({
        placeholder: 'Nhập mô tả',
        tabsize: 2,
        height: 100,
  toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
        //['fontname', ['fontname']],
       // ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'hr']],
        //['view', ['fullscreen', 'codeview']],
        ['help', ['help']]
      ],
      });
</script>