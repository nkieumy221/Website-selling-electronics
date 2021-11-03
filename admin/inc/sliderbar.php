
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="slider__bar">           
        <ul class="slider__menu">
            <li class="slider__item">
                <a href="" class="slider__item-link slider__item-link--active" >
                    <i class="far fa-window-maximize"></i>
                    Tổng quan
                </a>
            </li>
            <li class="silder__item">
                <a href="#expe1" class="slider__item-link" id="attach_box">
                    <i class="far fa-server"></i>
                    Quản lý danh mục
                </a>
                <ul class="slider__list-child" id="expe1">
                    <li class="silder__item">
                        <a href="" class="slider__item-link">
                            <i class="far fa-plus-square"></i>
                            Thêm danh mục
                        </a>
                    </li>
                    <li class="silder__item">
                        <a href="" class="slider__item-link">
                            <i class="fas fa-th-list"></i>
                            Danh sách danh mục
                        </a>
                    </li>
                </ul>
            </li>
            <li class="silder__item">
                <a href="" class="slider__item-link">
                    Quản lý hàng hóa
                </a>
            </li>
            <li class="silder__item">
                <a href="" class="slider__item-link">
                    Quản lý đơn hàng
                </a>
            </li>
            <li class="silder__item">
                <a href="" class="slider__item-link">
                    Quản lý tài khoản 
                </a>
            </li>
        </ul>
        <script type="text/javascript">
            document.querySelector('.slider__list-child').style.display = 'none';
            document.querySelector('a[href^="#"]').click() = function() {
                document.querySelector('.slider__list-child').style.display = 'none';
                var target = this.attr('href');

                document.querySelector('.slider__list-child'+target).style.display = 'block';

            }
        </script>
    </div>
</body>
</html>