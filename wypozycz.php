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

div.main {overflow:auto;}

.footer {
   position: fixed;
   bottom: 0;
   left:10%;
   width: 80%;
   background-color: rgba(20, 52, 157, 0.8);
   color: white;
   text-align: center;

}

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

<div id="main">

<?php
$errors = array(); 
$id = "";
$data = date("Y-m-d");
$db = mysqli_connect('localhost', 'root', '', 'biblioteka');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['wypozycz'])) {

    $id = $_POST['id'];
    if (empty($id)) { array_push($errors, "ID is required"); }

    $select1 = mysqli_query($db, "SELECT id_k FROM ksiazki WHERE id_k = '".$_POST['id']."' ") or exit(mysqli_error($db));
    if(!mysqli_num_rows($select1)) {
        array_push($errors, "Brak książki o podanym ID!");
    }

    $select = mysqli_query($db, "SELECT id_ksiazki FROM wypozyczenia WHERE id_ksiazki = '".$_POST['id']."' AND id_uzytkownika = '".$_SESSION['id']."' ") or exit(mysqli_error($db));
    if(mysqli_num_rows($select)) {
        array_push($errors, "Książka została wcześniej wypożyczona!");
    }
  
  

  
    if (count($errors) == 0) {

        $query = "INSERT INTO wypozyczenia (id_uzytkownika,id_ksiazki, data_wypozyczenia) 
                  VALUES('$_SESSION[id]','$id', '$data')";
        mysqli_query($db, $query);
        array_push($errors, "Książka została wypożyczona");
    }
   
  }



mysqli_close($db);
?>


<form action="wypozycz.php" method="POST">
<table class="customTable" style="width: 40%;background-color: #FFFFFF;border-collapse: collapse; border-width: 2px;border-color: #7EA8F8;border-style: solid;color: #090D30;margin:auto;margin-top:3%;">
<tr><td colspan="2">Wypożyczanie książki</td></tr>
<tr><td style="width:60%;">Podaj ID książki:</td><td><input style="background-color: rgba(20, 52, 157, 0.8);width:80%;color: white;"min="0" type="number" name="id"required></td></tr>
<tr><td colspan="2"><input type="submit" class="myButton" style="width:100%" value="Wypożycz" name="wypozycz"></td></tr>
<tr><td  colspan=2 style = "color:white;"><?php include('errors.php'); ?></td></tr>
</table>

</form>


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
