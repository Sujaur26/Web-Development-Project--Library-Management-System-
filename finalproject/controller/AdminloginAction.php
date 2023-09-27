<?php 
session_start(); 
include "dbconn.php";

if (isset($_POST['uname']) && isset($_POST['pass'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['pass']);

	if (empty($uname)) {
		header("Location: ../view/Adminlogin.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: ../view/Adminlogin.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM admin WHERE username='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $pass) {
            	header("Location:../view/AdminHome.php");
		        exit();
            }else{
				header("Location: ../view/Adminlogin.php?error=Incorrect User name or password");
		        exit();
			}
		}else{
			header("Location: ../view/Adminlogin.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: ../view/Adminlogin.php");
	exit();
}

?>
