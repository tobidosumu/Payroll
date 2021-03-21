<?php
    class DeductionValidation {
        //properties
        private $data;
        private $errors = [];
        private static $fields = ['deduction'];

        //methods 
        public function __construct($post_data) {
            $this->data  =  $post_data;
        }

        public function validateDeductionForm() {
            foreach(self::$fields as $field) {
                if(!array_key_exists($field, $this->data)) {
                    $this->addError($field, "$field not present in data");
                }
            }
            $this->deductionValid();
            return $this->errors;
        }

        //name method
        public function deductionValid() {
            $val =  trim($this->data['deduction']);

            if (empty($val)) {
                $this->addError('deduction', 'This field cannot be empty.');
            } else {
                if(strlen(!filter_var($val, FILTER_SANITIZE_STRING)) >= 2) {
                    $this->addError('deduction', 'deduction must be at least 2 chars long.');
                }
            }
        }

        private function addError($key, $val) {
            $this->errors[$key] = $val;

        }
       
    }

?>