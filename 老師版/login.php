<?php session_start();?>
<?php
// 在logincheck.php設time()+120，兩分鐘後會登出
// if (isset($_SESSION['uid'])) {
//     header('location:'.$_SESSION['welcome']);
// }
if (isset($_COOKIE['token'])) {
    header('location:'.$_COOKIE['welcome']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- 網址：http://localhost/老師版/login.php -->
    <form action="logincheck.php" method="post">
        帳號：<input type="text" name="uid"><p></p>
        密碼：<input type="password" name="pwd"><p></p>
        <button id="query">登入</button>
        <button>重設</button>
    </form>
</body>
</html>