<?php 
//http://localhost/cookie.php?get=1
// http://localhost/cookie.php?get=0
if($_REQUEST['get']== '1'){
    setcookie('name', 'David',time()+30);
}else{
    echo $_COOKIE['name'];
}
?>