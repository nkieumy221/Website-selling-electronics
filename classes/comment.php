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

        /* Reply comments */
        public function showReplyComment($id) {
            $query = "SELECT * FROM replycomment WHERE IDComment = $id";
            $result = $this->db->select($query);
            return $result;
        }

        /* Show allComments */
        public function showAllComments() {
            $query = "SELECT * FROM binhluan";
            $result = $this->db->select($query);
            return $result;
        }

        function getUsernameById($id)
        {
            $query = "SELECT TenKhachHang FROM khachhang WHERE ID=" . $id . " LIMIT 1";
            $result = $this->db->select($query);
            while($row = $result->fetch_assoc()){
                $name = $row['TenKhachHang'];
            }
            return $name; ;
        }

        function getProductnameById($id)
        {
            $query = "SELECT TenSanPham FROM hanghoa WHERE ID=" . $id . " LIMIT 1";
            $result = $this->db->select($query);
            while($row = $result->fetch_assoc()){
                $name = $row['TenSanPham'];
            }
            return $name; ;
        }

        public function showCommentById($id){
            $query = "SELECT * FROM binhluan WHERE ID = $id";
            $result = $this->db->select($query);
            return $result;
        }

        /* Reply comments by admin */ 
        public function insertReply($username,$content,$productId) {
            if($username=="" || $productId=="" || $productId=="") {
                $alert = "<span class='success'>Không được để trống</span>  ";
                return $alert;
            }else{
                $check = "SELECT * FROM replycomment WHERE IDComment='$productId' AND TenNguoiDung='$username' AND Body='$content'";
                $result_check = $this->db->select($check);
                if($result_check){
                    $msg = "<span class='error'>Sản phẩm đã được thêm vào</span>";
				    return $msg;
                } else {
                    $query ="INSERT INTO replycomment(IDComment, TenNguoiDung, Body, Rule) VALUES ('$productId','$username','$content', 1)";
                    $result = $this->db->insert($query);
                    if ($result){
                        header("Location:listComments.php");
                    } else {
                        $alert = "<span class='error'>Thêm không thành công";
                        return $alert;
                    }
                }

            }
        }

        public function deleteComment($id){
            $query = "DELETE FROM binhluan WHERE ID = $id";
            $result = $this->db->delete($query);
            return "Xóa Thành Công";
        }

        public function checkReplyCmt($idCmt){
            $query = "SELECT replycomment.IDComment FROM replycomment WHERE IDComment = $idCmt AND Rule =1";
            $result = $this->db->select($query);
            return $result;
        }

        /* Support client */
        public function insertTextSample($query,$reply){
            $query ="INSERT INTO chatbot(queries,replies) VALUES ('$query','$reply')";
            $result = $this->db->insert($query);
        }

        public function showText(){
            $query = "SELECT * FROM chatbot";
            $result = $this->db->select($query);
            return $result;
        }

        public function deleteText($id){
            $query = "DELETE FROM chatbot WHERE id = $id";
            $result = $this->db->delete($query);
            return "Xóa Thành Công";
        }
    }   
?>