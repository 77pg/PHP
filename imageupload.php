<?php
// 暫存檔案
$src = $_FILES['file']['tmp_name'];
// 改存放檔案位置
// 相對路徑
$dst = './images/' . $_FILES['file']['name'];
// 絕對路徑
// $dst = $_SERVER['DOCUMENT_ROOT'] . './images/' . $_FILES['file']['name'];

// die($dst);


if (move_uploaded_file($src, $dst)) {
    echo 'success';
} else {
    echo 'ERROR：' . $_FILES['file']['name'];
}


?>