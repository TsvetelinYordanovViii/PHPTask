<?php
include "connection.php";
include "messages.php";

$message;
$links;

if (isset($_POST["login-email"]) && isset($_POST["login-password"])){
    $email = $_POST["login-email"];
    $password = $_POST["login-password"];

    //Sanitizing the string.
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    //Encrypting the password.
    $password = ''.crypt($password, '$6$rounds=5000$anexamplestringforsalt$');

    $userCheckQuery = "
    SELECT * FROM users
    WHERE email = :email AND user_password = :user_password
    LIMIT 1
    ";

    $userCheck = $conn->prepare($userCheckQuery);
    $userCheck->bindParam(':email', $email);
    $userCheck->bindParam(':user_password', $password);
    $userCheck->execute();

    $userCheckResult = $userCheck->fetchAll(PDO::FETCH_ASSOC);

    if (sizeof($userCheckResult)==1){
        session_start();

        //Start a session containing the user's data.
        $_SESSION["id"] = $userCheckResult[0]["id"];
        $_SESSION["username"] = $userCheckResult[0]["username"];
        $_SESSION["email"] = $userCheckResult[0]["email"];
        $_SESSION["phone"] = $userCheckResult[0]["phone"];
        $_SESSION["user_password"] = $userCheckResult[0]["user_password"];

        $username = $_SESSION["username"];

        //Message and link variables are used to only write the messages and links without the needing of copying the container's code.
        $message = "Login successful, $username.";
        $links = "<a class='text-center mb-1' href='../userProperties.php'>User Information</a> <a class='text-center mb-1' href='logout.php'>Logout</a>";
    }
    else{
        $message = "Incorrect email or password.";
        $links = "<a class='text-center mb-1' href='../login.php'>Login</a> <a class='text-center mb-1' href='../index.php'>Register</a>";
    }
}
else{
    $message = "Invalid data.";
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