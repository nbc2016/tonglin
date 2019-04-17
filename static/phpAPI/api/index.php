<?php
require_once("./control.php");
$community = my_query("select * from community order by id desc limit 0,3");
$essay = my_query("select * from essay order by id desc limit 0,4");
$find = my_query("select * from find order by id desc limit 0,3");
$lost = my_query("select * from lost order by id desc limit 0,3");
$study = my_query("select * from study order by id desc limit 0,5");
echo (json_encode(['community' => $community, 'essay' => $essay, 'find' => $find, 'lost' => $lost, 'study' => $study]));
?>