<?php 
require_once("./control.php");
session_start();
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userArr = my_query("select * from user where email='$email'");
    if(count($userArr) == 0){
        exit(json_encode(['code' => 0, 'msg' => '该邮箱未注册']));
    }else {
        if ($userArr[0]['password'] == $password) {
            $_SESSION['email'] = $email;
            exit(json_encode(['code' => 1, 'msg' => '登录成功']));
        } else {
            session_unset();
            session_destroy();
            exit(json_encode(['code' => 0, 'msg' => '密码错误']));
        }
    }
    
}
?>