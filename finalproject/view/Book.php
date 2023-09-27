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

  <?php require_once '../controller/BookAction.php';?>


  <?php
   if (isset($_SESSION['messege'])):
  ?>
  <?php
  echo $_SESSION['messege'];
  unset($_SESSION['messege']);
  ?>
<?php endif ?>

  <div class="container">

     <h1>Welcome Admin</h1>
     <h2>Book Section</h2>

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
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td> <?php echo $row['id']; ?> </td>
        <td> <?php echo $row['name']; ?> </td>
        <td> 
          <a href="Book.php?edit=<?php echo $row['id'];?>"
             class="btn btn-info">Edit</a> 
          <a href="../controller/BookAction.php?remove=<?php echo $row['id'];?>"
             class="btn btn-danger">remove</a>  
        </td>
      </tr>
    <?php endwhile; ?>
  </table>
</div>
<form action="../controller/BookAction.php" method="POST">
  <input type="text" name="id" value="<?php echo $id;?>">
  <br><br>
  <input type="text" name="name" value="<?php echo $name;?>">
  <br><br>
<?php 
  if($Update==true):
    ?>
     <button type="submit" name="Update">Update</button>
     <?php else: ?>
     <button type="submit" name="add">Save</button>
   <?php endif;?>
</form>
<br><br>
    <a href="AdminHome.php">
        <button>Students</button>
      </a> 
</body>
    <a href="../controller/Logout.php">
        <button>Logout</button>
      </a> 
</html>