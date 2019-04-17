<?php
require_once("./control.php");
session_start();//启动会话
session_unset();//删除会话
session_destroy();//结束会话
exit(json_encode(['code' => 1]))
?>