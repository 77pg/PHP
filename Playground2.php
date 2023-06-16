<?php
// http://localhost/Playground2.php
require_once('Playground.php');
class Playground2 extends Playground{
    function plantTrees($value,$complete){
        $complete($this->name,$value);
        return $this;
    }
}