<?php

// 找出所有天的位置
$str = "今天天氣是雨天，天氣很不好";
$offset = 0;
$n=1;
while (($pos = mb_strpos($str,"天", $offset)) !== false) {
    echo "找到第 $n 天在\"$pos \"個位置<br>";
    $offset = $pos + mb_strlen("天");
    $n=$n+1;
}
//老師版
// $str = "今天天氣是雨天，天氣很不好";
// $pos=-1;
// while ($pos !== false) {
//     $pos =mb_strpos($str,"天",$pos+1);
//     echo $pos."<br>";
// }

// strpos在第幾個位置，有中文的字串加mb_
// $str="this is a simple demo今天天氣是雨天";
// echo strstr($str,"a")."<p>";
// var_dump(strpos($str,"a"));
// var_dump(mb_strpos($str,"是"));

// strstr找到a直至最尾端，如果找不到為false
// $str="this is a simple demo";
// echo strstr($str,"a")."<p>";
// var_dump(strstr($str,"aaa"));

// strcasecmp不分大小寫
// $a="a";
// $b="A";
// var_dump(strcasecmp($a,$b));

// strcmp字串是否相同，出現int(0)為相同
// int(1)代表a>b
// int(-1)代表a<b
// $a="ahello";
// $b="hello";
// var_dump(strcmp($a,$b));

// var_dump字串是否相同，如果沒有等於零則不相同
// $a="hello";
// $b="ahello";
// var_dump($a==$b);

// //substr索引抓取字，有中文用mb_substr比較方便抓取
// $str="hello你好★";
// echo substr($str,2,6);
// echo mb_substr($str,2,4);

// nl2br代替換行,str_replace代替空白
// $str="<a\n           c>";
// $str=htmlspecialchars($str);
// $str=str_replace(" ","&nbsp;",$str);
// $str=nl2br($str);
// echo $str;

// 左箭頭&lt;右箭頭&gt;空白鍵&nbsp;
// $str="<a             c>";
// $str=htmlspecialchars($str);
// $str=str_replace(" ","&nbsp;",$str);
// echo $str;

// array陣列
// $str="a,b,c";//CSV，可用EXCEL開啟
// $arr=explode(",",$str);//用逗號split分開

// echo "<pre>";
// print_r($arr);
// echo "</pre>";

// trim
// $str="  hello\t \n";
// $str=trim($str);
// echo "trim:<pre>[".$str."]</pre>";

// 字串長度
//echo "strlen:".strlen($str)."<p>";
// echo "mb_strlen:".mb_strlen($str);


// $str="
//     aaa
//         bbb
// ccc
// ";

// $a=20;
// $b=10;
// echo $a.$b;
//echo $a.$b;
// echo "<pre>" . $str . "</pre>";
