<?php
session_start();

$fName = "";
$lName = "";
$email    = "";
$errors = array(); 


$db = mysqli_connect('localhost', 'root', '', 'biblioteka');

if (isset($_POST['reg_user'])) {

  $fName = mysqli_real_escape_string($db, $_POST['fName']);
  $lName = mysqli_real_escape_string($db, $_POST['lName']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['pass']);
  $password_2 = mysqli_real_escape_string($db, $_POST['rpass']);

  if (empty($fName)) { array_push($errors, "First name is required"); }
  if (empty($lName)) { array_push($errors, "Last name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Hasła się nie zgadzają!");
  }

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
  	header('location: login.php');
  }
}

if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
  	array_push($errors, "Email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM uzytkownicy WHERE Email='$email' AND Haslo='$password'";
  	$results = mysqli_query($db, $query);
    $user1 = mysqli_fetch_assoc($results);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['email'] = $email;
      $_SESSION['imie'] = $user1['Imie'];
      $_SESSION['nazwisko'] = $user1['Nazwisko'];
      $_SESSION['id'] = $user1['id'];
      $_SESSION['haslo'] = $user1['Haslo'];
  
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Nieprawidłowy email lub nieprawidłowe hasło");
  	}
  }
}
$db->close();
?>

