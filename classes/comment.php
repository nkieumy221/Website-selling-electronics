<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>
<?php 
    class comment
    {
        private $db;
        private $fm; //format

        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }

        /* Comment in product */
        public function insertComment() {
            $username = $_POST['cmt-username'];
            $productId = $_POST['productId'];
            $contentCmnt = $_POST['cmt-content'];
            if($username=="" || $productId=="" || $productId=="") {
                $alert = "<span class='success'>Không được để trống</span>  ";
                return $alert;
            }else{
                $check = "SELECT * FROM binhluan WHERE IDSanPham='$productId' AND TenNguoiDung='$username' AND NoiDung='$contentCmnt'";
                $result_check = $this->db->select($check);
                if($result_check){
                    $msg = "<span class='error'>Sản phẩm đã được thêm vào</span>";
				    return $msg;
                } else {
                    $query ="INSERT INTO binhluan(IDSanPham, TenNguoiDung, NoiDung) VALUES ('$productId','$username','$contentCmnt')";
                    $result = $this->db->insert($query);
                    if ($result){
                        $alert = "<span class='success'>Thêm thành công";
                        return $alert;
                    } else {
                        $alert = "<span class='error'>Thêm không thành công";
                        return $alert;
                    }
                }

            }
        }

        /* Show comment */
        public function showComment($id) {
            $query = "SELECT * FROM binhluan WHERE IDSanPham = $id";
            $result = $this->db->select($query);
            return $result;
        }
    }   
?>