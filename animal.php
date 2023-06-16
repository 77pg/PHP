<?php
// 轉為字串
// $animals = ["Lion" =>3, "Elephant" =>1, "Giraffe" =>7, "Zebra" =>6];
// $str = json_encode($animals,JSON_UNESCAPED_UNICODE);
// die($str);

// 轉為陣列
$str = '{"Lion" :3, "Elephant" :1, "Giraffe" :7, "Zebra" :6}';
$animals = json_decode($str,true);
// rsort($animals);
// shuffle($animals);
// arsort($animals);//倒序
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>排序</title>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>
<body>
    <table border="1">
    <tr><th>動物名稱</th></tr>
    <?php foreach($animals as $animal => $quantity){?>
        <tr>
            <td> <?= $animal?> </td>
            <td> <?= $quantity?> </td>
        </tr>
        
    <?php } ?>
    </table>
</body>