<?php
    class StaffValidation {
        //properties
        private $data;
        private $errors = [];
        private static $fields = ['staff'];

        //methods 
        public function __construct($post_data) {
            $this->data  =  $post_data;
        }

        public function validateStaffForm() {
            foreach(self::$fields as $field) {
                if(!array_key_exists($field, $this->data)) {
                    $this->addError($field, "$field not present in data");
                }
            }
            $this->staffValid();
            return $this->errors;
        }

        //name method
        public function staffValid() {
            $val =  trim($this->data['staff']);

            if (empty($val)) {
                $this->addError('staff', 'This field cannot be empty.');
            } else {
                if(strlen(!filter_var($val, FILTER_SANITIZE_STRING)) >= 2) {
                    $this->addError('staff', 'staff must be at least 2 chars long.');
                }
            }
        }

        private function addError($key, $val) {
            $this->errors[$key] = $val;

        }
       
    }

?>