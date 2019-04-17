<?php
require_once("./control.php");
session_start();
$userArr = [];
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $userArr = my_query("select * from user where email='$email'");
    $userInfo = ['username' => $userArr[0]['username'], 'img' => $userArr[0]['img']];
    echo(json_encode(['code' => 1, 'user' => $userInfo]));
}else {
    echo(json_encode(['code' => 0, 'msg' => '未登录','user' => []]));
}
?>