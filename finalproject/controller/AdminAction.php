<?php 
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'library users') or die(mysqli_error($mysqli));

$id=0;
$name='';
$update=false;

if (isset($_POST['save'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$mysqli->query("INSERT INTO student (id,name) VALUES ('$id','$name')") or die($mysqli->error());
	$_SESSION['messege']="Data saved Successfully";
	header("location:../view/AdminHome.php");
}

if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM student WHERE id=$id") or die($mysqli->error());
	$_SESSION['messege']="Record has been deleted";
	header("location: ../view/AdminHome.php");
}



if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update=true;
    $result = $mysqli->query("SELECT * FROM student WHERE id=$id") or die($mysqli->error());
    if(count(array($result))==1){
    	$row = $result->fetch_array();
    	$id = $row['id'];
    	$name = $row['name'];
    }
}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$mysqli->query("UPDATE student SET id='$id', name= '$name' WHERE id=$id")or die($mysqli->error());
	$_SESSION['messege']="Record has been Updated";
	header("location: ../view/AdminHome.php");
}


?>