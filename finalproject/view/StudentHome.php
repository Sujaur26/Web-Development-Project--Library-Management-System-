<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../controller/style.css">
<style>
.error {color: #FF0000;}
</style>
  <title>Admin Page</title>
</head>
<body>

  <?php require_once '../controller/StudentAction.php';?>


  <?php
   if (isset($_SESSION['messege'])):
  ?>
  <?php
  echo $_SESSION['messege'];
  unset($_SESSION['messege']);
  ?>
<?php endif ?>

  <div class="container">

<h1>Welcome Student</h1>
<h2>Books</h2>

<?php 

  $mysqli = new mysqli('localhost', 'root', '', 'library users') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT id,name FROM books") or die($mysqli->error);

?>

<div class="row justify-content-center">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
      </tr>
    </thead>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td> <?php echo $row['id']; ?> </td>
        <td> <?php echo $row['name']; ?> </td>
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
<h2>Request a book</h2>

<form action="../controller/StudentAction.php" method="POST">
  <input type="hidden" name="id" value="<?php echo $id;?>">
  Book ID: <input type="text" name="id" value="<?php echo $id;?>">
  <br><br>
  Book Name: <input type="text" name="name" value="<?php echo $name;?>">
  <br><br>

     <button type="submit" name="submit">Submit</button>

</form>
</div>
<br><br>
<a href="MyProfile.php">
        <button>My Profile</button>
      </a> 

</body>
    <a href="../controller/Logout.php">
        <button>Logout</button>
      </a> 
</html>