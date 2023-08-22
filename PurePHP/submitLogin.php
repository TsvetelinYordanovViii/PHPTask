<?php
include "connection.php";

$message;
$links;

if (isset($_POST["login-email"]) && isset($_POST["login-password"])){
    $email = $_POST["login-email"];
    $password = $_POST["login-password"];

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

        $_SESSION["id"] = $userCheckResult[0]["id"];
        $_SESSION["username"] = $userCheckResult[0]["username"];
        $_SESSION["email"] = $userCheckResult[0]["email"];
        $_SESSION["phone"] = $userCheckResult[0]["phone"];
        $_SESSION["user_password"] = $userCheckResult[0]["user_password"];

        $username = $_SESSION["username"];

        $message = "Login successful, $username.";
        $links = "<a class='text-center mb-1' href='../userProperties.php'>User Information</a> <a class='text-center mb-1' href='PurePHP/logout.php'>Logout</a>";
    }
    else{
        $message = "Incorrect email or password.";
        $links = "<a class='text-center mb-1' href='../login.php'>Login</a> <a class='text-center mb-1' href='../index.php'>Use a different username</a>";
    }
}
else{
    $message = "Invalid data.";
    $links = "<a class='text-center mb-1' href='../login.php'>Login</a> <a class='text-center mb-1' href='../index.php'>Use a different username</a>";
}


echo "
<div class='container  d-flex justify-content-center align-items-center h-75'>
    <div class='card w-50'>
        <h2 class='text-center'>$message</h2>
        $links
    </div>
</div>
";

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