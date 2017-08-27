<?php

$con = mysqli_connect("127.0.0.1", "work", "work", "php_web");
if (mysqli_connect_errno($con)) {
    echo "连接 MySQL 失败: " . mysqli_connect_error();
}

// 执行查询
$result = mysqli_query($con, "SELECT * FROM users");
var_dump($result);

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "phone: " . $row['phone'] . " nick_name:" . $row['nick_name'];
    echo "<br />";
}


mysqli_close($con);
?>
