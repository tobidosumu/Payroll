<?php
    require_once "require/DB.php";

    Rank::$db_connect = $db_connect;

    class Rank {
        //properties
        public static $db_connect;
        private $sn;
        private $rank_name;
        private static $ranks = []; /* Lines 5-6 must match the names on DB */

        //methods
        public function __construct($rank_name) {
            $this->sn = count(self::$ranks)+1; /* +1 is to eliminate the zero */
            $this->rank_name = $rank_name;
            self::$ranks[] = $this; /* self = class, $this = object */
        }

        /* Static method e.g. Allowance::getAllowanceName() */

        //-------getters--------
         public static function createRank($rank){
            $insert_rank= self::$db_connect->query("INSERT INTO ranks 
            (rank_name) VALUES ('$rank')");
            if ($insert_rank === true){
                return $rank;
            }
        }

        private static function fetchRanks() {
            $result = self::$db_connect->query("SELECT * from ranks");
            if ($result->num_rows > 0) { 
                foreach($result as $rank) {
                   new Rank($rank['rank_name']);
                } 
            }
        }

        //rank name
        public static function updateRank($sn, $new_rank_name) {
            $query = "UPDATE ranks 
                    SET rank_name='$new_rank_name' 
                    WHERE sn='$sn'";
            self::$db_connect->query($query);
        } 

        public static function getRanks() {
            self::fetchRanks();
            return self::$ranks;
        }

        public function getSerialNum() {
            return $this->sn;
        }

        public function getRankName() { /*methods are written in camel case*/
            return $this->rank_name;
        }

        //---------setters-------------

       
    }

?>