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
		header("Location: ../view/Studentlogin.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: ../view/Studentlogin.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM student WHERE username='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $pass) {
            	if (isset($_POST['remember'])) {
            	   setcookie('uname',$uname,time()+3600*24);
            	}
            	header("Location: ../view/StudentHome.php");
		        exit();
            }else{
				header("Location: ../view/Studentlogin.php?error=Incorrect User name or password");
		        exit();
			}
		}else{
			header("Location: ../view/Studentlogin.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: ../view/login.php");
	exit();
}

?>
