<?php session_start(); ?>
<?php
header("Expires: on, 01 Jan 1970 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<?php 
//CREATE SQL STATEMENT
$sql_contact = "SELECT * FROM tblcontact";

//CONNECT TO THE MYSQL SERVER
require('inc-conncvnl.php');

//EXECUTE SQL STATEMENT
$rs_contact = mysqli_query($vconncvnl, $sql_contact);

//CREATE AN ASSOCIATIVE ARRAY
$vContactContent = mysqli_fetch_assoc($rs_contact);

$json_ld_data = json_encode($vContactContent);
return $json_ld_data;
?>