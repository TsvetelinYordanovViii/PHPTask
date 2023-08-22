<?php
include "connection.php";
include "messages.php";

$message;
$links;

if (isset($_POST["registration-username"]) && isset($_POST["registration-email"]) && isset($_POST["registration-password"]) && isset($_POST["registration-phone"])){
    //Creating variables that have the posted values for convenience.
    $username = $_POST["registration-username"];
    $email = $_POST["registration-email"];
    $password = $_POST["registration-password"];
    $phone = $_POST["registration-phone"];

    //Sanitizing the string.
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    $phone = filter_var($phone, FILTER_SANITIZE_STRING);

    $password = ''.crypt($password, '$6$rounds=5000$anexamplestringforsalt$');

    $emailCheckQuery = "SELECT * FROM users WHERE email = :checkedemail";
    $emailCheck = $conn->prepare($emailCheckQuery);
    $emailCheck->bindParam(':checkedemail', $email);
    $emailCheck->execute();

    $checkResult = $emailCheck->fetchAll(PDO::FETCH_ASSOC);

    if (sizeof($checkResult)==0){
        //Inserting successfully registered users into the database using prepared statements and binded paramenters.
        $insertionQuery = "INSERT INTO users (username, email, user_password, phone) VALUES (:username, :email, :userpassword, :phone)";
        $insertion = $conn->prepare($insertionQuery);
        $insertion->bindParam(':username', $username);
        $insertion->bindParam(':email', $email);
        $insertion->bindParam(':userpassword', $password);
        $insertion->bindParam(':phone', $phone);

        $insertion->execute();

        $message = "New user successfully registered. You can log in now, $username.";
        $links = "<a class='text-center mb-1' href='../login.php'>Login</a>";
    }
    else{
        $message = "An account with the email $email already exists.";
        $links = "<a class='text-center mb-1' href='../login.php'>Login</a> <a class='text-center mb-1' href='../index.php'>Use a different email</a>";
    }
}
else{
    $message = "Invalid user data.";
    $links = "<a class='text-center mb-1' href='../login.php'>Login</a> <a class='text-center mb-1' href='../index.php'>Register</a>";
}


showMessage($message, $links);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>