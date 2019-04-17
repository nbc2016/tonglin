<?php 
require_once("./control.php");
session_start();
if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $userArr = my_query("select * from user where email='$email'");
    if (count($userArr) > 0) {
        exit(json_encode(['code' => 0, 'msg' => '邮箱已存在']));
    } else if ($username == '') {
        exit(json_encode(['code' => 0, 'msg' => '用户名为空']));
    } else {
        $flag = my_exec("insert into user (username,email,password,img) values ('$username','$email','$password','http://localhost/school/uploads/default.jpg');");
        if($flag) {
            $_SESSION['email'] = $email;
            exit(json_encode(['code' => 1, 'msg' => '注册成功']));
        }
    }
} else {
    exit(json_encode(['code' => 0, 'msg' => '请提交完整信息']));
}

?>