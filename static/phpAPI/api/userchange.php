<?php
require_once("./verify.php");
$userid = $userArr[0]['id'];
$password1 = $userArr[0]['password'];
$avatar = '';
if (!empty($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
    $ftmp = $_FILES['avatar']['tmp_name'];
    $fname = $_FILES['avatar']['name'];
    $text = strrchr($fname, '.');
    $newName = time() . rand(1000, 9999) . $text;
    move_uploaded_file($ftmp, '../uploads/' . $newName);
    $avatar = 'http://localhost/school/uploads/' . $newName;
}
if ($avatar != "") {
    $flag = my_exec("update user set img='$avatar' where id=$userid;");
    if($flag) {
        exit(json_encode(['code' => 1, 'msg' => '修改成功','img' => $avatar]));
    }
} else if (isset($_POST['oldpassword']) && isset($_POST['newpassword'])) {
    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];
    if ($oldpassword == $password1) {
        $flag = my_exec("update user set password='$newpassword' where id=$userid;");
        if($flag) {
            exit(json_encode(['code' => 1, 'msg' => '修改成功']));
        }
    } else {
        echo json_encode(['code' => 0, 'msg' => '密码错误']);
    }
}else if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $flag = my_exec("update user set username='$username' where id=$userid;");
    if($flag){
        exit(json_encode(['code' => 1, 'msg' => '修改成功']));
    }
}
echo json_encode(['code' => 0, 'msg' => '修改失败']);