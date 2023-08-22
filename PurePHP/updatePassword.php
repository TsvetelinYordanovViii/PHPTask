<?php
include "connection.php";
session_start();
$message;


if (isset($_POST["old-password"]) && isset($_POST["new-password"])) {
    $oldPassword = ''.crypt($_POST["old-password"], '$6$rounds=5000$anexamplestringforsalt$');
    $newPassword = ''.crypt($_POST["new-password"], '$6$rounds=5000$anexamplestringforsalt$');

    if ($oldPassword==$_SESSION["user_password"])
    updatePasswordField($_SESSION["user_password"], $newPassword, $_SESSION["id"], $conn);
    else{
        $message = "Incorrect password.";
        $links = "<a class='text-center mb-1' href='../userProperties.php'>User Information</a> <a class='text-center mb-1' href=''>Logout</a>";
        echo "
            <div class='container  d-flex justify-content-center align-items-center h-75'>
                <div class='card w-50'>
                    <h2 class='text-center'>$message</h2>
                    $links
                </div>
            </div>
            ";
    }
}
else{
    $message = "Invalid password data.";
    $links = "<a class='text-center mb-1' href='../userProperties.php'>User Information</a> <a class='text-center mb-1' href=''>Logout</a>";
    echo "
        <div class='container  d-flex justify-content-center align-items-center h-75'>
            <div class='card w-50'>
                <h2 class='text-center'>$message</h2>
                $links
            </div>
        </div>
        ";
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