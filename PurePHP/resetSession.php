<?php
include "connection.php";
session_start();

$_SESSION["reset-email"] = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
header("Location: ../resetPasswordNew.php");

?>