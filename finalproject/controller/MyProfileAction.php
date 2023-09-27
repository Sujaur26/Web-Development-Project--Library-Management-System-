<?php 
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'library users') or die(mysqli_error($mysqli));

$id='';
$name='';
$uname='';
$pass='';
$email='';
$update=false;

if (isset($_GET['change'])){
	$id = $_GET['change'];
	$update=true;
    $result = $mysqli->query("SELECT * FROM student WHERE id=$id") or die($mysqli->error());
    if(count(array($result))==1){
    	$row = $result->fetch_array();
    	$id = $row['id'];
    	$name = $row['name'];
    	$uname = $row['username'];
    	$pass = $row['password'];
    	$email = $row['email'];
    }
}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$uname = $_POST['username'];
	$pass = $_POST['password'];
	$email = $_POST['email'];
	$mysqli->query("UPDATE student SET id='$id', name= '$name', username='$uname', password='$pass', email='$email' WHERE id=$id")or die($mysqli->error());
	$_SESSION['messege']="Record has been Updated";
	header("location: ../view/MyProfile.php");
}


?>