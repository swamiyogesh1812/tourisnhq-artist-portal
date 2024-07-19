<?php
include('dbconfig.php');

if($_REQUEST['del'] == 'yes')
{
    $id = $_REQUEST['id'];
    mysql_query("delete from artists where id = '$id'");   
} else {

$arr = $_REQUEST['arr'];

foreach($arr as $key=>$val)
{
    mysql_query("update artists set sequence_num = '$key' where id='$val'");  
}
}
?>