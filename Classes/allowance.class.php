<?php

    class Allowance {
        //properties
        private $serial_num;
        private $allowance;
        private static $allowances = [];

        //methods
        public function __construct($allowance) {
            $this->serial_num = count(self::$allowances);
            $this->allowance = $allowance;
            self::$allowances[] = $this;
        }

        //-------getters--------
        public static function getAllowances() {
            return self::$allowances;
        }

        public function getSerialNum() {
            return $this->serial_num;
        }

        public function getAllowance() {
            return $this->allowance;
        }

    }

?>