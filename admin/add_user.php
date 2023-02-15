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

.topnav {
  overflow: hidden;
  background-color: rgba(20, 52, 157, 0.8);
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

.container{
  max-width: 440px;
  padding: 0 20px;
  margin: 170px auto;
  margin-top: 35px;
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
  background: #20aa27;
}

</style>
</head>
<body>
<div id="container" style="width:80%;margin:auto;background-color:white;height: 100vh;;border:solid rgba(20, 52, 157, 0.8) 2px;">

<header style="	background-color: rgba(20, 52, 157, 0.8);color:white;width:100%;height:5vh; ">

<a href="logout.php" class="btn btn-info btn-lg" style="background-color:rgba(4,170,109,255);border:none; float:right">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>

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

<?php



$fName = "";
$lName = "";
$email    = "";
$errors = array(); 


$db = mysqli_connect('localhost', 'root', '', 'biblioteka');

if (isset($_POST['add_user'])) {

  $fName = mysqli_real_escape_string($db, $_POST['fName']);
  $lName = mysqli_real_escape_string($db, $_POST['lName']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['pass']);


  if (empty($fName)) { array_push($errors, "Imie jest wymagane"); }
  if (empty($lName)) { array_push($errors, "Nazwisko jest wymagane"); }
  if (empty($email)) { array_push($errors, "Email jest wymagany"); }
  if (empty($password_1)) { array_push($errors, "Hasło jest wymagane"); }


  $user_check_query = "SELECT * FROM uzytkownicy WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
 
    $select = mysqli_query($db, "SELECT `email` FROM `uzytkownicy` WHERE `email` = '".$_POST['email']."'") or exit(mysqli_error($db));
    if(mysqli_num_rows($select)) {
        array_push($errors, "Email jest zajęty");
    }
  


  if (count($errors) == 0) {
  	$password = md5($password_1);

  	$query = "INSERT INTO uzytkownicy (Imie,Nazwisko, Email, Haslo) 
  			  VALUES('$fName','$lName', '$email', '$password')";
  	mysqli_query($db, $query);
    array_push($errors, "Dodano użytkownika");
  }
}

$db->close();
?>



<div class="container">
  <div class="wrapper">
    <div class="title"><span>Dodaj użytkownika</span></div>
    <form action="add_user.php" method="POST">

        <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="fName" placeholder="Imię" required>
          </div>

          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="lName" placeholder="Nazwisko" required>
          </div>

      <div class="row">
        <i class="fas fa-user"></i>
        <input type="email" name="email" placeholder="Email" required>
      </div>

      <div class="row">
        <i class="fas fa-lock"></i>
        <input type="password" name=pass placeholder="Hasło" required>
      </div>

   
      <?php include('../errors.php'); ?>
      <div class="row button">
        <input type="submit" name="add_user" value="Dodaj użytkownika">
      </div>
    </form>
  </div>
</div>

</div>
<footer class="footer" >
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

<script type="text/javascript">

	document.getElementById("rok").innerHTML = new Date().getFullYear();

	</script>


</body>
</html>
