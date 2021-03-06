<?php
    class AllowanceValidation {
        //properties
        private $data;
        private $errors = [];
        private static $fields = ['allowance'];

        //methods 
        public function __construct($post_data) {
            $this->data  =  $post_data;
        }

        public function validateAllowanceForm() {
            foreach(self::$fields as $field) {
                if(!array_key_exists($field, $this->data)) {
                    $this->addError($field, "$field not present in data");
                }
            }
            $this->allowanceValid();
            return $this->errors;
        }

        //name method
        public function allowanceValid() {
            $val =  trim($this->data['allowance']);

            if (empty($val)) {
                $this->addError('allowance', 'This field cannot be empty.');
            } else {
                if(strlen(!filter_var($val, FILTER_SANITIZE_STRING)) >= 2) {
                    $this->addError('allowance', 'allowance must be at least 2 chars long.');
                }
            }
        }

        private function addError($key, $val) {
            $this->errors[$key] = $val;

        }
       
    }

?>