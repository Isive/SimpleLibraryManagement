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
   left: 10%;
   bottom: 0;
   width: 80%;
   background-color: rgba(20, 52, 157, 0.8);
   color: white;
   text-align: center;
}

div.main {overflow:auto;}

.myButton {
	box-shadow: 0px 0px 0px 2px #9fb4f2;
	background:linear-gradient(to bottom, #7892c2 5%, #476e9e 100%);
	background-color:#7892c2;
	border-radius:10px;
	border:1px solid #4e6096;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:19px;
	padding:12px 37px;
	text-decoration:none;
	text-shadow:0px 1px 0px #283966;
}
.myButton:hover {
	background:linear-gradient(to bottom, #476e9e 5%, #7892c2 100%);
	background-color:#476e9e;
}
.myButton:active {
	position:relative;
	top:1px;
}

.topnav {
  overflow: hidden;
  background-color: rgba(20, 52, 157, 0.8);
}




table.customTable td {
  border-width: 2px;
  border-color: #7EA8F8;
  border-style: solid;
  padding: 4%;
  font-size:3vh;
  color:white;
  background-color: rgba(20, 52, 157, 0.8);
  text-align:center;
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

.wtable td {
    padding:5%;
    font-size:3vh;
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
<div id="container" style="width:80%;margin:auto;background-color:white;min-height: 100vh;;border:solid rgba(20, 52, 157, 0.8) 2px;">

<div style="background-color: rgba(20, 52, 157, 0.8);color:white;width:100%;height:5vh; ">

<a href="logout.php" class="btn btn-info btn-lg" style="background-color:rgba(4,170,109,255);border:none; float:right">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>
        <?php
session_start();
if(isset($_SESSION["imie"]))
{
	echo "<h2 style='color:white;float:right;margin-right:3%;position:relative;bottom:1vh;'>Witaj ". $_SESSION["imie"]."!</h2>";
}
?>
</div>

<div class="ksiegarnia" style="padding:6%; font-size:500%;text-align:center;background-image:url('../books.jpg')">
  <p style=" background-color: rgba(20, 52, 157, 0.8);color:white;padding:2%;font-family:Luminari;border-radius:25px; ">Księgarnia Online BookLand</p>
</div>

<div class="topnav" id="myTopnav">
  <a href="admin.php" class="active">Strona główna</a>
  <a href="uzytkownicy.php">Użytkownicy</a>
  <a href="ksiazki.php">Książki</a>
  <a href="add_book.php">Dodaj książkę</a>
  <a href="add_user.php">Dodaj użytkownika</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div id="main">

<?php
$errors = array();
$id = "";
$data = date("Y-m-d");
$db = mysqli_connect('localhost', 'root', '', 'biblioteka');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['dodaj'])) {

    $tytul = $_POST['tytul'];
    $autor = $_POST['autor'];
    $rok = $_POST['rok'];
    if (empty($tytul)) { array_push($errors, "Title is required"); }
    if (empty($autor)) { array_push($errors, "Author is required"); }
    if (empty($rok)) { array_push($errors, "Year is required"); }

    if (count($errors) == 0) {

        $query = "INSERT INTO ksiazki (Tytul, Autor, Rok_wydania)
                  VALUES('$tytul','$autor', '$rok')";
        mysqli_query($db, $query);
        array_push($errors, "Książka została dodana");
    }

  }



mysqli_close($db);
?>


<form action="add_book.php" method="POST">
<table class="customTable" style="width: 60%;background-color: #FFFFFF;border-collapse: collapse; border-width: 2px;border-color: #7EA8F8;border-style: solid;color: #090D30;margin:auto;margin-top:3%;">
<tr><td colspan="2">Dodawanie książki</td></tr>
<tr><td style="width:40%;">Podaj tytuł książki:</td><td><input style="background-color: rgba(20, 52, 157, 0.8);width:80%;color: white;"min="0" type="text" name="tytul"required></td></tr>
<tr><td style="width:40%;">Autor:</td><td><input style="background-color: rgba(20, 52, 157, 0.8);width:80%;color: white;"min="0" type="text" name="autor"required></td></tr>
<tr><td style="width:40%;">Rok wydania:</td><td><input style="background-color: rgba(20, 52, 157, 0.8);width:80%;color: white;"min="0" type="text" name="rok"required></td></tr>
<tr><td colspan="2"><input type="submit" class="myButton" style="width:100%" value="Dodaj" name="dodaj"></td></tr>
<tr><td  colspan=2 style = "color:white;"><?php include('../errors.php'); ?></td></tr>
</table>

</form>


</div>

</div>
<footer class="footer">
		<p style = "text-align:center;">Copyright &copy;<span id="rok"></span> Eryk Świątoniowski | Filip Szczęch <!--<script>document.write(new Date().getFullYear())</script> --> </p>
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

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<script type="text/javascript">

	document.getElementById("rok").innerHTML = new Date().getFullYear();

	</script>



</body>
</html>
