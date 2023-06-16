<?php
$users=[];
$users[] = [
    'name' => 'David',
    'age' => 38
];
$users[] = [
    'name' => 'Amy',
    'age' => 15
];

//----------分隔線-------------

// $a = [1, 2, 3];

// // 兩次shift從頭取值，unshift從尾
// array_unshift($a,4);
// $tmp=array_shift($a);
// $tmp=array_shift($a);

// 新增一個4
//array_push($a,4);
// $a[] = 4;

//刪除陣列1
// unset($a[1]);
// 刪除4
// array_pop($a);

// echo '<pre>';
// print_r($tmp);
// echo '</pre>';

// echo '<pre>';
// print_r($a);
// echo '</pre>';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>陣列foreach迴圈</title>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>

<body>
    <table border="1">
        <tr>
            <th>姓名</th>
            <th>年齡</th>
        </tr>
        <?php foreach ($users as $user) { ?>
        <tr>
            <?php foreach ($user as $key => $value) { ?>
                <td>
                    <?= $value ?>
                </td>            
            <?php } ?>
        </tr>
        <?php } ?>
    </table>
</body>