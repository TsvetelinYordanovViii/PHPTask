<?php

$servername = "localhost";
$username = "root";
$password = "";

try{
    $conn = new PDO("mysql:host=$servername; dbname=phpusersdb", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connection successful";
} catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles/Extras.css">
    <title>Login</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center h-75">
        <form class="card d-flex justify-content-center align-items-center" action="" method="post">
            <h1 class="mt-1 mb-5">Register</h1>
            <input class="mb-2 w-75" type="text" name="username" id="username" placeholder="Username">
            <input class="mb-2 w-75" type="email" name="email" id="email" placeholder="Email">
            <input class="mb-2 w-75" type="password" name="password" id="password" placeholder="Password">
            <input class="mb-3 w-75" type="text" name="phone" id="phone" placeholder="Phone Number">
            <input class="mb-5 w-75 btn bg-info" type="submit" value="Register">
            <a class="mb-1" href="">Login</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>