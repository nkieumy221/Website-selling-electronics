<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>
<?php 
    class product
    {
        private $db;
        private $fm; //format

        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }
        /* Insert product */
        public function insertProduct($data, $files) {
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $priceOrigin = mysqli_real_escape_string($this->db->link, $data['priceOrigin']);
            $priceSale = mysqli_real_escape_string($this->db->link, $data['priceSale']);
            $ram = mysqli_real_escape_string($this->db->link, $data['ram']);
            $memo = mysqli_real_escape_string($this->db->link, $data['memo']);
            $cpu = mysqli_real_escape_string($this->db->link, $data['cpu']);
            $screen = mysqli_real_escape_string($this->db->link, $data['screen']);
            $quatity = mysqli_real_escape_string($this->db->link, $data['quatity']);
            $productName = mysqli_real_escape_string($this->db->link, $data['ten']);
            // Kiểm tra hình ảnh và lấy hình ảnh đưa vào folder upload
            $permited = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = 'uploads/'.$unique_image;

            if($productName=="" || $brand=="" || $category=="" || $product_desc=="" || $priceOrigin=="" || $file_name =="") {
                $alert = "<span class='success'>Không được để trống</span>  ";
                return $alert;
            } else {
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "INSERT INTO hanghoa(IDDanhMucLon, IDDanhMucCon, TenSanPham, HinhAnh, MoTa, SoLuong, GiaGoc, GiaKM, CPU, ManHinh, RAM, BoNho) 
                          VALUES  ('$category','$brand','$productName','$unique_image','$product_desc','$quatity','$priceOrigin','$priceSale','$cpu','$screen','$ram','$memo')";
                $result = $this->db->insert($query);
                if($result) {
                    $alert = "
                      <span class='success'>Thêm thành công '$query'</span>  
                    ";
                    return $alert;
                } else {
                    $alert = "
                      <span class='error'>Không thành công '$query'</span>  
                    ";
                    return $alert;
                }
            }
        }
        /* Show product */
        public function showProduct() {
            $query = "
                SELECT hanghoa.*, danhmuclon.TenDanhMuc, danhmuccon.TenThuongHieu 
                FROM hanghoa INNER JOIN danhmuclon ON hanghoa.IDDanhMucLon = danhmuclon.ID
                INNER JOIN danhmuccon ON hanghoa.IDDanhMucCon = danhmuccon.ID
                ORDER BY hanghoa.ID desc
                ";
            $result = $this->db->select($query);
            return $result;
        } 

        /* Get product by id*/
        public function getProductById($id){
            $query = "SELECT * FROM hanghoa WHERE ID = $id";
            $result = $this->db->select($query);
            return $result;
        } 

        /* Update product */
        public function updateProduct($data, $files, $id) {
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $priceOrigin = mysqli_real_escape_string($this->db->link, $data['priceOrigin']);
            $priceSale = mysqli_real_escape_string($this->db->link, $data['priceSale']);
            $ram = mysqli_real_escape_string($this->db->link, $data['ram']);
            $memo = mysqli_real_escape_string($this->db->link, $data['memo']);
            $cpu = mysqli_real_escape_string($this->db->link, $data['cpu']);
            $screen = mysqli_real_escape_string($this->db->link, $data['screen']);
            $quatity = mysqli_real_escape_string($this->db->link, $data['quatity']);
            // Kiểm tra hình ảnh và lấy hình ảnh đưa vào folder upload
            $permited = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = 'uploads/'.$unique_image;

            if($productName=="" || $brand=="" || $category=="" || $product_desc=="" || $priceOrigin=="" ) {
                $alert = "<span class='success'>Không được để trống</span>  ";
                return $alert;
            }else{
				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					if ($file_size > 20480) {

                        $alert = "<span class='success'>Image Size should be less then 2MB!</span>";
                        return $alert;
				    } 
					elseif (in_array($file_ext, $permited) === false) 
					{
                        // echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
                        $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
                        return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					$query = "UPDATE hanghoa SET
                    IDDanhMucLon='$category',
                    IDDanhMucCon='$brand',
                    TenSanPham='$productName',
                    HinhAnh='$unique_image',
                    MoTa='$product_desc',
                    SoLuong='$quatity',
                    GiaGoc='$priceOrigin',
                    GiaKM='$priceSale',
                    CPU='$ram',
                    ManHinh='$screen',
                    RAM='$ram',
                    BoNho='$memo'
					WHERE ID = '$id'";
					
				}else{
					//Nếu người dùng không chọn ảnh
					$query = "UPDATE hanghoa SET
                    IDDanhMucLon='$category',
                    IDDanhMucCon='$brand',
                    TenSanPham='$productName',
                    MoTa='$product_desc',
                    SoLuong='$quatity',
                    GiaGoc='$priceOrigin',
                    GiaKM='$priceSale',
                    CPU='$ram',
                    ManHinh='$screen',
                    RAM='$ram',
                    BoNho='$memo'
					WHERE ID = '$id'";
					
				}
				$result = $this->db->update($query);
                if($result){
                    $alert = "<span class='success'>Product Updated Successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Product Updated Not Success</span>";
                    return $alert;
                }	
			}
        }

        /* Delete product */
        public function deleteProduct($id) {
            $query = "DELETE FROM hanghoa WHERE ID = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Xóa sản phẩm thành công</span>  ";
                return $alert;
            } else {
                $alert = "<span class='error'>Không thành công</span>  ";
                return $alert;
            }
        } 

        /* END BACKEND */

        /* Show product sale*/
        public function showProductSales($number) {
            $query = "SELECT * FROM hanghoa WHERE GiaKM < GiaGoc LIMIT $number";
            $result = $this->db->select($query);
            return $result;
        }

        /* Show product sale by category */

        public function showProductByCategory($categoryID,$limit) {
            $query = "SELECT * FROM hanghoa WHERE IDDanhMucLon = '$categoryID' LIMIT $limit";
            $result = $this->db->select($query);
            return $result;
        }

        /* Show product sale by Brand */

        public function showProductByBrand($brandID,$limit) {
            $query = "SELECT * FROM hanghoa WHERE IDDanhMucCon = '$brandID' LIMIT $limit";
            $result = $this->db->select($query);
            return $result;
        }

        /* Show product details */
        public function getProductDetails($productID){
            $query = "
                SELECT hanghoa.*, danhmuclon.TenDanhMuc, danhmuccon.TenThuongHieu 
                FROM hanghoa INNER JOIN danhmuclon ON hanghoa.IDDanhMucLon = danhmuclon.ID
                INNER JOIN danhmuccon ON hanghoa.IDDanhMucCon = danhmuccon.ID
                WHERE hanghoa.ID = '$productID'
                ";
            $result = $this->db->select($query);
            return $result;
        }

        /* Show product details by IDProduct */
        public function showProductbyID($id) {
            $product = "SELECT * FROM hanghoa WHERE ID ='$id'";
			$result = $this->db->select($product);
            return $result;
        }

        /* insert compare product */
        public function insertCompare($productId, $customerId) {
			$productId = mysqli_real_escape_string($this->db->link, $productId);
			$customerId = mysqli_real_escape_string($this->db->link, $customerId);

            $check_compare = "SELECT * FROM compare WHERE IDProduct = $productId AND IDCustomer ='$customerId'";
			$result_check_compare = $this->db->select($check_compare);
            if($result_check_compare){
				$msg = "<span class='error'>Sản phẩm đã được thêm vào</span>";
				return $msg;
			}else{
                $query = "SELECT * FROM hanghoa WHERE ID = $productId ";
                $result = $this->db->select($query)->fetch_assoc();
                
                $productName = $result["TenSanPham"];
                $image = $result["HinhAnh"];
                $price = $result["GiaKM"];
                $query_insert = "INSERT INTO compare(IDCustomer, IDProduct, productName, price, image) VALUES('$customerId','$productId','$productName','$price','$image')";
                $insert_compare = $this->db->insert($query_insert);
                if($insert_compare){
                    $alert = "<span class='success'>Đã thêm vào so sánh</span>  ";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Không thành công</span>  ";
                    return $alert;
                }
            }
        }

        /* Show product compare */
        public function showProductCompare($customerId) {
            $productCompare = "SELECT * FROM compare WHERE IDCustomer ='$customerId' ORDER BY ID DESC";
			$result = $this->db->select($productCompare);
            return $result;
        }

        /* Delete product Compare */
        public function deleteProductCompare($id) {
            $query = "DELETE FROM compare WHERE ID = '$id'";
            $result = $this->db->delete($query);
            return $result;
        }

        /* Insert wishlist */
        public function insertWishlist($productId, $customerId) {
            $productId = mysqli_real_escape_string($this->db->link, $productId);
			$customerId = mysqli_real_escape_string($this->db->link, $customerId);

            $check_compare = "SELECT * FROM wishlist WHERE IDProduct = $productId AND IDCustomer ='$customerId'";
			$result_check_compare = $this->db->select($check_compare);
            if($result_check_compare){
				$msg = "<span class='error'>Sản phẩm đã được thêm vào</span>";
				return $msg;
			}else{
                $query_insert = "INSERT INTO wishlist(IDCustomer, IDProduct) VALUES('$customerId','$productId')";
                $insert_compare = $this->db->insert($query_insert);
                if($insert_compare){
                    $alert = "<span class='success'>Đã thêm vào yêu thích</span>  ";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Không thành công</span>  ";
                    return $alert;
                }
            }
        }

        /* Show product wishlist */
        public function showProductWishlist($customerId) {
            $productCompare = "SELECT * FROM wishlist WHERE IDCustomer ='$customerId'";
			$result = $this->db->select($productCompare);
            return $result;
        }

        /* Delete product wishlist */
        public function deleteProductWishlist($id) {
            $query = "DELETE FROM wishlist WHERE ID = '$id'";
            $result = $this->db->delete($query);
            return $result;
        }

        /* Start rating */
        public function startRating($id){
            $rating = $_POST['ratings'];
            $userId = Session::get('customerId');
            $check = "SELECT * FROM ratingproduct WHERE IDProduct='$id' AND IDUser='$userId' AND rating='$rating'";
            $result_check = $this->db->select($check);
            if($result_check){
                $msg = "<span class='error'>Sản phẩm đã được thêm vào</span>";
                return $msg;
            } else {
                $query ="INSERT INTO ratingproduct(IDProduct, IDUser, Rating) VALUES ('$id','$userId','$rating')";
                $result = $this->db->insert($query);
                if ($result){
                    $alert = "<span class='success'>Thêm thành công</span>";
                    return $alert;
                }    
            }
        }

        /* check rating */
        public function checkRated($id){
            $userId = Session::get('customerId');
            $check = "SELECT * FROM ratingproduct WHERE IDProduct='$id' AND IDUser='$userId'";
            $result_check = $this->db->select($check);
            if($result_check){
                return true;
            } else { 
                return false;
            }
        }

        /* show rating list */
        public function showRatingByUser($id){
            $userId = Session::get('customerId');
            $check = "SELECT * FROM ratingproduct WHERE IDProduct='$id' AND IDUser='$userId'";
            $result = $this->db->select($check);
            return $result;
        }

        /* Trung bình rating */
        public function avgRating($id){
            $check = "SELECT AVG(Rating) AS avgRating FROM ratingproduct WHERE IDProduct = $id";
            $result = $this->db->select($check);
            while($res = $result->fetch_assoc()) {
                return number_format($res['avgRating'],1);
            } 
        }

        /* Số lượt bình luận */
        public function numberCmt($id) {
            $check = "SELECT COUNT(noidung) AS noidung FROM binhluan WHERE IDSanPham = $id";
            $result = $this->db->select($check);
            while($res = $result->fetch_assoc()) {
                return $res['noidung'];
            } 
        }
        /* Số lượt đánh giá */
        public function numberRating($id) {
            $check = "SELECT COUNT(Rating) AS avgRating FROM ratingproduct WHERE IDProduct = $id";
            $result = $this->db->select($check);
            while($res = $result->fetch_assoc()) {
                return $res['avgRating'];
            } 
        }

        /* Số lượng rating */
        public function numberByRating($id, $rating) {
            $check = "SELECT COUNT(Rating) AS avgRating FROM ratingproduct WHERE IDProduct = $id AND Rating = $rating";
            $result = $this->db->select($check);
            while($res = $result->fetch_assoc()) {
                return $res['avgRating'];
            } 
        } 

        /* Progess lenght */
        public function setProgessLengh($id, $rating){
            $numberTotal = $this->numberRating($id);
            $numberRating = $this->numberByRating($id, $rating);
            return ($numberRating / $numberTotal) * 100;
        }

        /* Search product */
        public function searchProduct($searchContent){
            $sql = "SELECT * FROM hanghoa WHERE TenSanPham like '%$searchContent%'" ;
            $result = $this->db->select($sql);
            
            return $result;
        }

    }   
?>