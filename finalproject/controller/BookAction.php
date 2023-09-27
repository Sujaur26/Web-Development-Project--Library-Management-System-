<?php 
session_start();

  $mysqli = new mysqli('localhost', 'root', '', 'library users') or die(mysqli_error($mysqli));

$id=0;
$name='';
$Update=false;

if (isset($_POST['add'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$mysqli->query("INSERT INTO books (id,name) VALUES ('$id','$name')") or die($mysqli->error());
	$_SESSION['messege']="Data saved Successfully";
	header("location: ../view/Book.php");
}



if (isset($_GET['remove'])) {
	$id = $_GET['remove'];
	$mysqli->query("DELETE FROM books where id=$id") or die($mysqli->error());
	$_SESSION['messege']="Record has been deleted";
	header("location: ../view/Book.php");
}

if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$Update=true;
    $result = $mysqli->query("SELECT * FROM books WHERE id=$id") or die($mysqli->error());
    if(count(array($result))==1){
    	$row = $result->fetch_array();
    	$id = $row['id'];
    	$name = $row['name'];
    }
}

if (isset($_POST['Update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$mysqli->query("UPDATE books SET id='$id', name= '$name' WHERE id=$id")or die($mysqli->error());
	$_SESSION['messege']="Record has been Updated";
	header("location: ../view/Book.php");
}


?>