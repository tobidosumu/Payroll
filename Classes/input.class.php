<?php

    class Product {
        //properties
        private $serial_num;
        private $name;
        private $deduction;
        private $rank;
        private static $products = [];

        //methods
        public function __construct($name, $rank, $deduction) {
            $this->serial_num = count(self::$products);
            $this->name = $name;
            $this->stock_price = $rank;
            $this->quantity = $deduction;
            self::$products[] = $this;
        }

        //-------getters--------
        public static function getProducts() {
            return self::$products;
        }

        public function getSerialNum() {
            return $this->serial_num;
        }

        public function getName() {
            return $this->name;
        }

        public function getQuantity() {
            return $this->quantity;
        }

        public function getStockPrice() {
            return $this->stock_price;
        }

        public function getTotalStockPrice() {
            // return $this->getStockPrice() * $this->getStockPrice();
            foreach ($this->stock_price as $$this->stockTotal) {
                
            }
        }

    }

?>