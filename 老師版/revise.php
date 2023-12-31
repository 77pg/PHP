<?php
if (!isset($_COOKIE['token'])) {
    header('location: login.php');
    die();
}
require('db.php');

// 取得使用者資料
$token = $_COOKIE['token'];
$sql = 'SELECT * FROM userinfo WHERE token = ?';
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('s', $token);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$cname = $row['cname'];
$pwd = $row['pwd'];
$birthday = $row['birthday'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 確認使用者已提交表單
    $uid = $row['uid']; // 從資料庫中取得 uid
    $cname = $_POST['cname'];
    $pwd = $_POST['pwd'];
    $birthday = $_POST['birthday'];

    // 檢查是否有上傳圖片
    if (!empty($_FILES['image']['tmp_name'])) {
        // 如果有上傳圖片，處理圖片資料
        $image = $_FILES['image']['tmp_name'];
        $image_data = file_get_contents($image);
    } else {
        // 如果沒有上傳圖片，保留原始圖片資料
        $image_data = $row['image'];
    }

    // 更新資料庫中的欄位值
    $sql = 'UPDATE userinfo SET cname = ?, pwd = ?, birthday = ?, image = ? WHERE uid = ?';
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('sssss', $cname, $pwd, $birthday, $image_data, $uid);
    $stmt->send_long_data(3, $image_data);
    $stmt->execute();

    // 檢查更新是否成功
    if ($stmt->affected_rows > 0) {
        // 更新成功
        echo '<script>alert("資料修改成功！\n\n姓名：' . $cname . '\n密碼：' . $pwd . '\n生日：' . $birthday . '");</script>';

        // 重新查詢更新後的圖片資料
        $sql = 'SELECT image FROM userinfo WHERE uid = ?';
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $uid);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $image_data = $row['image'];

        // 顯示更新後的圖片
        $mime_type = (new finfo(FILEINFO_MIME_TYPE))->buffer($image_data);
        $image_base64 = base64_encode($image_data);
        $src = "data:{$mime_type};base64,{$image_base64}";
        echo '<script>
        setTimeout(function() { window.location.href = "welcome.php"; }, 1000);
        </script>';
    } else {
        // 更新失敗
        echo '<script>alert("無更新！");</script>';
    }

    $stmt->close();
}


$image = $row['image'];
if ($image == null) {
    $image = file_get_contents("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1zbW2LsUxp_IT0_O9-khcIY-6_BnL_pp_Wg&usqp=CAU");
}
$mime_type = (new finfo(FILEINFO_MIME_TYPE))->buffer($image);
$image_base64 = base64_encode($image);
$src = "data:{$mime_type};base64,{$image_base64}";

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改使用者資料</title>
</head>

<body>
    <div>
        <button onclick="location.href='welcome.php'">返回</button>
    </div>

    <form action="" method="post" enctype="multipart/form-data" style="border: 1px solid black;text-align: center;">
        <h1>修改使用者資料</h1>
        <hr>
        <label for="cname">姓名：</label>
        <input type="text" name="cname" id="cname" value="<?= $cname ?>"><br><br>

        <label for="pwd">密碼：</label>
        <input type="password" name="pwd" id="pwd" value="<?= $pwd ?>"><br><br>

        <label for="birthday">生日：</label>
        <input type="text" name="birthday" id="birthday" value="<?= $birthday ?>"><br><br>

        <label for="image">圖片</label><br><br>
        <img src="<?= $src ?>" width="200" id="preview"><br><br>
        <input type="file" name="image" id="image" onchange="previewImage(event)">
        <br><br>
        <button type="submit" style="float: left;">確認修改</button>
    </form>
    <script>
        // 預覽選取的圖片
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var preview = document.getElementById('preview');
                preview.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>
