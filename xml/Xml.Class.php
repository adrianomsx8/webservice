<?php

class Xml {

    private $xml;
    private $tab = 1;

    public function __contruct($version = '1.0', $encode='UTF-8' ){
         $this->xml .= "<?xml version='$version' encoding='$encode' ?>\n";
    }

    public function createOpenXmlTag(){
        $this->xml .= "<?xml version='1.0' encoding='UTF-8' ?>\n";
    }

    public function openTag($name){
        $this->addTab();
        $this->xml .= "<$name>\n";
        $this->tab++;
    }

    public function closeTag($name){
        $this->tab--;
        $this->addTab();
        $this->xml .= "</$name>\n";
    }

    public function setValue($value){
        $this->xml .= "$value\n";
    }

    private function addTab(){
        for($i = 1; $i <= $this->tab; $i++){
            $this->xml .= "\t";
        }
    }

    public function  addTag($name , $value){
        $this->addTab();
        $this->xml .= "<$name>$value</$name>\n";
    }

    public function __toString(){
        return $this->xml;
    }


}