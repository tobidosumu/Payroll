<?php
    require_once "require/DB.php";

    Staff::$db_connect = $db_connect;

    class Staff {
        //properties
        public static $db_connect;
        private $sn;
        private $surname;
        private $first_name;
        private $phone_no;
        private $bank_name;
        private $account_no;
        private static $staffs = []; /* Lines 5-6 must match the names on DB */

        //methods
        public function __construct($surname, $first_name, $phone_no, $bank_name, $account_no) {
            $this->sn = count(self::$staffs)+1; /* +1 is to eliminate the zero */
            $this->surname = $surname;
            $this->first_name = $first_name;
            $this->phone_no = $phone_no;
            $this->bank_name = $bank_name;
            $this->account_no = $account_no;
            self::$staffs[] = $this; /* self = class, $this = object */
        }

        //-------getters--------
         public static function createStaff($staffs){
             $newStaff = [];
             foreach ($staffs as $key => $staff) {
                 $newStaff[] = $key. "=" . "'" .$staff. "'"; 
             }
             $newStaff = implode(",", $newStaff);

            $insert_staff = self::$db_connect->query("INSERT INTO staffs SET $newStaff");
            if ($insert_staff === true){
                return $staff;
            }
        }

        private static function fetchStaffs() {
            $result = self::$db_connect->query("SELECT * from staffs");
            
            if ($result->num_rows > 0) { 
                foreach($result as $staff) {
                   new Staff($staff['surname'], $staff['first_name'], $staff['phone_no'], $staff['bank_name'], $staff['account_no']);
                } 
            }
        }
        
        //staff
        public static function updateStaff($sn, $new_surname, $new_first_name, $new_phone_no, $new_bank_name, $new_account_no) {
            $query = "UPDATE staffs 
                    SET surname='$new_surname', first_name='$new_first_name', phone_no='$new_phone_no' bank_name='$new_bank_name' account_no='$new_account_no' 
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

        public function getSurname() { /*methods are written in camel case*/
            return $this->surname;
        }

        public function getFirst_name() {
            return $this->first_name;
        }

        public function getPhone_no() {
            return $this->phone_no;
        }

        public function getBank_name() {
            return $this->bank_name;
        }

        public function getAccount_no() {
            return $this->account_no;
        }

        //---------setters-------------

       
    }

?>