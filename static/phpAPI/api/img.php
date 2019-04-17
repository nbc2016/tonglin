<?php
require_once("./control.php");
$file = '';
if (!empty($_FILES['file']) && $_FILES['file']['error'] == 0) {
    $ftmp = $_FILES['file']['tmp_name'];
    $fname = $_FILES['file']['name'];
    $text = strrchr($fname, '.');
    $newName = time() . rand(1000, 9999) . $text;
    move_uploaded_file($ftmp, '../uploads/' . $newName);
    $file = 'http://localhost/school/uploads/' . $newName;
}
if ($file != "") {
    exit(json_encode(['code' => 1, 'msg' => '上传成功', 'img' => $file]));
}
echo json_encode(['code' => 0, 'msg' => '上传失败']);