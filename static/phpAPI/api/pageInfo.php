<?php
require_once("./control.php");

if (isset($_GET["id"]) && isset($_GET["type"])) {
    $id = $_GET["id"];
    $type = $_GET["type"];
    $data = my_query("select * from $type where id=$id");
    $look = $data[0]['look'] + 1;
    $data[0]['look'] = $look;
    my_exec("update $type set look='$look' where id=$id;");
    $list = 'comment_' . $type;
    $comment = my_query("select * from $list where message_id=$id   order by id desc");
    echo (json_encode([ 'data' => $data[0], 'comment' => $comment]));
}


?>