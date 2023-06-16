<?php
require('db.php');

$uid = $_REQUEST['uid'];
$pwd = $_REQUEST['pwd'];

$sql = "CALL uidregister(?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('ss', $uid, $pwd);
$stmt->execute();
$stmt->bind_result($result);
$stmt->fetch();
$stmt->close();

if ($result === 'UID存在') {
    echo 'UID存在，請重新註冊';
} else if ($result === '成功註冊') {
    echo '成功註冊';
}

?>