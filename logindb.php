<?php
include('dbconfig.php');

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysql_query("select * from admin where username = '$username' and password = '$password'");
if(mysql_num_rows($query) > 0)
{
    session_start();
$row_data = mysql_fetch_array($query);

$_SESSION['user_id'] = $row_data['id'];
?>
<script>
location.href='adminhome.php';
</script>
<?php
}
else {
	?>
	<script>
	alert('username or password incorrect');
	location.href='index.php';
	</script>
	<?php
}
	?>