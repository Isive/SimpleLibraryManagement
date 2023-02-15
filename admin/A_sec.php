<?php
session_start();

$fName = "";
$lName = "";
$email    = "";
$errors = array(); 


$db = mysqli_connect('localhost', 'root', '', 'biblioteka');



if (isset($_POST['login_admin'])) {
  $login = mysqli_real_escape_string($db, $_POST['login']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($login)) {
  	array_push($errors, "Login jest wymagany");
  }
  if (empty($password)) {
  	array_push($errors, "Hasło jest wymagane");
  }

  if (count($errors) == 0) {
  	$query = "SELECT * FROM administracja WHERE login='$login' AND haslo='$password'";
  	$results = mysqli_query($db, $query);
    $user1 = mysqli_fetch_assoc($results);
  	if (mysqli_num_rows($results) == 1) {
      $_SESSION['ida'] = $user1['ida'];

  
  	  header('location: admin.php');
  	}else {
  		array_push($errors, "Nieprawidłowy email lub nieprawidłowe hasło");
  	}
  }
}
$db->close();
?>

