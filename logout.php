<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["imie"]);
unset($_SESSION["email"]);
session_destroy();
header("Location:login.php");
?>