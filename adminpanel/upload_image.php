<?php
include "library/getstatic.php";
$gs=new getstatic();
$gs->checksession();
$baseurl=$gs->home_base_url();

$fileArr = pathinfo($_FILES["file"]["name"]);
$fileType = $_FILES["file"]["type"];
$extensiion = $fileArr['extension'];

$fileName = sha1(date('Y-m-d H:i:s')."-".time()).".".$extensiion;
$root = "images/";
move_uploaded_file($_FILES["file"]["tmp_name"],$root.$fileName);
$filUrl =  $baseurl."adminpanel/images/".$fileName;
echo json_encode(array("link"=>$filUrl));
?>