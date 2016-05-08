<?php
ob_start();
session_start();
?>
<!doctype html>

<html lang="en">
    <?php require_once 'head.php';?>

<body>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="js/calcul.js"></script> <!--calcul primary stat-->
     <script src="js/validation.js"></script><!--validation hit location-->
    <script>

$(function() {
    $('#no_survivols').click(function() {
        var cb1 = $('#no_survivols').is(':checked');
        $('#survivol').prop('disabled', cb1);
          
    });

 });



function showUser(str,str2) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
             
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
       
        xmlhttp.open("GET","severe_injury.php?q="+str+"&q2="+str2,true);
        xmlhttp.send();
    }
}

    </script>
  <script src="js/bootstrap.js"></script>   
    <style>
    input, button, select, textarea {
    color: black;
}
    </style>
	
<?php
require_once 'database.php';
$con=mysqli_connect($db_host, $db_username, $db_password,$db_name);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
if (empty($_SESSION['survivor_id'])){
$_SESSION['survivor_id'] = $_GET['id'];
}
$survivor_id = $_SESSION['survivor_id'];

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
//echo'' . $brain['BRAIN'].'';
echo 'Brain: ';
echo'<input type="number" name="luck" id="luck" value= "'. $brain['BRAIN'].'">';
if ($brain['CASE'] == 1){
$checked = "checked = 'checked'";
}
else
{
$checked = "";
}
//echo 'Checkbox: ' . $brain['CASE'].
echo '<input type="checkbox" name="foo" value="1" '.$checked.' /><br>';
//Hit location: Head
$head = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM head WHERE ID_SURVIVOR = $survivor_id"));
if ($head['CHECKBOX'] == 1){$checkedhead = "checked = 'checked'";}
else{$checkedhead = "";}
echo 'Head: ';
echo'<input type="number" name="head" id="head" value= "'. $head['HEAD'].'"><input type="checkbox" name="foo" value="1" onclick="alertbox(this);"  '.$checkedhead.' /><br>';

//Hit location: arms
$arms = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM arms WHERE ID_SURVIVOR = $survivor_id"));
if ($arms['CHECKBOX1'] == 1){$checkedarms1 = "checked = 'checked'";}
else{$checkedarms1 = "";}

if ($arms['CHECKBOX2'] == 1){$checkedarms2 = "checked = 'checked'";}
else{$checkedarms2 = "";}

echo 'Arms: ';
echo'<input type="number" name="arms" id="arms" value= "'. $arms['ARMS'].'"><input type="checkbox" id="armchek1" name="foo" value="1" onclick="alertbox(this)" '.$checkedarms1.' /><input type="checkbox" name="foo" id="armchek2" value="1" onclick="alertbox2(this)" '.$checkedarms2.' /><br>';

//Hit location: body
$body = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM body WHERE ID_SURVIVOR = $survivor_id"));
if ($body['CHECKBOX1'] == 1){$checkedbody1 = "checked = 'checked'";}
else{$checkedbody1 = "";}
if ($body['CHECKBOX2'] == 1){$checkedbody2 = "checked = 'checked'";}
else{$checkedbody2 = "";}
echo 'Body: ';
echo'<input type="number" name="body" id="body" value= "'. $body['BODY'].'"><input type="checkbox" name="foo" value="1" id="bodychek1" onclick="alertbox(this)"'.$checkedbody1.' /><input type="checkbox" name="foo" value="1" id="bodychek2" onclick="alertbox2(this)" '.$checkedbody2.' /><br>';

//Hit location: waist
$waist = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM waist WHERE ID_SURVIVOR = $survivor_id"));
if ($waist['CHECKBOX1'] == 1){
$checkedwaist1 = "checked = 'checked'";
}
else
{
$checkedwaist1 = "";
}
if ($waist['CHECKBOX2'] == 1){
$checkedwaist2 = "checked = 'checked'";
}
else
{
$checkedwaist2 = "";
}
echo 'Waist: ';
echo'<input type="number" name="waist" id="waist" value= "'. $waist['WAIST'].'"><input type="checkbox" name="foo" id="waistchek1" value="1" onclick="alertbox(this)"'.$checkedwaist1.' /><input type="checkbox" name="foo" id="waistchek2" value="1" onclick="alertbox2(this)" '.$checkedwaist2.' /><br>';

//Hit location: legs
$legs = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM legs WHERE ID_SURVIVOR = $survivor_id"));
if ($legs['CHECKBOX1'] == 1){
$checkedlegs1 = "checked = 'checked'";
}
else
{
$checkedlegs1 = "";
}
if ($legs['CHECKBOX2'] == 1){
$checkedlegs2 = "checked = 'checked'";
}
else
{
$checkedlegs2 = "";
}
echo 'Legs: ';
echo'<input type="number" name="legs" id="legs" value= "'. $legs['LEGS'].'"><input type="checkbox" name="foo" value="1" id="legschek1" onclick="alertbox(this)"'.$checkedlegs1.' /><input type="checkbox" name="foo" value="1" id="legschek2" onclick="alertbox2(this)" '.$checkedlegs2.' /><br>';

//Hunt XP
$hunt_xp = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM hunt_xp WHERE ID_SURVIVOR = $survivor_id"));
//echo 'Hunt XP: ' . $hunt_xp['XP'].'<br>';
echo'Hunt XP: <input type="number" name="hunt" id="legs" value= "'. $hunt_xp['XP'].'"><br>';
//Weapon
echo'Weapon name: ';
$weapon = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM weapon WHERE ID_SURVIVOR = $survivor_id"));

$test =mysqli_query($con, " SELECT survivors.NAME_SURVIVORS, settlement.NAME_SETTELMENT,settlement.EXPENTION FROM survivors INNER JOIN settlement ON survivors.SETTLEMENT_ID = settlement.ID_SETTELMENT WHERE ID_SURVIVOR = $survivor_id");
while ($row=mysqli_fetch_assoc($test))
    {
     $expention = $row['EXPENTION'];
    }

if (empty($weapon['WEAPON_NAME'])){
 
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
$w_proficiency = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM w_proficiency WHERE ID_SURVIVOR = $survivor_id"));
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
    ?>

<!-- Modal severe injury -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
          <form > 
         <input type="number" name="roll" id="roll" value='' >
<select name="location" id="location" >
 <option value="Head">Head</option>
    <option value="Arm">Arm</option>
    <option value="Body">Body</option>
    <option value="Waist">Waist</option>
    <option value="Leg">Leg</option>
  </select>
          <input value="MAGIC" onclick="showUser(document.getElementById('location').value, document.getElementById('roll').value)"; >
</form>
<br>
<div id="txtHint"><b>Person info will be listed here...</b></div>
<!--
    <label>Enter your roll</label>
   <input type="number" name="roll" id="roll" value=''>
    <label>Enter your location</label>
    <select name="location" onchange="showUser(this.value)">
    <option value="Head">Head</option>
    <option value="Arm">Arm</option>
    <option value="Body">Body</option>
    <option value="Waist">Waist</option>
    <option value="Leg">Leg</option>
    </select>
    <input type="submit" value="MAGIC" >
    -->

          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      




   
</body>
</html>