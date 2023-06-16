<?php
// 呼叫資料庫跟db.php
require('db.php');

$sql = 'select * from UserInfo';
// 去呼叫db.php的mysql變數
$result = $mysqli->query($sql);
// 一次只抓一筆資料，cussor會繼續往下一筆資料
while ($row = $result->fetch_assoc()) {
    echo "{$row['uid']},{$row['cname']}<br>";
}
