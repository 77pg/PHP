<?php session_start(); ?>
<?php 
require('db.php');

// $uid = $_REQUEST['uid'];
$uid = $_REQUEST['uid'];
$pwd = $_REQUEST['pwd'];

$sql = "call login(?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('ss', $uid, $pwd);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$nextPage=$row['result'];
$token=$row['token'];
if($nextPage ==='welcome.php'){
    // $_SESSION['uid']=$uid;
    // $_SESSION['welcome']=$nextPage;
    setcookie('token',$token,time()+120);
    setcookie('welcome',$nextPage,time()+120);
    
}
header("location:{$nextPage}");
// 不要參數綁定
// $sql = "SELECT * FROM userinfo WHERE uid = '{$uid}' AND pwd = '{$pwd}' ";
// $result = $mysqli->query($sql);
// $row = $result->fetch_assoc();

// if ($row == null) {
//     header("Location: error.html");
// } else {
//     $_SESSION['uid'] = $uid;     
//     header("Location: welcome.php");
// }
// if (isset($_POST['logout_redirect'])) {
//     $logoutRedirect = $_POST['logout_redirect'];
// } else {
//     $logoutRedirect = "login.html";
// }