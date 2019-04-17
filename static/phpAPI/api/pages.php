<?php
require_once("./control.php");
$pageNum = 1;
$type = "community";
if(isset($_GET["pageNum"])){
    $pageNum = $_GET["pageNum"] * 6;
}
if(isset($_GET["type"])){
    $type = $_GET["type"];
}
$data = my_query("select * from $type order by id desc limit $pageNum,6");
$total = count(my_query("select * from $type"));
echo (json_encode(['data' => $data , 'total' => $total]));
?>