<?php
require('db.php');

$uid = $_REQUEST['uid'];
$pwd = $_REQUEST['pwd'];

$sql = "call login(?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('ss', $uid, $pwd);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$nextPage=$row['result'];
header("location: {$nextPage}");