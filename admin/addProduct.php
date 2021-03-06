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
                                <label>T??n s???n ph???m</label>
                            </td>
                            <td>
                                <input type="text" name="ten" placeholder="Nh???p t??n s???n ph???m..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Danh m???c s???n ph???m</label>
                            </td>
                            <td>
                                <select id="select" name="category">
                                    <option>Ch???n danh m???c</option>
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
                                <label>Th????ng hi???u s???n ph???m</label>
                            </td>
                            <td>
                                <select id="select" name="brand">
                                    <option>Ch???n th????ng hi???u</option>

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
                                <label>M?? t???</label>
                            </td>
                            <td>
                                <textarea name="product_desc" class="tinymce" id="summernote"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Gi?? g???c</label>
                            </td>
                            <td>
                                <input type="text" name="priceOrigin" placeholder="Nh???p gi?? g???c..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Gi?? Khuy???n M??i</label>
                            </td>
                            <td>
                                <input type="text" name="priceSale" placeholder="Nh???p gi?? khuy???n m??i..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>C???u h??nh Ram</label>
                            </td>
                            <td>
                                <input type="text" name="ram" placeholder="Ram..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>C???u h??nh B??? nh???</label>
                            </td>
                            <td>
                                <input type="text" name="memo" placeholder="B??? nh???..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>C???u h??nh CPU</label>
                            </td>
                            <td>
                                <input type="text" name="cpu" placeholder="CPU..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>M??n h??nh</label>
                            </td>
                            <td>
                                <input type="text" name="screen" placeholder="M??n h??nh..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>S??? l?????ng</label>
                            </td>
                            <td>
                                <input type="text" name="quatity" placeholder="Nh???p s??? l?????ng" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>????ng t???i h??nh ???nh</label>
                            </td>
                            <td>
                                <input type="file" name="image" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <label>Lo???i s???n ph???m</label>
                            </td>
                            <td>
                                <select id="select" name="type">
                                    <option>Ch???n lo???i s???n ph???m</option>
                                    <option value="0">Kh??ng n???i b???t</option>
                                    <option value="1">N???i b???t</option>
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
        placeholder: 'Nh???p m?? t???',
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