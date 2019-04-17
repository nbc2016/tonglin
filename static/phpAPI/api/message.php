<?php
require_once("./verify.php");
    // $userArr = my_query("select * from school_user where email='$email'");
    // $userInfo = ['username' => $userArr[0]['username'], 'img' => $userArr[0]['img']];
$flag = false;
if (isset($_POST['type']) && isset($_POST['img']) && isset($_POST['message_tittle']) && isset($_POST['message_more'])) {
    $type = $_POST['type'];
    $img = $_POST['img'];
    $message_tittle = $_POST['message_tittle'];
    $message_more = $_POST['message_more'];
    $user_id = $userArr[0]['id'];
    $username = $userArr[0]['username'];
    $time = date('Y-m-d h:i:s', time());
    if ($type == "lost") {
        if (isset($_POST['qq']) && isset($_POST['tel']) && isset($_POST['message_address'])) {
            $message_address = $_POST['message_address'];
            $qq = $_POST['qq'];
            $tel = $_POST['tel'];
            $flag = my_exec("insert into $type (user_id,img,message_tittle,message_address,message_more,time,qq,tel,username) values ('$user_id','$img','$message_tittle','$message_address','$message_more','$time','$qq','$tel','$username')");
        }
    }else if ($type == 'find') {
      if (isset($_POST['qq']) && isset($_POST['tel']) && isset($_POST['message_address'])) {
          $message_address = $_POST['message_address'];
          $qq = $_POST['qq'];
          $tel = $_POST['tel'];
          if($img === ''){
            $flag = my_exec("insert into $type (user_id,img,message_tittle,message_address,message_more,time,qq,tel,username) values ('$user_id','http://localhost/school/uploads/none.jpg','$message_tittle','$message_address','$message_more','$time','$qq','$tel','$username')");
          }else {
            $flag = my_exec("insert into $type (user_id,img,message_tittle,message_address,message_more,time,qq,tel,username) values ('$user_id','$img','$message_tittle','$message_address','$message_more','$time','$qq','$tel','$username')");
          }
      }
    }else {
        $flag = my_exec("insert into $type (user_id,img,message_tittle,message_more,time,username) values ('$user_id','$img','$message_tittle','$message_more','$time','$username')");
    }
    if ($flag) {
        $id = my_query("select id from $type where user_id='$user_id' order by id desc")[0]['id'];
        exit(json_encode(['code' => 1, 'msg' => '发布成功', 'data' => ['type' => $type, 'id' => $id]]));
    }
} else {
    exit(json_encode(['code' => 0, 'msg' => '发布失败']));
}
?>