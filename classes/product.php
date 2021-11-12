<?php
    include_once('../lib/database.php');
    include_once('../helpers/format.php');
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

            if($productName=="" || $brand=="" || $category=="" || $product_desc=="" || $priceOrigin=="" || $file_name =="") {
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
        public function deleteproduct($id) {
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
    }   
?>