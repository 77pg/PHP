<?php
// http://localhost/func.php
// 跟func.php
class Playground{
    // property屬性
    //在這個class是全域變數
    public $name=null;

    //建構子函數、初始化函數construct相當於Playground
    function __construct($name){
        $this->name=$name;
    }
    // method方法，操作物件的方法
    function buildRollerCoaster($complete){
        $complete($this->name);
        return $this;
    }
    function buildFerrisWheel($complete){
        $complete($this->name);
        return $this;
    }
}