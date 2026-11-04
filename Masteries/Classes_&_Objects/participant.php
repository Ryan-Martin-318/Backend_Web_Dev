<?php
    class Participant{
        public string $name;
        public function __construct(string $name){
            $this->name = $name;
        }
        public function greeting(){
            echo "Hello, ". $this->name ."!";
        }
    }
    $jordan = new Participant("Jordan");
    $jordan->greeting();
