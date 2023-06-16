<?php session_start(); ?>
<?php
//http://localhost/老師版/s2.php
if(isset($_session['name'])){
    echo $_session['name'];
}else{
    echo 'Anonymous';
}
?>