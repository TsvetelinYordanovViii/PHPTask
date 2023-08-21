<?php
include "PurePHP/connection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>User Information</title>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center h-75">
        <div class="card w-50 p-5 d-flex justify-content-center align-items-center">
            <div class="mb-4 w-100 d-flex justify-content-between align-items-center">
                Name: <?php echo $_SESSION["username"]?> <button class="btn btn-info">Change</button>
            </div>
            <div class="mb-4 w-100 d-flex justify-content-between align-items-center">
                Email: <?php echo $_SESSION["email"]?> <button class="btn btn-info">Change</button>
            </div>
            <div class="mb-4 w-100 d-flex justify-content-between align-items-center">
                Phone Number: <?php echo $_SESSION["phoneNumber"]?> <button class="btn btn-info">Change</button>
            </div>
            <div class="mb-4 w-100 d-flex justify-content-center align-items-center">
                <button class="btn btn-info">Change Password</button>
            </div>
            <div class="mb-4 w-100 d-flex justify-content-center align-items-center">
                <a href=''>Logout</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>