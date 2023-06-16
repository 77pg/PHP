<?php
require('db.php');
$uid = $_REQUEST['uid'];

$sql = "select image from UserInfo where uid = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('s', $uid);
$stmt->execute();
$result = $stmt->get_result();


while ($row = $result->fetch_assoc()) {
    $image=$row['image'];
}
// 預設頭貼
if($image == null){
    $image=file_get_contents("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1zbW2LsUxp_IT0_O9-khcIY-6_BnL_pp_Wg&usqp=CAU");
}
header('content-type: image/jpeg');
echo $image;