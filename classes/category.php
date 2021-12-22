<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>
<?php 
    class category
    {
        private $db;
        private $fm; //format

        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }
        /* Insert category */
        public function insertCategory($catName) {
            $catName = $this->fm->validation($catName);

            $catName = mysqli_real_escape_string($this->db->link, $catName);

            if(empty($catName)) {
                $alert = "<span class='success'>Không được để trống</span>  ";
                return $alert;
            } else {
                $query = "INSERT INTO danhmuclon(TenDanhMuc) VALUES ('$catName')";
                $result = $this->db->insert($query);
                if($result && !empty($catName)) {
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
        /* Show category */
        public function showCategory() {
            $query = "SELECT * FROM danhmuclon ORDER BY ID asc";
            $result = $this->db->select($query);
            return $result;
        }

        /* Get category by id*/
        public function getCategoryById($id){
            $query = "SELECT * FROM danhmuclon WHERE ID = $id";
            $result = $this->db->select($query);
            return $result;
        }

        /* Update category */
        public function updateCategory($catName, $catId) {
            $catName = $this->fm->validation($catName);
            $catName = mysqli_real_escape_string($this->db->link, $catName);
            $id = $this->fm->validation($catId);

            if(empty($catName)) {
                $alert = "<span class='success'>Không được để trống</span>  ";
                return $alert;
            } else {
                $query = "UPDATE danhmuclon SET TenDanhMuc='$catName' WHERE ID = '$id'";
                $result = $this->db->insert($query);
                if($result && !empty($catName)) {
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

        /* Delete category */
        public function deleteCategory($id) {
            $query = "DELETE FROM danhmuclon WHERE ID = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Xóa danh mục thành công</span>  ";
                return $alert;
            } else {
                $alert = "<span class='error'>Không thành công</span>  ";
                return $alert;
            }
        }

        /* Show brand by category */
        public function showCategoryByBrand($categoryId) {
            $sqlDMCon = "SELECT * FROM danhmuccon WHERE IDDanhMuc = '$categoryId' "; 
            $result = $this->db->select($sqlDMCon);
            return $result;
        }

        /* Show list product by category */
        public function showProductByCategory($categoryId){
            $sqlDM = "SELECT * FROM hanghoa WHERE IDDanhMucLon = '$categoryId' LIMIT 12"; 
            $result = $this->db->select($sqlDM);
            return $result;
        }
        /* Show list product by brand */
        public function showProductByBrand($brandId){
            $sqlDMCon = "SELECT * FROM hanghoa WHERE IDDanhMucCon = '$brandId' LIMIT 12"; 
            $result = $this->db->select($sqlDMCon);
            return $result;
        }

        public function getNameByCategory($categoryId){
            $sqlDM = "SELECT hanghoa.*, danhmuclon.TenDanhMuc, danhmuclon.ID 
                    FROM hanghoa, danhmuclon
                    WHERE hanghoa.IDDanhMucLon = danhmuclon.ID AND hanghoa.IDDanhMucLon ='$categoryId'"; 
            $result = $this->db->select($sqlDM);
            return $result;
        }

        public function getNameByBrand($brandId){
            $sqlDM = "SELECT hanghoa.*, danhmuccon.*
                    FROM hanghoa, danhmuccon
                    WHERE hanghoa.IDDanhMucCon = danhmuccon.ID AND hanghoa.IDDanhMucCon ='$brandId'"; 
            $result = $this->db->select($sqlDM);
            return $result;
        }

        /* Hiển thị logo brand */
        public function showBrandLogo($categoryId){
            $sqlDMCon = "SELECT * FROM danhmuccon WHERE IDDanhMuc = '$categoryId' "; 
            $result = $this->db->select($sqlDMCon);
            return $result;
        }
    }   
?>

