<?php
$a=10;//全域變數
function f(&$a){//加AND變成傳址，沒加預設傳值call by value
    $a=20;//區域變數
    echo '====>'.$a.'<br>';
}
f($a);
echo $a;
?>