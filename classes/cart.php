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
			session_start();
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
				$price = $result["GiaKM"];
				$productName = $result["TenSanPham"];
				$query_insert = "INSERT INTO cart(IDSanPham,SoLuong,IDSession,HinhAnh,Gia,TenSanPham) VALUES('$id','$quantity','$sId','$image','$price','$productName')";
				$insert_cart = $this->db->insert($query_insert);
				if($insert_cart){
					header('Location:cartDetail.php');
				}
			}
        }

		/* Show cart */
		public function showProductCart() {
			$sId = session_id();
			$query = "SELECT * FROM cart WHERE IDSession = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}

		/* Update quantity in cart*/
		public function updateQuantity($cartId, $quantity) {
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$id = mysqli_real_escape_string($this->db->link, $cartId);

			$query = "UPDATE cart SET SoLuong = '$quantity' WHERE IDCart = '$id'";
			$result = $this->db->update($query);
			echo $query;
			if($result) {
				header('Location:cartDetail.php');
			} else {
				$msg = "<span class='error'>Cập nhật không thành công</span>";
				return $msg;
			}
		}

		/* Delete product cart */
		public function deleteCart($id) {
			$id = mysqli_real_escape_string($this->db->link, $id);
			$query = "DELETE FROM cart WHERE IDCart = '$id'";
			$result = $this->db->delete($query);
			if($result) {
				header('Location:cartDetail.php');
			} else {
				$msg = "<span class='error'>Xóa không thành công</span>";
				return $msg;
			}
		}

		/* Check cart */
		public function checkCart(){
			$sId = session_id();
			$query = "SELECT * FROM cart WHERE IDSession = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}

		/* Delete all data cart */
		public function delAllDataCart() {
			$sId = session_id();
			$query = "DELETE FROM cart WHERE IDSession = '$sId'";
			$result = $this->db->delete($query);
			return $result;
		}

		/* Insert order */
		public function insertOrder($id){
			$sId = session_id();
			$query = "SELECT * FROM cart WHERE IDSession = '$sId'";
			$getProduct = $this->db->select($query);
			while($row = $getProduct->fetch_assoc()){
				$productId = $row['IDSanPham'];
				$productName = $row['TenSanPham'];
				$quantity = $row['SoLuong'];
				$price = $row['Gia'] * $quantity;
				$img = $row['HinhAnh'];
				$customerId = $id;

				$queryInsert = "INSERT INTO dathang(IDSanPham, TenSanPham, IDKhachHang, SoLuong, Gia, HinhAnh) VALUES ('$productId','$productName','$customerId','$quantity','$price','$img')";
				$insertOrder = $this->db->insert($queryInsert);
				if($insertOrder){
					$queryQty = "UPDATE hanghoa SET SoLuong = SoLuong - 1 WHERE ID = '$productId' AND SoLuong > 0 ";
					$resultQty = $this->db->update($queryQty);
					header("Location:success.php");
				}
			}
		}

		/* Total order */
		public function getAmountPrice($customerId) {
			$query = "SELECT Gia FROM dathang WHERE IDKhachHang = '$customerId'";
			$getPrice= $this->db->select($query);
			return $getPrice;
		}

		/* get cart ordered */
		public function showProductOrdered($customerId) {
			$query = "SELECT * FROM dathang WHERE IDKhachHang = '$customerId'";
			$getPrice= $this->db->select($query);
			return $getPrice;
		}

		/* Get inbox cart */
		public function getInboxCart(){
			$query = "SELECT * FROM dathang ORDER BY ThoiGian";
			$getPrice= $this->db->select($query);
			return $getPrice;
		}

		/* Xử lý thông tin đơn hàng */
		public function shifted($id,$time,$price) {
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			
			$query = "UPDATE dathang SET status = 1 WHERE ID = '$id' AND Gia ='$price' AND ThoiGian = '$time' ";			
			$result = $this->db->update($query);
			
		}

		/* Xóa đơn hàng */
		public function deShifted($id,$time,$price) {
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);

			$query = "DELETE FROM dathang WHERE ID = '$id' AND Gia ='$price' AND ThoiGian = '$time' ";
			$result = $this->db->delete($query);
		}

		/* Xác nhận nhận đc hàng */
		public function shiftedConfirm($id,$time,$price) {
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);

			$query = "UPDATE dathang SET status = 2 WHERE IDKhachHang = '$id' AND Gia ='$price' AND ThoiGian = '$time' ";
			$result = $this->db->update($query);
		}

		/* Đếm số lượng sản phẩm trong giỏ hàng */

		public function count(){
			$productCart = $this->showProductCart();
			$qtyProduct = 0;
			if($productCart) {
				$subtotal = 0;
				while($row = $productCart->fetch_assoc()){
					$qtyProduct = $qtyProduct + 1;
				}
			}
			return $qtyProduct;
		}
    }   
?>