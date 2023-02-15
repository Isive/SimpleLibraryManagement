<?php include('Reg_sec.php') ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet"/>
<style>

    
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background: rgb(119,164,171);
background: linear-gradient(90deg, rgba(119,164,171,1) 0%, rgba(187,211,217,1) 17%, rgba(201,238,252,1) 34%, rgba(204,226,236,1) 52%, rgba(87,167,184,1) 90%);
}

.footer {
   position: fixed;
   bottom: 0;
   left:10%;
   width: 80%;
   background-color: rgba(20, 52, 157, 0.8);
   color: white;
   text-align: center;

}

.signup-link:hover{
    background-color:white;
    cursor:pointer;
}



::selection{
  background: rgba(26,188,156,0.3);
}
.container{
  max-width: 440px;
  padding: 0 20px;
  margin: 170px auto;
}
.wrapper{
  width: 100%;
  background: #fff;
  border-radius: 5px;
  box-shadow: 0px 4px 10px 1px rgba(0,0,0,0.1);
}
.wrapper .title{
  height: 90px;
  background-color: rgba(20, 52, 157, 0.8); 
  border-radius: 5px 5px 0 0;
  color: #fff;
  font-size: 30px;
  font-weight: 600;
  display: flex;
  align-items: center;
  justify-content: center;
}
.wrapper form{
  padding: 30px 25px 25px 25px;
}
.wrapper form .row{
  height: 45px;
  margin-bottom: 15px;
  position: relative;
}
.wrapper form .row input{
  height: 100%;
  width: 100%;
  outline: none;
  padding-left: 60px;
  border-radius: 5px;
  border: 1px solid lightgrey;
  font-size: 16px;
  transition: all 0.3s ease;
}
form .row input:focus{
  box-shadow: inset 0px 0px 2px 2px rgba(26,188,156,0.25);
}
form .row input::placeholder{
  color: #999;
}
.wrapper form .row i{
  position: absolute;
  width: 47px;
  height: 100%;
  color: #fff;
  font-size: 18px;
  background-color: rgba(20, 52, 157, 0.8); 
  border-radius: 5px 0 0 5px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.wrapper form .pass{
  margin: -8px 0 20px 0;
}
.wrapper form .pass a{
  font-size: 17px;
  text-decoration: none;
}
.wrapper form .pass a:hover{
  text-decoration: underline;
}
.wrapper form .button input{
  color: #fff;
  font-size: 20px;
  font-weight: 500;
  padding-left: 0px;
  background-color: rgba(20, 52, 157, 0.8); 
  cursor: pointer;
}
form .button input:hover{
  background: #04aa6d;
}
.wrapper form .signup-link{
  text-align: center;
  margin-top: 20px;
  font-size: 17px;
}
.wrapper form .signup-link a{
  color: rgba(20, 52, 157);
  text-decoration: none;
}
form .signup-link a:hover{
  text-decoration: underline;
}

.topnav {
  overflow: hidden;
  background-color: rgba(20, 52, 157, 0.8);
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }

  


  .vertical-center {
  min-height: 100%;  
  min-height: 100vh; 
  display: flex;
  align-items: center;
}



}
</style>
</head>
<body>
<div id="container" style="width:80%;margin:auto;background-color:white;min-height: 100vh;border:solid rgba(20, 52, 157, 0.8) 2px;">

<header style="	background-color: rgba(20, 52, 157, 0.8);color:white;width:100%;height:5vh; ">

<a href="logout.php" class="btn btn-info btn-lg" style="background-color:rgba(4,170,109,255);border:none; float:right">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>
        <?php

if(isset($_SESSION["imie"]))
{
	echo "<h2 style='color:white;float:right;margin-right:3%;position:relative;bottom:1vh;'>Witaj ". $_SESSION["imie"]."!</h2>";
}
?>
</header>

<div class="ksiegarnia" style="padding:6%; font-size:500%;text-align:center;background-image:url('books.jpg')">
  <p style=" background-color: rgba(20, 52, 157, 0.8);color:white;padding:2%;font-family:Luminari;border-radius:25px; ">Księgarnia Online BookLand</p>  
</div>

<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">Strona główna</a>
  <a href="wypozyczone.php">Wypożyczone książki</a>
  <a href="lista.php">Lista książek</a>
  <a href="wypozycz.php">Wypożycz</a>
  <a href="zwroc.php">Zwróć</a>
  <a href="konto.php">Konto</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div id="main" style="width:40%;margin:auto;margin-top:3%;overflow: auto">

<?php
$errors = array(); 
$id = "";

$db = mysqli_connect('localhost', 'root', '', 'biblioteka');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['passchange'])) {

    $pass = mysqli_real_escape_string($db, $_POST['pass']);
    $npass = mysqli_real_escape_string($db, $_POST['npass']);
    $rnpass = mysqli_real_escape_string($db, $_POST['rnpass']);
   
    $pass = md5($pass);

    if ($_SESSION['haslo'] != $pass) {
        array_push($errors, "Błędne hasło!");
      }

      if ($npass != $rnpass) {
        array_push($errors, "Hasła się nie zgadzają!");
      }

   
      if (count($errors) == 0) {
        $npassword = md5($npass);
    $sql = "UPDATE uzytkownicy SET Haslo='$npassword' WHERE id='".$_SESSION['id']."' ";

    if (mysqli_query($db, $sql)) {
     $_SESSION['haslo']=$npassword;
     array_push($errors, "Hasło zostało zmienione");

    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }
    
}
}

mysqli_close($db);
?>

<div class="wrapper">
        <div class="title"><span>Zmiana hasła</span></div>
        <form action="pass_change.php" method="POST">

        <div class="row">
            <i class="bi bi-person"></i>
            <input type="password" name="pass" placeholder="Stare hasło" >
          </div>

          <div class="row">
            <i class="bi bi-person"></i>
            <input type="password" name="npass" placeholder="Nowe hasło" >
          </div>

          <div class="row">
            <i class="bi bi-person"></i>
            <input type="password" name="rnpass" placeholder="Powtórz nowe hasło" >
          </div>

         
          <?php include('errors.php'); ?>
        
          <div class="row button">
            <input type="submit" name="passchange" value="Zaktualizuj">
          </div>
    
        </form>
      </div>
</div>


</div>
<footer class="footer">
		<p style = "text-align:center;">Copyright &copy;<span id="rok"></span> Eryk Świątoniowski | Filip Szczęch  </p>
	</footer>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

<script type="text/javascript">
	
	document.getElementById("rok").innerHTML = new Date().getFullYear();
	
	</script>


</body>
</html>
