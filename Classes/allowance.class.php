<?php
    require_once "require/DB.php";

    Allowance::$db_connect = $db_connect;

    class Allowance {
        //properties
        public static $db_connect;
        private $sn;
        private $allowance_name;
        private static $allowances = []; /* Lines 5-6 must match the names on DB */

        //methods
        public function __construct($allowance_name) {
            $this->sn = count(self::$allowances)+1; /* +1 is to eliminate the zero */
            $this->allowance_name = $allowance_name;
            self::$allowances[] = $this; /* self = class, $this = object */
        }

        /* Static method e.g. Allowance::getAllowanceName() */

        //-------getters--------
         public static function createAllowance($allowance){
            $insert_allowance = self::$db_connect->query("INSERT INTO allowances 
            (allowance_name) VALUES ('$allowance')");
            if ($insert_allowance === true){
                return $allowance;
            }
        }

        private static function fetchAllowances() {
            $result = self::$db_connect->query("SELECT * from allowances");
            if ($result->num_rows > 0) { 
                foreach($result as $allowance) {
                   new Allowance($allowance['allowance_name']);
                } 
            }
        }

        //allowance name
        public static function updateAllowance($sn, $new_allowance_name) {
            $query = "UPDATE allowances 
                    SET allowance_name='$new_allowance_name' 
                    WHERE sn='$sn'";
            self::$db_connect->query($query);
        } 

        public static function getAllowances() {
            self::fetchAllowances();
            return self::$allowances;
        }

        public function getSerialNum() {
            return $this->sn;
        }

        public function getAllowanceName() { /*methods are written in camel case*/
            return $this->allowance_name;
        }

        //---------setters-------------

       
    }

?>