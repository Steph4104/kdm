<?php
ob_start();



if ((empty($_GET['roll'])) || (empty($_GET['location']))){


    ?>
<form action='severe_injury.php' method='GET'>
    <label>Enter your roll</label>
   <input type="number" name="roll" id="roll" value=''>
    <label>Enter your location</label>
    <select id="location" name="location">
    <option>Head</option>
    <option>Arm</option>
    <option>Body</option>
    <option>Waist</option>
    <option>Leg</option>
    </select>
    <input type="submit" value="MAGIC">
</form>
    <?php }else{
    $number = $_GET['roll'];
    $location = $_GET['location'];
    require_once 'database.php';
$con=mysqli_connect($db_host, $db_username, $db_password,$db_name);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$name = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM severe_injury WHERE Location = '$location' AND Number = $number "));
    if (!$name){
     echo("Error description: " . mysqli_error($con));
    }
    
    header('Location: survivor.php?severe_injury='.$name["Name"]);
}?>
<!--</body>
</html>-->

