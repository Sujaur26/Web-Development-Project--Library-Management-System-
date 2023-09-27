
<!DOCTYPE HTML>  
<html>
<head>
<link rel="stylesheet" type="text/css" href="../controller/style.css">
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<div class="container">
<?php

require('../controller/header.php')

?> 
<?php if (isset($_GET['error'])) { ?>
  <p class="error"><?php echo $_GET['error']; ?></p>

<?php } ?>

<h1>Login Page</h1>

<form action="../controller/StudentloginAction.php" method="post"> 

  User Name: 
           <input type="text" id="uname" name="uname">

  <br><br>
  
  Password: 
          <input type="password" name="pass">
          <br><br>
  <input type="checkbox" name="remember">Remember Me
  <br><br>
         
<a href="AdminHome.php">
        <button>Login</button>
      </a>

  <p>If you have no account,click Registration</p>



</form>
<a href="Registration.php">
        <button>Registration</button>
      </a> 
      <a href="index.php">
        <button>Home</button>
      </a> 

      <?php

require('../controller/footer.php')
?>
<?php
   if (isset($_COOKIE['uname'])) {
     $uname = $_COOKIE['uname'];

     echo"<script>
     document.getElementById('uname').value='$uname';

     </script>";
   }

?>
</div>
</body>

</html>