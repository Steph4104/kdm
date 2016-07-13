<?php
ob_start();
session_start();

require_once 'database.php';
$con=mysqli_connect($db_host, $db_username, $db_password,$db_name);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$arms = $_POST['arms'];
$body = $_POST['body'];
$name = $_POST["name"];
$surname = $_POST["surname"];
$sexe = $_POST["sexe"];
$born = $_POST["born"];
$bleed = $_POST["bleed"];
$survivol = $_POST["survivol"];
$survivor_id = $_SESSION['survivor_id'];

$sql = "UPDATE survivors,sexe,born,survivol,bleed,arms,body SET 
survivors.NAME_SURVIVORS='".$name."',
survivors.SURNAME_SURVIVORS='".$surname."',
sexe.SEXE='".$sexe."',
born.YEARS='".$born."',
survivol.SURVIVOL='".$survivol."',
bleed.BLEED='".$bleed."',
arms.ARMS=$arms, 
body.BODY=$body 
WHERE survivors.ID_SURVIVOR=$survivor_id
AND sexe.ID_SURVIVOR=$survivor_id
AND born.ID_SURVIVOR=$survivor_id
AND survivol.ID_SURVIVOR=$survivor_id
AND bleed.ID_SURVIVOR=$survivor_id
AND arms.ID_SURVIVOR=$survivor_id 
AND body.ID_SURVIVOR=$survivor_id ";

if ($con->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}

$con->close();

?>