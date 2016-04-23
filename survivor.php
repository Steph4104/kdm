<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>KDM</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="css/styles.css?v=1.0">

  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="js/calcul.js"></script>
    <script>
$(function() {
    $('#no_survivols').click(function() {
        var cb1 = $('#no_survivols').is(':checked');
        $('#survivol').prop('disabled', cb1);
          
    });
});
        
    </script>
</head>
<body>
  <script src="js/scripts.js"></script>   
    
	
<?php
$con=mysqli_connect("localhost","root","","kdm");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$survivor_id = $_GET['id'];
echo '<form action="action_page.php">';
//Name

$name = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM survivors WHERE ID_SURVIVOR = $survivor_id"));
//echo 'Name: ' . $name['NAME_SURVIVORS'].'<br>';
echo'Name:
<input type="text" name="name" value= '.$name["NAME_SURVIVORS"].'>';
//Surname
$surname = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM survivors WHERE ID_SURVIVOR = $survivor_id"));
echo'Surname:
<input type="text" name="surname" value= '.$name["SURNAME_SURVIVORS"].'><br>';
//echo 'Surname: ' . $surname['SURNAME_SURVIVORS'].'<br>';
//Sexe
$sexe = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM sexe WHERE ID_SURVIVOR = $survivor_id"));
//echo 'Sexe: ' . $sexe['SEXE'].'<br>';
?>
Sexe:
<select>
    <option value="F" <?php if($sexe['SEXE'] =='F'){echo'selected=selected';}  ?> >Female</option>
  <option value="H"<?php if($sexe['SEXE'] =='H'){echo'selected=selected';}  ?> >Man</option>
</select>

<?php
//Born
$born = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM born WHERE ID_SURVIVOR = $survivor_id"));
//echo 'Sexe: ' . $sexe['SEXE'].'<br>';
echo'Born:
<input type="number" name="born" value= '.$born['YEARS'].'><br>';
//Survival
$survivol = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM survivol WHERE ID_SURVIVOR = $survivor_id"));
//echo 'Survivol: ' . $survivol['SURVIVOL'].'<br>';
echo'Survivol:
<input type="number" name="survivol" id="survivol" value= '.$survivol['SURVIVOL'].'>';

//Bleed
$bleed = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM bleed WHERE ID_SURVIVOR = $survivor_id"));
//echo 'Bleed: ' . $bleed['BLEED'].'<br>';
echo'Bleed:
<input type="number" name="bleed" value= '. $bleed['BLEED'].'><br>';
echo'<input type="checkbox" name="cannot_survivols" id="no_survivols" value="no_survivol">Cannot spend survivol<br>';
//Primary stat
$primary_stat = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM primary_stat WHERE ID_SURVIVOR = $survivor_id"));
//echo 'Movement: ' . $primary_stat['MOVEMENT'].'<br>';

echo'Movement:
<input type="number" name="movement" id="movement" readonly="readonly" value= "5"><br>
Gear:<input type="number" name="gear_movement" id="gear_movement" value= "">
Survivor:<input type="number" name="survivor_movement" id="survivor_movement" value= '. $primary_stat['MOVEMENT'].'>
Special:<input type="number" name="special_movement" id="special_movement" value= ""><br><br>';

//echo 'Accuracy: ' . $primary_stat['ACCURACY'].'<br>';

echo'Accuracy:
<input type="number" name="accuracy" id="accuracy" readonly="readonly" value= ""><br>
Gear:<input type="number" name="gear_accuracy" id="gear_accuracy" value= "">
Survivor:<input type="number" name="survivor_accuracy" id="survivor_accuracy" value= '. $primary_stat['ACCURACY'].'>
Special:<input type="number" name="special_accuracy" id="special_accuracy" value= ""><br><br>';

//echo 'Strenght: ' . $primary_stat['STRENGHT'].'<br>';

echo'Strenght:
<input type="number" name="strenght" id="strenght" readonly="readonly" value= ""><br>
Gear:<input type="number" name="gear_strenght" id="gear_strenght" value= "">
Survivor:<input type="number" name="survivor_strenght" id="survivor_strenght" value= '. $primary_stat['STRENGHT'].'>
Special:<input type="number" name="specialstrenght" id="special_strenght" value= ""><br><br>';
//echo 'Evasion: ' . $primary_stat['EVASION'].'<br>';

echo'Evasion:
<input type="number" name="evasion" id="evasion" readonly="readonly" value= ""><br>
Gear:<input type="number" name="gear_evasion" id="gear_evasion" value= "">
Survivor:<input type="number" name="survivor_evasion" id="survivor_evasion" value= '. $primary_stat['EVASION'].'>
Special:<input type="number" name="special_evasion" id="special_evasion" value= ""><br><br>';
//echo 'Luck: ' . $primary_stat['LUCK'].'<br>';

echo'Luck:
<input type="number" name="luck" id="luck" readonly="readonly" value= ""><br>
Gear:<input type="number" name="gear_luck" id="gear_luck" value= "">
Survivor:<input type="number" name="survivor_luck" id="survivor_luck" value= '. $primary_stat['LUCK'].'>
Special:<input type="number" name="special_luck" id="special_luck" value= ""><br><br>
<input type="button" value=" Calculer " onclick="calcul();" /><br>';
//echo 'Speed: ' . $primary_stat['SPEED'].'<br>';

//Brain
$brain = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM brain WHERE ID_SURVIVOR = $survivor_id"));
echo 'Brain: ' . $brain['BRAIN'].'';
if ($brain['CASE'] == 1){
$checked = "checked = 'checked'";
}
else
{
$checked = "";
}
//echo 'Checkbox: ' . $brain['CASE'].
echo '<input type="checkbox" name="foo" value="1" '.$checked.' /><br>';
//Hit location
$hit_location = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM hit_location WHERE ID_SURVIVOR = $survivor_id"));
echo 'Head: ' . $hit_location['HEAD'].'<br>';
echo 'Arms: ' . $hit_location['ARMS'].'<br>';
echo 'Body: ' . $hit_location['BODY'].'<br>';
echo 'Waist: ' . $hit_location['WAIST'].'<br>';
echo 'Legs: ' . $hit_location['LEGS'].'<br>';

//Hunt XP
$hunt_xp = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM hunt_xp WHERE ID_SURVIVOR = $survivor_id"));
echo 'Hunt XP: ' . $hunt_xp['XP'].'<br>';
//Weapon
$weapon = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM weapon WHERE ID_SURVIVOR = $survivor_id"));
if (empty($weapon['WEAPON_NAME'])){
  $test =mysqli_query($con, " SELECT survivors.NAME_SURVIVORS, settlement.NAME_SETTELMENT,settlement.EXPENTION FROM survivors INNER JOIN settlement ON survivors.SETTLEMENT_ID = settlement.ID_SETTELMENT WHERE ID_SURVIVOR = $survivor_id");
while ($row=mysqli_fetch_assoc($test))
    {
    
   // echo 'extention: '. $row['NAME_SURVIVORS'].' and survivor: '. $row['EXPENTION'].'<br>';
      $expention = $row['EXPENTION'];
   // printf ("%s (%s)\n",$row[0],$row[1]);
    }
$sql="SELECT * FROM weapon WHERE W_EXPENTION = $expention";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
    
    echo "<select name='id'>";
  while ($row=mysqli_fetch_row($result))
    {
    echo '<option value="'.$row[1].'">'.$row[0].'</option>';
   // printf ("%s (%s)\n",$row[0],$row[1]);
    }
      echo "</select><br>";

}

}else{
    echo 'Name: ' . $weapon['WEAPON_NAME'].'<br>';
}

//Weapon proficiency
$w_proficiency = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM W_PROFICIENCY WHERE ID_SURVIVOR = $survivor_id"));
echo 'Weapon proficiency: ' . $w_proficiency['PROFICIENCY'].'<br>';

//Disorder
$disorder = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM disorder WHERE ID_SURVIVOR = $survivor_id"));
if ($disorder){
echo 'Disorder: ' . $disorder['DISORDER_NAME'].'<br>';
}else{
$sql="SELECT * FROM disorder WHERE EXPENTION = $expention";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
    
    echo "<select name='id'>";
  while ($row=mysqli_fetch_row($result))
    {
    echo '<option value="'.$row[1].'">'.$row[0].'</option>';
   // printf ("%s (%s)\n",$row[0],$row[1]);
    }
      echo "</select><br>";

}

}

//Understanding
$understanding = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM understanding WHERE ID_SURVIVOR = $survivor_id"));
echo 'Understanding: ' . $understanding['Understanding'].'<br>';

//Courage
$courage = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM courage WHERE ID_SURVIVOR = $survivor_id"));
echo 'Courage: ' . $courage['COURAGE'].'<br>';

//Fighting art
$fighting_art = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM figthing_art WHERE ID_SURVIVOR = $survivor_id"));
if ($fighting_art){
echo 'Figthing art: ' . $fighting_art['NAME_FIGTHING'].'<br>';
}else{
$sql="SELECT * FROM figthing_art WHERE EXPENTION = $expention";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
    
    echo "<select name='id'>";
  while ($row=mysqli_fetch_row($result))
    {
    echo '<option value="'.$row[0].'">'.$row[1].'</option>';
   // printf ("%s (%s)\n",$row[0],$row[1]);
    }
      echo "</select><br>";

}

}


echo' <input type="submit" value="Submit">';
echo '</form>';
//Hunt XP
//$test =mysqli_query($con, " SELECT survivors.NAME_SURVIVORS,weapon.W_EXPENTION,weapon.WEAPON_NAME,survivors.ID_SURVIVOR, settlement.EXPENTION FROM survivors INNER JOIN settlement ON survivors.SETTLEMENT_ID = settlement.ID_SETTELMENT INNER JOIN weapon ON survivors.ID_SURVIVOR = weapon.ID_SURVIVOR");
//$test =mysqli_query($con, " SELECT survivors.NAME_SURVIVORS, settlement.NAME_SETTELMENT,settlement.EXPENTION FROM survivors INNER JOIN settlement ON survivors.SETTLEMENT_ID = settlement.ID_SETTELMENT WHERE ID_SURVIVOR = $survivor_id");
//$test =mysqli_query($con, " SELECT survivors.NAME_SURVIVORS, weapon.WEAPON_NAME, weapon.EXPENTION FROM survivors INNER JOIN weapon ON survivors.ID_SURVIVOR = weapon.ID_SURVIVOR ");                    
//$test = mysqli_query($con,"SELECT * FROM weapon");
//echo 'Hunt XP: ' . $test['ID_SURVIVOR'].'<br>';
//print_r($test);
/*SELECT   A.nom_artiste, A.prenom_artiste, I.nom_instrument 
FROM     jouer J
LEFT JOIN artiste A ON J.ex_artiste=A.id_artiste
LEFT JOIN instrument I ON J.ex_instrument = I.id_instrument
WHERE    ex_concert = 1
ORDER BY I.nom_artiste ;*/
/*
  while ($row=mysqli_fetch_assoc($test))
    {
    
    echo 'extention: '. $row['NAME_SURVIVORS'].' and survivor: '. $row['EXPENTION'].'<br>';
      $expention = $row['EXPENTION'];
   // printf ("%s (%s)\n",$row[0],$row[1]);
    }
    echo $expention;*/
/*
$sql="SELECT * FROM weapon WHERE W_EXPENTION = 1";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
    
    echo "<select name='id'>";
  while ($row=mysqli_fetch_row($result))
    {
    echo '<option value="'.$row[1].'">'.$row[0].'</option>';
   // printf ("%s (%s)\n",$row[0],$row[1]);
    }
      echo "</select>";

}
*/



/*





$sql = (mysqli_query($con,"SELECT * FROM weapon"));

print_r($sql);
echo $sql;
 */


 
    
    ?>
        
     
</body>
</html>