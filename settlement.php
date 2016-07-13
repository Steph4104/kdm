<?php
ob_start();
session_start();
?>
<!doctype html>

<html lang="en">

<?php require_once 'head.php';?>


<body>
  <script src="js/scripts.js"></script>
    <h1>Kingdom Death Monsters</h1>
   <dd> <h3>the nightmare horror board game</h3></dd>
<?php
require_once 'database.php';
$con=mysqli_connect($db_host, $db_username, $db_password,$db_name);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


?>
    <form action="choose_survivor.php" method="get">
    Choisissez votre settlement
<?php
$sql="SELECT * FROM settlement";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
    
    echo "<select name='id'>";
  while ($row=mysqli_fetch_row($result))
    {
    echo '<option value="'.$row[0].'">'.$row[1].'</option>';
    }
      echo "</select>";
  mysqli_free_result($result);
}

mysqli_close($con);

 
    
    ?>
        <input type="submit" value="Submit">
         </form>
</body>
</html>