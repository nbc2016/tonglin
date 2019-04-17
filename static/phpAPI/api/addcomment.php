<?php
require_once("./verify.php");
    // $userArr = my_query("select * from school_user where email='$email'");
    // $userInfo = ['username' => $userArr[0]['username'], 'img' => $userArr[0]['img']];

if (isset($_POST['message_id']) && isset($_POST['message']) && isset($_POST['type'])) {
    $message_id = $_POST['message_id'];
    $message = $_POST['message'];
    $type = $_POST['type'];
    $list = 'comment_' . $type;
    $time = date('Y-m-d h:i:s', time());
    $username = $userArr[0]['username'];
    $img = $userArr[0]['img'];
    $flag = my_exec("insert into $list (message_id,message,time,img,username) values ('$message_id','$message','$time','$img','$username')");
    if ($flag) {
        $comment = my_query("select comment from $type where id='$message_id'")[0]['comment'];
        $comment = (int)$comment + 1;
        my_exec("update $type set comment='$comment' where id='$message_id';");
        $newcomment = my_query("select * from $list order by id desc")[0];
        exit(json_encode(['code' => 1, 'msg' => '评论成功', 'comment' => $newcomment]));
    }
} else {
    exit(json_encode(['code' => 0, 'msg' => '评论失败']));
}
?>