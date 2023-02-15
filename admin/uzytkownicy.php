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

.topnav {
  overflow: hidden;
  background-color: rgba(20, 52, 157, 0.8);
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




table.customTable td {
  border-width: 2px;
  border-color: #7EA8F8;
  border-style: solid;
  padding: 5px;
  text-align:center;
}

table.customTable th {
  border-width: 2px;
  text-align:center;
  border-color: #7EA8F8;
  border-style: solid;
  padding: 5px;
  background-color: rgba(20, 52, 157, 0.8);
  color:white;
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

.myButton {
  background-color: rgba(20, 52, 157, 0.8);
  color: #FFFFFF;
  border-radius: 7px 7px 7px 7px;
}


</style>
</head>
<body>
<div id="container" style="width:80%;margin:auto;background-color:white;height: 100vh;;border:solid rgba(20, 52, 157, 0.8) 2px;">

<header style="	background-color: rgba(20, 52, 157, 0.8);color:white;width:100%;height:5vh; ">

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
</header>

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
$conn = mysqli_connect('localhost', 'root', '', 'biblioteka');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT Email, id, Imie, Nazwisko FROM uzytkownicy";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<table class='customTable' style= 'width: 100%;background-color: #FFFFFF;border-collapse: collapse; border-width: 2px;border-color: #7EA8F8;border-style: solid;color: #090D30;width:80%;margin:auto;margin-top:3%;'>";
    echo "<th>ID</th><th>Email</th><th>Imie</th><th>Nazwisko</th>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr> <td>" . $row["id"]. "</td><td> " . $row["Email"]. " </td><td> " . $row["Imie"]. "</td><td>  " . $row["Nazwisko"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

if (isset($_POST['usun'])) {

    $id = $_POST['id_u'];
    if (empty($id)) { array_push($errors, "ID is required"); }


    $select = mysqli_query($conn, "SELECT id FROM uzytkownicy WHERE id = '".$_POST['id_u']."' ") or exit(mysqli_error($conn));
    if(!mysqli_num_rows($select)) {
        array_push($errors, "Brak użytkownika o podanym ID!");
    }



    if (count($errors) == 0) {

        $query = "DELETE FROM uzytkownicy WHERE id = ".$_POST['id_u']." ";
        mysqli_query($conn, $query);
        array_push($errors, "Użytkownik został usunięty");
        header('location: uzytkownicy.php');
    }

  }

mysqli_close($conn);
?>

</div>

<form action="uzytkownicy.php" method="POST">
<table class="customTable" style="width: 30%;background-color: #FFFFFF;border-collapse: collapse; border-width: 2px;border-color: #7EA8F8;border-style: solid;color: #090D30;margin:auto;margin-top:3%;">
<tr><td colspan="2">Usuwanie użytkownika</td></tr>
<tr><td style="width:60%;">Podaj ID użytkownika:</td><td><input style="background-color: rgba(20, 52, 157, 0.8);width:40%;color: white;"min="0" type="number" name="id_u"></td></tr>
<tr><td colspan="2"><input type="submit" class="myButton" style="width:40%" value="Usuń" name = "usun"></td></tr>
<tr><td  colspan=2 style = "color:white;"><?php include('../errors.php'); ?></td></tr>
</table>
</form>

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
