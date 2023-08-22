<?php
include "PurePHP/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles/Extras.css">
    <title>Register</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center h-75">
        <form id="register-form" class="card d-flex justify-content-center align-items-center" name="registration-form" action="PurePHP/submitRegistration.php" method="post">
            <h1 class="mt-1 mb-5">Register</h1>
            <input class="mb-2 w-75" type="text" name="registration-username" id="registration-username" placeholder="Username" required>
            <input class="mb-2 w-75" type="email" name="registration-email" id="registration-email" placeholder="Email" required>
            <input class="mb-2 w-75" type="password" name="registration-password" id="registration-password" placeholder="Password" required>
            <input class="mb-3 w-75" type="text" name="registration-phone" id="registration-phone" placeholder="Phone Number" required>
            <input class="mb-5 w-75 btn bg-info" type="button" name="submit-btn" id="submit-registration-btn" value="Register">
            <a class="mb-1" href="login.php">Login</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="Scripts/ValidationCheckRegistration.js"></script>
</body>
</html>