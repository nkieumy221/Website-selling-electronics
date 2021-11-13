<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>
<?php 
    class cart
    {
        private $db;
        private $fm; //format

        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }
        /* Add to cart */
        public function addToCart($id, $quantity) {
            $quantity = $this->fm->validation($quantity);
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$id = mysqli_real_escape_string($this->db->link, $id);
			$sId = session_id();
            $check_cart = "SELECT * FROM cart WHERE IDSanPham = $id AND IDSession ='$sId'";
			$result_check_cart = $this->db->select($check_cart);
			if($result_check_cart){
				$msg = "<span class='error'>Sản phẩm đã được thêm vào</span>";
				return $msg;
			}else{

				$query = "SELECT * FROM hanghoa WHERE ID = $id";
				$result = $this->db->select($query)->fetch_assoc();
				$image = $result["HinhAnh"];
				$price = $result["GiaGoc"];
				$productName = $result["TenSanPham"];
				echo $image;
				echo $price;
				echo $productName;
				$query_insert = "INSERT INTO cart(IDSanPham,SoLuong,IDSession,HinhAnh,Gia,TenSanPham) VALUES('$id','$quantity','$sId','$image','$price','$productName')";
				$insert_cart = $this->db->insert($query_insert);
				if($insert_cart){
					$msg = "<span class='error'>Thêm sản phẩm thành công</span>";
					return $msg;
					
				}
			}
        }
    }   
?>