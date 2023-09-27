
<!DOCTYPE HTML>  
<html>
<head>
<link rel="stylesheet" type="text/css" href="../controller/style.css">
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php

require('../controller/header.php')

?> 
<?php if (isset($_GET['error'])) { ?>
  <p class="error"><?php echo $_GET['error']; ?></p>

<?php } ?>

<h1>Login Page</h1>

<form action="../controller/LibrarianloginAction.php" method="post"> 

  User Name: 
           <input type="text" name="uname">

  <br><br>
  
  Password: 
          <input type="password" name="pass">
          <br><br>
         
<a href="AdminHome.php">
        <button>Login</button>
      </a>

</form>
      <a href="index.php">
        <button>Home</button>
      </a> 

      <?php

require('../controller/footer.php')

?>
</body>
</html>