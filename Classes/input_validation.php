<?php
    class InputValidation {
        //properties
        private $data;
        private $errors = [];
        private static $fields = ['name', 'deduction', 'rank'];

        //methods 
        public function __construct($post_data) {
            $this->data  =  $post_data;
        }

        public function validateForm() {
            foreach(self::$fields as $field) {
                if(!array_key_exists($field, $this->data)) {
                    $this->addError($field, "$field not present in data");
                }
            }
            $this->nameValid();
            $this->deductionValid();
            $this->rankValid();
            return $this->errors;
        }

        //name method
        public function nameValid() {
            $val =  trim($this->data['name']);

            if (empty($val)) {
                $this->addError('name', 'This field cannot be empty.');
            } else {
                if(strlen(!filter_var($val, FILTER_SANITIZE_STRING)) >= 2) {
                    $this->addError('name', 'name must be at least 2 chars long.');
                }
            }
        }

        //deduction method
        public function deductionValid() {
            $val =  trim($this->data['deduction']);
            
            if (empty($val)) {
                $this->addError('deduction', 'deduction cannot be empty.');
            } else {
                if(strlen(!filter_var($val, FILTER_SANITIZE_STRING)) >= 2) {
                    $this->addError('deduction', 'deduction must be at least 2 chars long.');
                }
            }
        }

        //rank method
        public function rankValid() {
            $val =  trim($this->data['rank']);
            
            if (empty($val)) {
                $this->addError('rank', 'rank cannot be empty.');
            } else {
                if(strlen(!filter_var($val, FILTER_SANITIZE_STRING)) >= 2) {
                    $this->addError('rank', 'rank must be at least 2 chars long.');
                }
            }
        }

        private function addError($key, $val) {
            $this->errors[$key] = $val;

        }
       
    }

?>