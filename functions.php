<?php
// require 'dbconfig.php';
// function checkuser($fuid,$ffname,$femail){
//     	$check = mysql_query("select * from Users where Fuid='$fuid'");
// 	$check = mysql_num_rows($check);
// 	if (empty($check)) { // if new user . Insert a new record		
// 	$query = "INSERT INTO Users (Fuid,Ffname,Femail) VALUES ('$fuid','$ffname','$femail')";
// 	mysql_query($query);	
// 	} else {   // If Returned user . update the user record		
// 	$query = "UPDATE Users SET Ffname='$ffname', Femail='$femail' where Fuid='$fuid'";
// 	mysql_query($query);
// 	}
// }
session_start();
require 'dbconfig.php';

function checkuser($fuid,$ffname,$femail){
	$check = mysql_query("select * from Users where Fuid='$fuid'");
	$check = mysql_num_rows($check);
	
	if (empty($check)) { // if new user . Insert a new record		
	$query = "INSERT INTO Users (Fuid,Ffname,Femail) VALUES ('$fuid','$ffname','$femail')";
	mysql_query($query);	
	} else {   // If Returned user . update the user record		
	$query = "UPDATE Users SET Ffname='$ffname', Femail='$femail' where Fuid='$fuid'";
	mysql_query($query);
	}
	$_SESSION['FBID'] = $fuid;           
	$_SESSION['FULLNAME'] = $fbfullname;
	$_SESSION['EMAIL'] =  $femail;
	echo json_encode(['status'=>true]);
	exit;
}
if($_POST['fuid'] && $_POST['name'] && $_POST['email']){		
	checkuser($_POST['fuid'],$_POST['name'],$_POST['email']);
}else{
	echo json_encode(['status'=>false]);
}
?>
