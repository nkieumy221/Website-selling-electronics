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

            if($productName = '' || $brand='' || $category='' || $priceOrigin = '') {
                $alert = "<span class='success'>Không được để trống</span>  ";
                return $alert;
            } else {
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "INSERT INTO hanghoa(IDDanhMucLon, IDDanhMucCon, TenSanPham, HinhAnh, MoTa, SoLuong, GiaGoc, GiaKM, CPU, ManHinh, RAM, BoNho) 
                          VALUES  ('$category','$brand','$productName','$unique_image','$product_desc','$quatity','$priceOrigin','$priceSale','$cpu','$screen','$ram','$memo')";
                $result = $this->db->insert($query);
                if($result) {
                    $alert = "
                      <span class='success'>Thêm thành công</span>  
                    ";
                    return $alert;
                } else {
                    $alert = "
                      <span class='error'>Không thành công</span>  
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
        public function updateProduct($productName, $productId) {
            $productName = $this->fm->validation($productName);
            $productName = mysqli_real_escape_string($this->db->link, $productName);
            $id = $this->fm->validation($productId);

            if(empty($productName)) {
                $alert = "<span class='success'>Không được để trống</span>  ";
                return $alert;
            } else {
                $query = "UPDATE hanghoa SET TenSanPham='$productName' WHERE ID = '$id'";
                $result = $this->db->insert($query);
                if($result && !empty($productName)) {
                    $alert = "
                      <span class='success'>Chỉnh sửa thành công</span>  
                    ";
                    return $alert;
                } else {
                    $alert = "
                      <span class='error'>Không thành công</span>  
                    ";
                    return $alert;
                }
            }
        }

        /* Delete product */
      /*   public function deleteproduct($id) {
            $query = "DELETE FROM hanghoa WHERE ID = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Xóa danh mục thành công</span>  ";
                return $alert;
            } else {
                $alert = "<span class='error'>Không thành công</span>  ";
                return $alert;
            }
        } */
    }   
?>