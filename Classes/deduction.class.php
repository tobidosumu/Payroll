<?php
    require_once "require/DB.php";

    Deduction::$db_connect = $db_connect;

    class Deduction {
        //properties
        public static $db_connect;
        private $sn;
        private $deduction_name;
        private static $deductions = []; /* Lines 5-6 must match the names on DB */

        //methods
        public function __construct($deduction_name) {
            $this->sn = count(self::$deductions)+1; /* +1 is to eliminate the zero */
            $this->deduction_name = $deduction_name;
            self::$deductions[] = $this; /* self = class, $this = object */
        }

        /* Static method e.g. Allowance::getAllowanceName() */

        //-------getters--------
         public static function createDeduction($deduction){
            $insert_deduction = self::$db_connect->query("INSERT INTO deductions 
            (deduction_name) VALUES ('$deduction')");
            if ($insert_deduction === true){
                return $deduction;
            }
        }

        private static function fetchDeductions() {
            $result = self::$db_connect->query("SELECT * from deductions");
            if ($result->num_rows > 0) { 
                foreach($result as $deduction) {
                   new Deduction($deduction['deduction_name']);
                } 
            }
        }

        //deduction name
        public static function updateDeduction($sn, $new_deduction_name) {
            $query = "UPDATE deductions 
                    SET deduction_name='$new_deduction_name' 
                    WHERE sn='$sn'";
            self::$db_connect->query($query);
        } 

        public static function getDeductions() {
            self::fetchDeductions();
            return self::$deductions;
        }

        public function getSerialNum() {
            return $this->sn;
        }

        public function getDeductionName() { /*methods are written in camel case*/
            return $this->deduction_name;
        }

        //---------setters-------------

       
    }

?>