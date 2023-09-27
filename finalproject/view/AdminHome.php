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

  <?php require_once '../controller/AdminAction.php';?>


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
<h2>Student Section</h2>

<?php 

  $mysqli = new mysqli('localhost', 'root', '', 'library users') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT id,name FROM student") or die($mysqli->error);

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
          <a href="AdminHome.php?edit=<?php echo $row['id'];?>"
             class="btn btn-info">Edit</a> 
          <a href="../controller/AdminAction.php?delete=<?php echo $row['id'];?>"
             class="btn btn-danger">Delete</a>  
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

<form action="../controller/AdminAction.php" method="POST">
  <input type="hidden" name="id" value="<?php echo $id;?>">
  <input type="text" name="id" value="<?php echo $id;?>">
  <br><br>
  <input type="text" name="name" value="<?php echo $name;?>">
  <br><br>
  <?php 
  if($update==true):
    ?>
     <button type="submit" name="update">Update</button>
     <?php else: ?>
     <button type="submit" name="save">Save</button>
   <?php endif;?>

</form>
</div>
<br><br>
    <a href="Book.php">
        <button>Books</button>
      </a> 
</body>
    <a href="../controller/Logout.php">
        <button>Logout</button>
      </a> 
</html>