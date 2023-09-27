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
	<h2>Requested Books</h2>

<?php 

  $mysqli = new mysqli('localhost', 'root', '', 'library users') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT id,name FROM reservedbooks") or die($mysqli->error);

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
 <?php

$mysqli = new mysqli('localhost', 'root', '', 'library users') or die(mysqli_error($mysqli));

$id=0;
$name='';

if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$mysqli->query("SELECT * FROM student WHERE id=$id") or die($mysqli->error());
	header("location: ../view/LibrarianHome.php");
}


 ?>

</body>
</html>