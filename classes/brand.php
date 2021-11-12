<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>
<?php 
    class brand
    {
        private $db;
        private $fm; //format

        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }
        /* Insert Brand */
        public function insertBrand($brandName) {
            $brandName = $this->fm->validation($brandName);

            $brandName = mysqli_real_escape_string($this->db->link, $brandName);

            if(empty($brandName)) {
                $alert = "<span class='success'>Không được để trống</span>  ";
                return $alert;
            } else {
                $query = "INSERT INTO danhmuccon(TenThuongHieu) VALUES ('$brandName')";
                $result = $this->db->insert($query);
                if($result && !empty($brandName)) {
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
        /* Show Brand */
        public function showBrand() {
            $query = "SELECT * FROM danhmuccon ORDER BY ID desc";
            $result = $this->db->select($query);
            return $result;
        }

        /* Get Brand by id*/
        public function getBrandById($id){
            $query = "SELECT * FROM danhmuccon WHERE ID = $id";
            $result = $this->db->select($query);
            return $result;
        }

        /* Update Brand */
        public function updateBrand($brandName, $catId) {
            $brandName = $this->fm->validation($brandName);
            $brandName = mysqli_real_escape_string($this->db->link, $brandName);
            $id = $this->fm->validation($catId);

            if(empty($brandName)) {
                $alert = "<span class='success'>Không được để trống</span>  ";
                return $alert;
            } else {
                $query = "UPDATE danhmuccon SET TenThuongHieu='$brandName' WHERE ID = '$id'";
                $result = $this->db->insert($query);
                if($result && !empty($brandName)) {
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

        /* Delete Brand */
        public function deleteBrand($id) {
            $query = "DELETE FROM danhmuccon WHERE ID = '$id'";
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