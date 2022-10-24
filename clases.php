<?php

    class FormResults {

        public $title;
        public $date;
        public $city;
        public $type;
        public $price;

        function __construct($title, $date, $city, $type, $price)
        {
            $this->title = $title;    
            $this->date = $date;
            $this->city = $city;
            $this->type = $type;
            $this->price = $price; 
        }
    }

?>