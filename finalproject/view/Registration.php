<!DOCTYPE HTML>  
<html>
<head>
<link rel="stylesheet" type="text/css" href="../controller/style.css">
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  
    <script src="../controller/Registration.js"></script>

<?php

$id = $email = $name= $uname= $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = test_input($_POST["id"]);

    $name = test_input($_POST["name"]);

    $email = test_input($_POST["email"]);

    $pass = test_input($_POST["pass"]);

    $uname = test_input($_POST["uname"]);

}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php

include('../controller/header.php')

?>


<h2>Registration form</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return isValid(this);">

  ID: <input type="text" name="id" id="id">
  <br><br>
  
  Name: <input type="text" name="name" id="name">
  <br><br>

  E-mail: <input type="text" name="email" id="email">
  <br><br>

  Password: <input type="password" name="pass" id="pass">
  <br><br>

  User Name: <input type="text" name="uname" id="username">
  <br><br>
            
  <input type="submit" name="submit" value="Submit">  
  <br><br>

</form>
   <br><br>


    <a href="Studentlogin.php">
        <button>Login</button>
      </a> 

<hr>

<?php 
  
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "library users";

  $connection = new mysqli($servername, $username, $password, $dbname);

  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }

  $sql = "INSERT INTO student (id, name, username, password, email) VALUES ('$id', '$name', '$uname', '$pass', '$email')";

  $res = $connection->query($sql);

  echo "<br><hr><br>";

  if ($res === true) {
    echo "Data Inserted Succssfully";
  }

  $connection->close();
?>
<p id="message"></p>
<?php
include('../controller/footer.php');
?>

</body>

</html>