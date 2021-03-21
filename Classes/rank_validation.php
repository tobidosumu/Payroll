<?php
    class RankValidation {
        //properties
        private $data;
        private $errors = [];
        private static $fields = ['rank'];

        //methods 
        public function __construct($post_data) {
            $this->data  =  $post_data;
        }

        public function validateRankForm() {
            foreach(self::$fields as $field) {
                if(!array_key_exists($field, $this->data)) {
                    $this->addError($field, "$field not present in data");
                }
            }
            $this->rankValid();
            return $this->errors;
        }

        //name method
        public function rankValid() {
            $val =  trim($this->data['rank']);

            if (empty($val)) {
                $this->addError('rank', 'This field cannot be empty.');
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