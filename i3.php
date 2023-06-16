<?php
require('db.php');


$uid = $_REQUEST['uid'];
$nullDefault = "無";

$sql = "call queryUserInfo(?,?)";//為了解決資安問題一律用?
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('ss',$uid,$nullDefault);//s字串綁定變數
$stmt->execute();//執行結果放在stmt
$result=$stmt->get_result();//回傳

//$result = $mysqli->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "{$row['cname']},{$row['address']},{$row['tel']}\n";
}