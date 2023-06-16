<?php
require('db.php');

$sql = "SELECT userinfo.cname, phone.tel, house.address
        FROM userinfo
        JOIN live ON userinfo.uid = live.uid
        JOIN house ON live.hid = house.hid
        JOIN phone ON house.hid = phone.hid
        ";
$result = $mysqli->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cname = $row['cname'];
        $tel = $row['tel'];
        $address = $row['address'];

        // 輸出
        echo "<div><strong>姓名:</strong> $cname</div>";
        echo "<div><strong>電話:</strong> $tel</div>";
        echo "<div><strong>住址:</strong> $address</div>";
        echo "<hr>";
    }
} else {
    echo "No data found.";
}

$result->free();
$mysqli->close();

?>
