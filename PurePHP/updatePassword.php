<?php
include "connection.php";
include "sessionCheck.php";
include "messages.php";
session_start();
checkSession("../login.php");

$message;


if (isset($_POST["old-password"]) && isset($_POST["new-password"])) {
    $oldPassword = filter_var($_POST["old-password"], FILTER_SANITIZE_STRING);
    $newPassword = filter_var($_POST["new-password"], FILTER_SANITIZE_STRING);
    //Password encryption is required, since the database only stores the encrypted password and we can only compare passwords with that.
    $oldPassword = ''.crypt($oldPassword, '$6$rounds=5000$anexamplestringforsalt$');
    $newPassword = ''.crypt($newPassword, '$6$rounds=5000$anexamplestringforsalt$');

    if ($oldPassword==$_SESSION["user_password"])
    updatePasswordField($_SESSION["user_password"], $newPassword, $_SESSION["id"], $conn);
    else{
        $message = "Incorrect password.";
        $links = "<a class='text-center mb-1' href='../userProperties.php'>User Information</a> <a class='text-center mb-1' href='logout.php'>Logout</a>";
        
        showMessage($message, $links);
    }
}
else{
    $message = "Invalid password data.";
    $links = "<a class='text-center mb-1' href='../userProperties.php'>User Information</a> <a class='text-center mb-1' href='logout.php'>Logout</a>";
    
    showMessage($message, $links);
}


function updatePasswordField ($oldPassword, $newPassword, $id, $conn){
    $message;
    $username = $_SESSION["username"];

        if ($oldPassword != $newPassword ){
            $updateQuery = "
            UPDATE users
            SET user_password = :value
            WHERE id = :id
            ";

            $update = $conn->prepare($updateQuery);
            $update->bindParam(':value', $newPassword);
            $update->bindParam(':id', $id);
            $update->execute();

            $_SESSION["user_password"] = $newPassword;

            $message = "Password successfully changed, $username.";
        }
        else{
            $message = "Old password matches new password, $username.";
        }

    $links = "<a class='text-center mb-1' href='../userProperties.php'>User Information</a> <a class='text-center mb-1' href=''>Logout</a>";
    
    showMessage($message, $links);
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