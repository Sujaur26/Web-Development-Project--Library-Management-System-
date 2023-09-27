<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../controller/style.css">
<style>
.error {color: #FF0000;}
</style>
  <title></title>
</head>
<body>

  <?php require_once '../controller/MyProfileAction.php';?>


  <?php
   if (isset($_SESSION['messege'])):
  ?>
  <?php
  echo $_SESSION['messege'];
  unset($_SESSION['messege']);
  ?>
<?php endif ?>

  <div class="container">

<?php 

  $mysqli = new mysqli('localhost', 'root', '', 'library users') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM student") or die($mysqli->error);

?>

<div class="row justify-content-center">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>User Name</th>
        <th>Password</th>
        <th>Email</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td> <?php echo $row['id']; ?> </td>
        <td> <?php echo $row['name']; ?> </td>
        <td> <?php echo $row['username']; ?> </td>
        <td> <?php echo $row['password']; ?> </td>
        <td> <?php echo $row['email']; ?> </td>
        <td>
          <a href="MyProfile.php?change=<?php echo $row['id'];?>"
             class="btn btn-info">Change</a>   
        </td>
      </tr>
    <?php endwhile; ?>
  </table>
</div>

<?php 
  function pre_r($array){
  echo '<pre>';
  print_r($array);
  echo '</pre>';
   }

?>
<hr>
<form action="../controller/MyProfileAction.php" method="POST">
 ID: <input type="text" name="id" value="<?php echo $id;?>">
  <br><br>
 Name: <input type="text" name="name" value="<?php echo $name;?>">
  <br><br>
 User Name: <input type="text" name="username" value="<?php echo $uname;?>">
  <br><br>
 Password: <input type="text" name="password" value="<?php echo $pass;?>">
  <br><br>
 Email: <input type="text" name="email" value="<?php echo $email;?>">
  <br><br>
     <button type="submit" name="update">Update</button>

</form>
</div>
</body>
<br><br>
    <a href="StudentHome.php">
        <button>Home</button>
      </a> 
</html>