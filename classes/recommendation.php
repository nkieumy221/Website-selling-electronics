<?php
    $filepath = realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');
?>
<?php 
    class recommendation
    {
        private $db;
        private $fm; //format

        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }

        /* Show rating product */
        public function ratingProductQuery(){
            $query = "SELECT * FROM ratingproduct";
            $result = $this->db->select($query);
            return $result;
        }

        /* Get rating of user */
        public function getRatingByUserId($id){
            $query = "SELECT * FROM ratingproduct WHERE IDUser = $id";
            $result = $this->db->select($query);
            return $result;
        }

        /* Get username by id*/
        public function getUserName($id){
            $query = "SELECT username FROM khachhang WHERE ID = $id";
            $result = $this->db->select($query);
            if($result){
                while($row = $result->fetch_assoc() ){
                    return $row['username'];
                }
            }
        }

        /* Get product name by id*/
        public function getProductName($id){
            $query = "SELECT TenSanPham FROM hanghoa WHERE ID = $id";
            $result = $this->db->select($query);
            while($row = $result->fetch_assoc()){
                return $row['TenSanPham'];
            }
        }

        /* Get product by name*/
        public function getProductByName($productName){
            $query = "SELECT * FROM hanghoa WHERE TenSanPham = '$productName'";
            $result = $this->db->select($query);
            return $result;
        }
    }   

    /* similar distance */
    function similarityDistance($matrix,$person1, $person2) {
        $similar = array();
        $sum = 0;
        foreach($matrix[$person1] as $key => $value) {
            if(array_key_exists($key,$matrix[$person2])){
                $similar[$key] = 1;
            }
            if($similar ==0){
                return 0;
            }
            foreach($matrix[$person1] as $key => $value){
                if(array_key_exists($key,$matrix[$person2])){
                    $sum = $sum + pow($value - $matrix[$person2][$key],2);
                }
            }
            return 1/(1+sqrt($sum));
        }
    }

    function getSimilarity($matrix,$person){
        foreach($matrix as $otherPerson=>$value) {
            if($otherPerson != $person){
                $sim = similarityDistance($matrix,$person,$otherPerson);
                echo "
                    <tr>
                        <td class='product_name'>" 
                        .$otherPerson." 
                        </td>
                        <td> " 
                        .$sim .
                        "</td>
                    </tr>";
            }
        }

    }

    function getRecommendation($matrix,$person,$k){
        $total = array();
        $simsums = array();
        $ranks = array();
        foreach($matrix as $otherPerson => $value) {
            if($otherPerson != $person){
                $sim = similarityDistance($matrix,$person,$otherPerson);
                foreach($matrix[$otherPerson] as $key => $value) {
                    if(!array_key_exists($key,$matrix[$person])){
                        if(!array_key_exists($key,$total)){
                            $total[$key] = 0; 
                        }
                        $total[$key] += $matrix[$otherPerson][$key] * $sim;
                        if(!array_key_exists($key,$simsums)){
                            $simsums[$key] = 0; 
                        }
                        $simsums[$key] += $sim; 
                    }
                }
            }
        }

        foreach($total as $key => $value){
            $ranks[$key] = $value / $simsums[$key];
        }
        array_multisort($ranks, SORT_DESC);
        $ouput = array_slice($ranks,0, $k);
        return $ouput;
    }

?>