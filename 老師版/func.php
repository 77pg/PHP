<?php
// http://localhost/老師版/func.php

// 1
// $a=10;//全域變數
// function f(&$a){//加AND符號&變成傳址，沒加預設傳值call by value
//     $a=20;//區域變數
//     echo '====>'.$a.'<br>';
// }
// f($a);
// echo $a;

//2
// $a=[9];
// function f(){//前端傳址，後端傳value
//     global $a;//改成全域變數優先
//     $a[0]=30;
//     echo '====>'. $a[0].'<br>';
// }
// f($a);
// echo $a[0];

//3 static用於計數器
// function inc(){
//     static $n=0;//static靜態變數不會回收記憶體，且只初始化第一次，第二次不會再變回0
//     $n +=1;
//     echo $n;
// }
// inc();
// inc();
// inc();
// inc();

//4 如果沒有static，n用全域變數
// $n =0;
// function inc(){
//     global $n;
//     $n += 1;
//     return $n;
// }
// $n=inc();
// $n=inc();
// $n=inc();
// $n=inc();
// echo $n;

//5 指定型態限制傳回的資料，也可以不指定，系統會推論型態
//null沒有型態，如果加上?型態，就可以顯示出來，這叫int的Nullable型態
// function f(?int $a){
//     echo 'done';
// }
// f(null);


//6 匿名變數closure
// $a= function(){
//     echo 'hello';
// };
// $a();

//7
// function add($a,$b){
//         return $a+$b;
// }
// echo '<h1>' . add(6,3) . '</h1>';
// // $ans = add(5,3);
// // echo $ans;

//8
// function add($a,$b,$f){
//     $f($a+$b);
// }
// add(6,10,function($ans){
//     echo $ans;
// });

//9
// function buildRollerCoaster($name){
//     echo "{$name} 遊樂園 建立了雲霄飛車<br>";
// }
// function buildFerrisWheel($name){
//     echo "{$name} 遊樂園 建立了摩天輪<br>";
// }
// buildRollerCoaster('森林谷');
// buildFerrisWheel('森林谷');
// buildRollerCoaster('乾燥沙漠');
// buildFerrisWheel('乾燥沙漠');

//10  模組化物件導向
// class Playground{
//     // property屬性
//     //在這個class是全域變數
//     public $name=null;

//     //建構子函數、初始化函數construct相當於Playground
//     function __construct($name){
//         $this->name=$name;
//     }
//     // method方法，操作物件的方法
//     function buildRollerCoaster(){
//         // $this->name是class的全域變數
//         echo "{$this->name}遊樂園 建立了雲霄飛車<br>";
//         return $this;
//     }
//     function buildFerrisWheel(){
 
//         echo "{$this->name}遊樂園 建立了摩天輪<br>";
//         return $this;
//     }
// }

// (new Playground('森林谷'))
// ->buildRollerCoaster()
// ->buildFerrisWheel();
// // $play1->buildRollerCoaster();
// // $play1->buildFerrisWheel();

// $play2=new Playground('乾燥沙漠');
// $play2->buildRollerCoaster();

//11  模組化物件導向
// class Playground{
//     // property屬性
//     //在這個class是全域變數
//     public $name=null;

//     //建構子函數、初始化函數construct相當於Playground
//     function __construct($name){
//         $this->name=$name;
//     }
//     // method方法，操作物件的方法
//     function buildRollerCoaster($complete){
//         $complete($this->name);
//         return $this;
//     }
//     function buildFerrisWheel($complete){
//         $complete($this->name);
//         return $this;
//     }
// }

// (new Playground('森林谷'))
// ->buildRollerCoaster(function($name){
//     echo "<h2>{$name}遊樂園 建立了雲霄飛車<br></h2>";
// })
// ->buildFerrisWheel(function($name){
//     echo "<h4>{$name}遊樂園 建立了雲霄飛車<br></h4>";
// });


?>

<!-- <script>
    let a = [17];
    function f(a) {
        a[0] = 20;
        document.write('====>' + a[0] + '<br>');
    }
    f(a);
    document.write(a[0]);
</script> -->
