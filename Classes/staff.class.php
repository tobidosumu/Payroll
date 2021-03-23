<?php
    require_once "require/DB.php";

    Staff::$db_connect = $db_connect;

    class Staff {
        //properties
        public static $db_connect;
        private $sn;
        private $staff_name;
        private static $staffs = []; /* Lines 5-6 must match the names on DB */

        //methods
        public function __construct($staff_name) {
            $this->sn = count(self::$staffs)+1; /* +1 is to eliminate the zero */
            $this->staff_name = $staff_name;
            self::$staffs[] = $this; /* self = class, $this = object */
        }

        /* Static method e.g. Allowance::getAllowanceName() */

        //-------getters--------
         public static function createStaff($staff){
            $insert_staff = self::$db_connect->query("INSERT INTO staffs 
            (staff_name) VALUES ('$staff')");
            if ($insert_staff === true){
                return $staff;
            }
        }

        private static function fetchStaffs() {
            $result = self::$db_connect->query("SELECT * from staffs");
            if ($result->num_rows > 0) { 
                foreach($result as $staff) {
                   new Staff($staff['staff_name']);
                } 
            }
        }

        //allowance name
        public static function updateStaff($sn, $new_staff_name) {
            $query = "UPDATE staffs 
                    SET staff_name='$new_staff_name' 
                    WHERE sn='$sn'";
            self::$db_connect->query($query);
        } 

        public static function getStaffs() {
            self::fetchStaffs();
            return self::$staffs;
        }

        public function getSerialNum() {
            return $this->sn;
        }

        public function getStaffName() { /*methods are written in camel case*/
            return $this->staff_name;
        }

        //---------setters-------------

       
    }

?>