<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <?php
 session_start();

$mysqli = new mysqli('localhost', 'root', '', 'library users') or die(mysqli_error($mysqli));

$id=0;
$name='';

if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$mysqli->query("INSERT INTO reservedbooks (id,name) VALUES ('$id','$name')") or die($mysqli->error());
	$_SESSION['messege']="Request Granted";
	header("location: ../view/StudentHome.php");
}


 ?>

</body>
</html>