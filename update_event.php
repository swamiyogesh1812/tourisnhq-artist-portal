<?php
include('dbconfig.php');
session_start();
$user_id = $_SESSION['user_id'];
$id = $_POST['id'];
$cateogries = $_POST['categories'];

mysql_query("update artists set event_id = '$cateogries' where id = '$id'");

?>