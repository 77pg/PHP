<?php
    $a=(float)$_REQUEST['a'];
    $b=(float)$_REQUEST['b'];
    $op=$_REQUEST['op'];
    //add, sub, mul, div

    switch($op){
        case 'add':
        $op='+';
        $answer =$a+$b;
        break;

        case 'sub':
        $op='-';
        $answer =$a-$b;
        break;

        case 'mul':
        $op='×';
        $answer =$a*$b;
        break;

        case 'div':
        $op='/';
        $answer =$a/$b;
        break;
    }
$arr=[];
$arr['a']=$a;
$arr['b']=$b;
$arr['op']=$op;
$arr['answer']=$answer;
echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    
    ?>