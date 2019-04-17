<?php
require_once("./control.php");
session_start();
$userArr=[];
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $userArr = my_query("select * from user where email='$email'");
} else {
    exit(json_encode(['code' => 0, 'msg' => '用户未登录']));
}
?>