<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>
<?php 
    class customer
    {
        private $db;
        private $fm; //format

        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }

        /* Insert */
        public function insertCustomer($data) {
            $username = mysqli_real_escape_string($this->db->link, $data['username']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
            $password2 = mysqli_real_escape_string($this->db->link, md5($data['password2']));
            if($username=="" || $password=="" || $password2=="" ) {
                $alert = "<span class='success'>Không được để trống</span>  ";
                return $alert;
            }else{
                $checkUser = "SELECT * FROM khachhang WHERE username = '$username' LIMIT 1";
                $result = $this->db->select($checkUser);
                if($result){
                    $alert = "<span class='error'>Người dùng đã tồn tại</span>  ";
                    return $alert;
                } else{
                    $query = "INSERT INTO khachhang(username, Password) VALUES ('$username','$password')";
                    $result =  $this->db->select($query);
                    if($result){
                        $alert = "<span class='success'>Thành công</span>  ";
                        return $alert;
                    } else {
                        $alert = "<span class='success'>Không thành công</span>  ";
                        return $alert;
                    }
                }
            }
        }

        public function loginCustomer($data) {
            $username = mysqli_real_escape_string($this->db->link, $data['usname']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['pass']));
            if($username=="" || $password=="") {
                $alert = "<span class='success'>Không được để trống</span>  ";
                return $alert;
            }else{
                $checkUser = "SELECT * FROM khachhang WHERE username = '$username' AND Password = '$password'";
                $result = $this->db->select($checkUser);
                if($result){
                    $value = $result->fetch_assoc();
                    Session::set('customerLogin', true);
                    Session::set('customerId', $value['ID']);
                    Session::set('customerName', $username);
                    
                } else{
                    $alert = "<span class='error'>Tên đăng nhập hoặc tài khoản sai</span>  ";
                    return $alert;
                }
            }
        }
    }   
?>