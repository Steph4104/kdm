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
</head>

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

if ((empty($_GET['username'])) || (empty($_GET['password']))){

?>
    <form id='login' action='login.php' method='get' accept-charset='UTF-8'>
Login<br>
<input type='hidden' name='submitted' id='submitted' value='1'/>
 
<label for='username' >UserName:</label>
<input type='text' name='username' id='username'  maxlength="50" />
 
<label for='password' >Password:</label>
<input type='password' name='password' id='password' maxlength="50" />
 
<input type='submit' name='Submit' value='Submit' />
 

</form>
    
<?php
}else{
    $username = $_GET['username'];
    $password = $_GET['password'];
    
$login = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM login WHERE username = '$username'"));

    if(!$login)
  {
  // Fetch one and one row
    
    echo "ERROR! T'as mal entré tes affaires!";
}else{
     header('Location: index.html');        
}

mysqli_close($con);

 
}
    ?>
        
</body>
</html>