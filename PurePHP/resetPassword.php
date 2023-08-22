<?php
include "connection.php";
include "resetSessionCheck.php";
session_start();
checkResetSession("../login.php");

$message;

if (isset($_POST["reset-code"]) && isset($_POST["reset-password"])) {
    $password = filter_var($_POST["reset-password"], FILTER_SANITIZE_STRING);
    $password = ''.crypt($password, '$6$rounds=5000$anexamplestringforsalt$');

    resetPasswordField($password , $_SESSION["reset-email"], $conn);
}
else{
    $message = "Invalid reset data.";
    $links = "<a class='text-center mb-1' href='../login.php'>Login</a> <a class='text-center mb-1' href='../index.php'>Register</a>";
    echo "
        <div class='container  d-flex justify-content-center align-items-center h-75'>
            <div class='card w-50'>
                <h2 class='text-center'>$message</h2>
                $links
            </div>
        </div>
        ";
}
session_destroy();


function resetPasswordField($newPassword, $email, $conn){
    $updateQuery = "
    UPDATE users
    SET user_password = :value
    WHERE email = :email
    ";

    $update = $conn->prepare($updateQuery);
    $update->bindParam(':value', $newPassword);
    $update->bindParam(':email', $email);
    $update->execute();

    $message = "Password successfully changed.";
    $links = "<a class='text-center mb-1' href='../login.php'>Login</a>";
    echo "
    <div class='container  d-flex justify-content-center align-items-center h-75'>
        <div class='card w-50'>
            <h2 class='text-center'>$message</h2>
            $links
        </div>
    </div>
    ";
    }
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