<?php
// 呼叫資料庫跟db.php
require('db.php');

$uid = $_REQUEST['uid'];
$src = $_FILES['file']['tmp_name'];
$contents = file_get_contents($src);//讀取圖片內容

$sql = "update UserInfo set image = ? where uid = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('bs',$contents,$uid);//s字串綁定變數
$stmt->send_long_data(0,$contents);//0代表最一開頭
$stmt->execute();

unlink($src);//刪除不會占空間
?>