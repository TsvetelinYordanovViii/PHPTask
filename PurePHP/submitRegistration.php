<?php
include "connection.php";

if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["phone"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];

    $password = ''.crypt($password, '$6$rounds=5000$anexamplestringforsalt$');

    $usernameCheckQuery = "SELECT * FROM users WHERE username = :checkedusername";
    $usernameCheck = $conn->prepare($usernameCheckQuery);
    $usernameCheck->bindParam(':checkedusername', $username);
    $usernameCheck->execute();

    $checkResult = $usernameCheck->fetchAll(PDO::FETCH_ASSOC);

    if (sizeof($checkResult)==0){
        $insertionQuery = "INSERT INTO users (username, email, user_password, phone) VALUES (:username, :email, :userpassword, :phone)";
        $insertion = $conn->prepare($insertionQuery);
        $insertion->bindParam(':username', $username);
        $insertion->bindParam(':email', $email);
        $insertion->bindParam(':userpassword', $password);
        $insertion->bindParam(':phone', $phone);

        $insertion->execute();

        echo "
        <div class='container d-flex justify-content-center align-items-center h-75'>
            <div class='card w-50'>
                <h2 class='text-center'>New user successfully registered. You can log in now, $username.</h2>
                <a class='text-center mb-1' href='../login.php'>Login</a>
            </div>
        </div>
        ";
    }
    else{
        echo "
        <div class='container d-flex justify-content-center align-items-center h-75'>
            <div class='card w-50'>
                <h2 class='text-center'>Username $username is already used.</h2>
                <a class='text-center mb-1' href='../login.php'>Login</a>
                <a class='text-center mb-1' href='../index.php'>Use a different username</a>
            </div>
        </div>
        ";
    }
}
else{
    echo "
    <div class='container  d-flex justify-content-center align-items-center h-75'>
        <div class='card w-50'>
            <h2 class='text-center'>Invalid user data.</h2>
            <a class='text-center mb-1' href='../login.php'>Login</a>
            <a class='text-center mb-1' href='../index.php'>Enter valid user information</a>
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