<?php
    $filepath = realpath(dirname(__FILE__));
    include($filepath.'/../lib/session.php');
    Session::checkLogin();
    include($filepath.'/../lib/database.php');
    include($filepath.'/../helpers/format.php');
?>
<?php 
    class adminLogin
    {
        private $db;
        private $fm; //format

        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function login_admin($adminUser, $adminPassword) {
            $adminUser = $this->fm->validation($adminUser);
            $adminPassword = $this->fm->validation($adminPassword);

            $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
            $adminPassword = mysqli_real_escape_string($this->db->link, $adminPassword);

            if(empty($adminUser) || empty($adminPassword)) {
                $alert = "Không được để trống";
                return $alert;
            } else {
                $query = "SELECT * FROM tbl_admin WHERE adminUser ='$adminUser' AND adminPass = '$adminPassword' LIMIT 1";
                $result = $this->db->select($query);
                if ($result != false) {
                    $value = $result->fetch_assoc();
                    Session::set('adminlogin', true);
                    Session::set('adminID', $value['adminID']);
                    Session::set('adminUser', $value['adminUser']);
                    Session::set('adminName', $value['adminName']);
                    header("Location: homepage.php");
                } else {
                    $alert = "Mật khẩu hoặc tài khoản sai";
                    return $alert;
                }
            }
        }
    }   
?>