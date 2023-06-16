<?php
require('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    $sql = "SELECT userinfo.cname, phone.tel, house.address
            FROM userinfo
            JOIN live ON userinfo.uid = live.uid
            JOIN house ON live.hid = house.hid
            JOIN phone ON house.hid = phone.hid
            WHERE userinfo.uid = '$uid' AND userinfo.pwd = '$pwd'";
    $result = $mysqli->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $cname = $row['cname'];
            $tel = $row['tel'];
            $address = $row['address'];

            echo "<div><strong>姓名:</strong> $cname</div>";
            echo "<div><strong>電話:</strong> $tel</div>";
            echo "<div><strong>住址:</strong> $address</div>";
            echo "<hr>";
        }
    } else {
        echo "帳號密碼輸入錯誤";
    }

    $result->free();
    $mysqli->close();
}
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('form').submit(function(event) {
        event.preventDefault(); 

        // 獲取uid跟pwd
        var uid = $('#uid').val();
        var pwd = $('#pwd').val();

        // ajax請求
        $.ajax({
            type: 'POST',
            url: '',
            data: { uid: uid, pwd: pwd },
            success: function(response) {
                // 返回數據
                $('#result').html(response);
            },
            error: function() {
                $('#result').html('請求失敗');
            }
        });
    });
});
</script>

<form>
    <label for="uid">使用者帳號:</label>
    <input type="text" name="uid" id="uid" required>

    <label for="pwd">密碼:</label>
    <input type="password" name="pwd" id="pwd" required>

    <input type="submit" value="提交">
</form>
