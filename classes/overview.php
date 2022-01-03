<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>
<?php 
    class overview
    {
        private $db;
        private $fm; //format

        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }

        /* Doanh thu tháng */
        public function revenueMonth(){
            $query = "SELECT * FROM dathang WHERE MONTH(ThoiGian) = MONTH(NOW())";
            $result = $this->db->select($query);
            $total =0;
            while($row = $result->fetch_assoc()){
                $total += $row['Gia'];
            }
            return $total;
        }

        public function revenueOverview(){
            $query = "SELECT * FROM dathang WHERE YEAR(ThoiGian) = YEAR(NOW())";
            $result = $this->db->select($query);
            $total =0;
            while($row = $result->fetch_assoc()){
                $total += $row['Gia'];
            }
            return $total;
        }

        public function numberOrder(){
            $query = "SELECT * FROM dathang WHERE YEAR(ThoiGian) = YEAR(NOW())";
            $result = $this->db->select($query);
            $total =0;
            while($row = $result->fetch_assoc()){
                $total += 1;
            }
            return $total;
        }
    }
?>