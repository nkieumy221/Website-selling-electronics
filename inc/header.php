<header class="header">       
        <div class="header-intro">
            <div class="grid wide">
                <nav class="navbar hide-on-mobile-tablet">
                    <ul class="navbar__list">
                        <li class="navbar__item navbar__item--has-qr navbar__item--separate">
                            Vào cửa hàng trên ứng dụng Shop
                            <!-- Header QR code -->
                            <div class="header_qr">
                                <img src="./assets/img/QR_code.png" alt="QR code" class="header__qr-img">
                                <div class="header__qr_apps">
                                    <a href="" class="header__qr-link"><img src="./assets/img/gg_play.png" alt="Google Play" class="header__qr-apps-img"></a>
                                    <a href="" class="header__qr-link"><img src="./assets/img/app_store.png" alt="App Store" class="header__qr-apps-img"></a>
                                </div>
                            </div>
                        </li>
                        <li class="navbar__item ">
                            <span class="navbar__item--no-poiter ">Kết nối</span>
                            <a href="" class="navbar__icon-link">
                                <i class="fab fa-facebook navbar__item-icon"></i>
                            </a>
                            <a href="" class="navbar__icon-link">
                                <i class="fab fa-instagram navbar__item-icon"></i>
                            </a>
                        </li>
                    </ul>
    
                    <ul class="navbar__list">
                        <li class="navbar__item header__notify-header--has-notify">
                            <a href="" class="navbar-item-link">
                                <i class="far fa-bell navbar__item-icon"></i>
                                Thông báo
                            </a>
                            <!-- Notification  -->
                            <div class="header__notify">
                                <header class="header__notify-header ">
                                    <h3>Thông báo mới nhận</h3>
                                </header>
                                <ul class="header__notify-list">
                                    <li class="header__notify-item">
                                        <a href="" class="header__notify-link">
                                            <img src="https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2021/9/15/637673217820889289_iphone-13-pro-max-vang-1.jpg" alt="" class="header__notify-img">
                                            <div class="header__notify-infor">
                                                <span class="header__notify-name">Iphone 13 chính hãng</span>
                                                <span class="header__notify-desc">Mô tả Iphone 13 chính hãng</span>
                                            </div> 
                                        </a>
                                    </li>
                                    <li class="header__notify-item header__notify-item--viewed">
                                        <a href="" class="header__notify-link">
                                            <img src="https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2021/9/15/637673217820889289_iphone-13-pro-max-vang-1.jpg" alt="" class="header__notify-img">
                                            <div class="header__notify-infor">
                                                <span class="header__notify-name">Iphone 13 chính hãng</span>
                                                <span class="header__notify-desc">Mô tả Iphone 13 chính hãng</span>
                                            </div> 
                                        </a>
                                    </li>
                                    <li class="header__notify-item">
                                        <a href="" class="header__notify-link">
                                            <img src="https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2021/9/15/637673217820889289_iphone-13-pro-max-vang-1.jpg" alt="" class="header__notify-img">
                                            <div class="header__notify-infor">
                                                <span class="header__notify-name">Iphone 13 chính hãng</span>
                                                <span class="header__notify-desc">Mô tả Iphone 13 chính hãng</span>
                                            </div> 
                                        </a>
                                    </li>
                                    <li class="header__notify-item">
                                        <a href="" class="header__notify-link">
                                            <img src="https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2021/9/15/637673217820889289_iphone-13-pro-max-vang-1.jpg" alt="" class="header__notify-img">
                                            <div class="header__notify-infor">
                                                <span class="header__notify-name">Iphone 13 chính hãng</span>
                                                <span class="header__notify-desc">Mô tả Iphone 13 chính hãng</span>
                                            </div> 
                                        </a>
                                    </li>
                                </ul>
                                <footer class="header__notify-footer">
                                    <a href="" class="header__notify-footer-btn">Xem thêm</a>
                                </footer>
                            </div>
                        </li>
                        <li class="navbar__item">
                            <a href="" class="navbar-item-link">
                                <i class="fa fa-question-circle navbar__item-icon"></i>
                                Trợ giúp
                            </a>
                        </li>
                        <?php 
                            if(isset($_GET['customerId'])){
                                $delCart = $cartClass->delAllDataCart();
                                Session::destroy();
                            }
                        ?>
                        <?php
                            $checkLogin = Session::get('customerLogin');
                            if($checkLogin){
                        ?>
                        <li class="navbar__item header__navbar-user">
                            <img src="https://i.pinimg.com/736x/21/2d/12/212d12e421963f8a66f95aece1182069.jpg" alt="" class="header__navbar-user-img">
                            <span class="header__navbar-user-name"><?php echo Session::get('customerName'); ?></span>

                            <ul class="header__navbar-user-menu">
                                <li class="header__navbar-user-item">
                                    <a href="profile.php?idCustomer=<?php echo Session::get('customerId'); ?>" class =>Tài khoản của tôi</a>
                                </li>
                                <li class="header__navbar-user-item">
                                    <a href="compareProduct.php">So sánh sản phẩm</a>
                                </li>
                                <li class="header__navbar-user-item">
                                    <a href="wishlist.php">Sản phẩm yêu thích</a>
                                </li>
                                <li class="header__navbar-user-item">
                                    <a href="orderDetails.php">Đơn mua</a>
                                </li>
                                <li class="header__navbar-user-item header__navbar-user-item--separate">
                                    <a href="?customerId=<?php echo Session::get('customerId') ?>">Đăng xuất</a>
                                </li>
                            </ul>
                        </li>
                        <?php }
                        else{ ?>
                        <!-- Login, resgital -->
                        <li class="navbar__item">
                            <a href="" onclick="resgiter(event)" class="navbar-item-link text-bold navbar__item--separate">Đăng ký</a>
                        </li>
                        <li class="navbar__item">
                            <a  href="" onclick="login(event)" class="navbar-item-link text-bold ">Đăng nhập</a>
                        </li>
                        <?php  } ?>

                    </ul>
                </nav>

                <!-- Header with search -->
                <div class="header-with-search">
                    <label for="mobile-search-checkbox" class="header__mobile-search">
                        <i class="fas fa-search header__mobile-search-icon"></i>
                    </label>
                    
                    <!-- Header logo -->
                    <div class="header__logo hide-on-tablet">
                        <a href="./index.php" class="header__logo-link">
                            <img src="./assets/img/foxu.png" alt="" class="header__logo-img">
                        </a>       
                    </div>
                    <!-- Header search -->
                    <input id="mobile-search-checkbox" type="checkbox" name="" class="header__search-checkbox" hidden>

                    <form action="listSearch.php" method="get" class="header__search">
                        <div class="header__search-input-wrap">
                            <input type="text" name="search" placeholder="Nhập tên điện thoại, máy tính, phụ kiện... cần tìm" class="header__search-input">
                            
                            <!-- Search history -->
                            <!-- <div class="header__search-history">
                                <h3 class="header__search-history-heading">Lịch sử tìm kiếm</h3>
                                <ul class="header__search-history-list">
                                    <li class="header__search-history-item">
                                        <a href="">IPhone 13</a>
                                    </li>
                                    <li class="header__search-history-item">
                                        <a href="">Laptop Assus</a>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                        <button type="submit" name="search-btn" class="header__search-btn">
                            <i class="header__search-btn-icon fas fa-search"></i>                        
                        </button>
                    </form>
                    <!-- Cart layout -->
                    <div class="header__cart">
                        <a href="./cartDetail.php" class="header_cart__wrap">
                            <i class="header__cart-icon fa fa-shopping-cart"></i>
                            <span class="header__cart-notice">
                                <?php 
                                    $qty = $cartClass->count();
                                    if(isset($qty)){
                                        echo $qty;   
                                    }else {
                                        echo "0";
                                    }
                                    
                                ?>
                            </span>
                            <div class="header-cart-list ">
                                <!-- header no cart : header-cart-list--no-cart-->
                                <img src="./assets/img/no_cart.png" alt="" class="header-cart-no-cart-img">
                                <span class="header_cart-list-nocart-msg">
                                    Chưa có sản phẩm
                                </span>

                                <h4 class="header__cart-heading">Sản phẩm đã thêm</h4>
                                <ul class="header__cart-list-item">
                                    <li class="header__cart-item">
                                        <img src="https://goldsunviet.com/wp-content/uploads/2019/11/Noi-com-dien-Goldsun-ARC-G18DM-ava.gif" alt="" class="header__cart-item-img">
                                        <div class="header__cart-item-infor">
                                            <div class="header__cart-item-head">
                                                <h5 class="header__cart-item-name">Ịphone 13</h5>
                                                <div class="header__cart-item-price-wrap">
                                                    <span class="header__cart-item-price">2.000.000đ</span>
                                                    <span class="header__cart-item-multiply">x</span>
                                                    <span class="header__cart-item-qlt">2</span>
                                                </div>
                                                
                                            </div>
                                            <div class="header__cart-item-body">
                                                <span class="header__cart-item-desc ">Phân loại : Bạc</span>
                                                <span class="header__cart-item-remove ">Xóa</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="header__cart-item">
                                        <img src="data:image/jpeg;base64,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" alt="" class="header__cart-item-img">
                                        <div class="header__cart-item-infor">
                                            <div class="header__cart-item-head">
                                                <h5 class="header__cart-item-name">Bộ kem đặc trị vùng mắt</h5>
                                                <div class="header__cart-item-price-wrap">
                                                    <span class="header__cart-item-price">2.000.000đ</span>
                                                    <span class="header__cart-item-multiply">x</span>
                                                    <span class="header__cart-item-qlt">2</span>
                                                </div>
                                                
                                            </div>
                                            <div class="header__cart-item-body">
                                                <span class="header__cart-item-desc ">Phân loại : Bạc</span>
                                                <span class="header__cart-item-remove ">Xóa</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="header__cart-item">
                                        <img src="https://cf.shopee.vn/file/251cf08c2edcb21fcd43578360e7fbab_tn" alt="" class="header__cart-item-img">
                                        <div class="header__cart-item-infor">
                                            <div class="header__cart-item-head">
                                                <h5 class="header__cart-item-name">Bộ kem đặc trị vùng mắt</h5>
                                                <div class="header__cart-item-price-wrap">
                                                    <span class="header__cart-item-price">2.000.000đ</span>
                                                    <span class="header__cart-item-multiply">x</span>
                                                    <span class="header__cart-item-qlt">2</span>
                                                </div>
                                            </div>
                                            <div class="header__cart-item-body">
                                                <span class="header__cart-item-desc ">Phân loại : Bạc</span>
                                                <span class="header__cart-item-remove ">Xóa</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <a class="btn btn--primary header__cart-view-cart" href="">Xem giỏ hàng</a>

                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="header_menu">
            <div class="grid wide">
                <div class="row">
                    <ul class="header__sort-bar">    
                    <?php
                        $conn = mysqli_connect("localhost","root","","electronicshop");
                        $sql = "SELECT * FROM danhmuclon";
                        
                        $ketqua = mysqli_query($conn,$sql);

                        while($row = mysqli_fetch_assoc($ketqua))
                        {
                            $sqlDMCon = "SELECT * FROM danhmuccon WHERE IDDanhMuc = " .$row['ID'] . ""; 
                            $query = mysqli_query($conn,$sqlDMCon);
                            $danhmuccon = mysqli_fetch_assoc($query) 
                    ?> 
                        <li class="header__sort-item">
                            <a href="listProducts.php?idCategory=<?php echo $row['ID'] ?>" class="header__sort-link">
                                <i class="fas fa-mobile-alt"></i>
                                <?php echo $row['TenDanhMuc'] ?>
                            </a>
                            <?php
                            if(!empty($danhmuccon)) {                                 
                            ?>
                            <div class="header_menu-list-in-item">
                                <div class="grid wide header_menu-list">
                                    <div class="row">
                                        <div class="col c-4">
                                            <div class="header_menu-list-part">
                                                <h5 class="header_menu-title">Hãng sản xuất</h5>
                                                <ul class="row header_menu-list-item">
                                                    <?php while($danhmuccon = mysqli_fetch_assoc($query)){ ?>
                                                    <li class="col c-4 header_menu-item">
                                                        <a href="listProducts.php?idBrand=<?php echo $danhmuccon['ID'] ?>" class="header_menu-item-link"><?php echo $danhmuccon['TenThuongHieu'] ?></a>
                                                    </li>
                                                    <?php }?>    
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col c-5">
                                            <div class="header_menu-list-part">
                                                <h5 class="header_menu-title">Sản phẩm mới</h5>
                                                <ul class="menu-list__new-product">
                                                    <?php
                                                        $sqlHangHoa = "SELECT * FROM hanghoa WHERE IDDanhMucLon = " .$row['ID'] . " LIMIT 2"; 
                                                        $connectHanghoa = mysqli_query($conn,$sqlHangHoa);
                                                        while($result = mysqli_fetch_assoc($connectHanghoa))
                                                        {
                                                    ?> 
                                                    <li class="menu_item-new">
                                                        <a href="" class="menu_item-new-link">
                                                            <img src="<?= $result['HinhAnh'] ?>" alt="" class="menu_item-new-img">
                                                            <div class="menu_item-new-infor">
                                                                <p class="menu_item-new-name"><?= $result['TenSanPham'] ?></p>
                                                                <p class="menu_item-new-price"><?= number_format($result['GiaGoc']) ?> đ</p>
                                                            </div> 
                                                        </a>
                                                    </li>
                                                    <?php }?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col c-3">
                                            <div class="">
                                                <a href="" class="header_menu-item-img">
                                                    <img src="./assets/img/ip12.jpg" alt="" >
                                                </a>  
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </li>
                    <?php } ?>
                    </ul>
                </div>  
            </div>
        </div>
    </header>
    <!-- Modal -->
    <div class="modal">
        <div class="modal__overlay"></div>
        <div class="model__body">
            <!-- Resgiter form -->
            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
                    $insertCustomer = $customerClass->insertCustomer($_POST);
                }   
            ?>
            <div id="resgiter-form" class="auth-form">
                <div class="auth-form__container">
                    <?php 
                        if(isset($insertCustomer)) {
                            echo $insertCustomer;
                        }
                    ?>
                    <div class="auth-form__header">
                        <h3 id="btn-register" class="auth-form__heading">Đăng kí</h3>
                        <span id="btn-login" class="auth-form__switch-btn">Đăng nhập</span>
                    </div>
                    <form action="" method="post"class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="text" name="username" class="auth-form-input" placeholder="Tên người dùng...">
                        </div>
                        <div class="auth-form__group">
                            <input type="password" name="password" class="auth-form-input" placeholder="Mật khẩu">
                        </div>
                        <div class="auth-form__group">
                            <input type="password" name="password2" class="auth-form-input" placeholder="Nhập lại mật khẩu">
                        </div>
            
                        <div class="auth-form__aside">
                            <p class="auth-form__policy-text">
                                Bằng việc đăng kí, bạn đã đồng ý với các điều khoản Shop về
                                <a href="" class="auth-form__text-link">Điều khoản dịch vụ </a> &
                                <a href="" class="auth-form__text-link">Chính sách bảo mật</a>
                            </p>
                        </div>

                        <div class="auth-form__controls">
                            <a href="index.php" class="btn auth-form__control-back btn--normal">TRỞ LẠI</a>
                            <input type="submit" name="register" value="ĐĂNG KÝ" class="btn btn--primary">
                        </div>    
                    </form>
                </div>

                <div class="auth-form__socicals">
                    <a href="" class="auth-form__socical-facebook btn btn--size-s btn--with-icon ">
                        <i class="fab fa-facebook-square  auth-form__socical-icon"></i>
                        <span class="auth-form__socical-title">Kết nối với facebook</span>
                    </a>
                    <a href="" class="auth-form__socical-google btn btn--size-s btn--with-icon">
                        <i class="fab fa-google auth-form__socical-icon"></i>
                        <span class="auth-form__socical-title">Kết nối với Google</span>
                    </a>
                </div>

            </div>

            <?php   
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
                    $loginCustomer = $customerClass->loginCustomer($_POST);
                }
            ?>
            <!-- Login form -->
            <div id="login-form" class="auth-form">
                <div class="auth-form__container">
                    <div class="auth-form__header">
                        <h3 class="auth-form__heading">Đăng nhập</h3>
                        <span class="auth-form__switch-btn">Đăng kí</span>
                    </div>
                    <form action="" method="post" class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="text" name="usname" class="auth-form-input" placeholder="Username" >
                        </div>
                        <div class="auth-form__group">
                            <input type="password" name="pass" class="auth-form-input" placeholder="Password">
                        </div>
                    
                        <div class="auth-form__aside">
                            <div class="auth-form__help">
                                <a href="" class="auth-form__help-link auth-form__help-forgot">Quên mật khẩu</a>
                                <span class="auth-form__help-separate"></span>
                                <a href="" class="auth-form__help-link ">Cần trợ giúp ?</a>
                            </div>
                        </div>

                        <div class="auth-form__controls">
                            <a href="index.php" class="btn auth-form__control-back btn--normal">TRỞ LẠI</a>
                            <input type="submit" onclick="loginBtn(event)" name="login" value="ĐĂNG NHẬP" class="btn btn--primary">
                        </div>  
                    </form>  
                </div>
                
                <div class="auth-form__socicals">
                    <a href="" class="auth-form__socical-facebook btn btn--size-s btn--with-icon ">
                        <i class="fab fa-facebook-square  auth-form__socical-icon"></i>
                        <span class="auth-form__socical-title">Kết nối với facebook</span>
                    </a>
                    <a href="" class="auth-form__socical-google btn btn--size-s btn--with-icon">
                        <i class="fab fa-google auth-form__socical-icon"></i>
                        <span class="auth-form__socical-title">Kết nối với Google</span>
                    </a>
                </div>

            </div>

            <script>
                async function resgiter(e) {
                    e.preventDefault(); 
                    document.querySelector(".modal").style.display = 'flex';
                    document.querySelector("#resgiter-form").style.display = 'block';
                };
                async function login(e) {
                    e.preventDefault(); 
                    document.querySelector(".modal").style.display = 'flex';
                    document.querySelector("#login-form").style.display = 'block';
                };

                document.querySelector('.modal__overlay') = function() {
                    document.querySelector(".modal").style.display = 'none';
                }

            </script>
        </div>
    </div>
