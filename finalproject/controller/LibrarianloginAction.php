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
		header("Location: ../view/Librarianlogin.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: ../view/Librarianlogin.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM librarian WHERE username='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $pass) {
            	header("Location: ../view/LibrarianHome.php");
		        exit();
            }else{
				header("Location: ../view/Librarianlogin.php?error=Incorrect User name or password");
		        exit();
			}
		}else{
			header("Location: ../view/Librarianlogin.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: ../view/Librarianlogin.php");
	exit();
}

?>
