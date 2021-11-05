<?php
    include('../lib/database.php');
    include('../helpers/format.php');
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
        public function insertproduct($productName) {
            $productName = $this->fm->validation($productName);

            $productName = mysqli_real_escape_string($this->db->link, $productName);

            if(empty($productName)) {
                $alert = "<span class='success'>Không được để trống</span>  ";
                return $alert;
            } else {
                $query = "INSERT INTO hanghoa(TenSanPham) VALUES ('$productName')";
                $result = $this->db->insert($query);
                if($result && !empty($productName)) {
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
        public function showproduct() {
            $query = "SELECT * FROM hanghoa ORDER BY ID desc";
            $result = $this->db->select($query);
            return $result;
        }

        /* Get product by id*/
        public function getproductById($id){
            $query = "SELECT * FROM hanghoa WHERE ID = $id";
            $result = $this->db->select($query);
            return $result;
        }

        /* Update product */
        public function updateproduct($productName, $productId) {
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
        public function deleteproduct($id) {
            $query = "DELETE FROM hanghoa WHERE ID = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Xóa danh mục thành công</span>  ";
                return $alert;
            } else {
                $alert = "<span class='error'>Không thành công</span>  ";
                return $alert;
            }
        }
    }   
?>