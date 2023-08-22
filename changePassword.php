<?php
include "PurePHP/connection.php";
session_start();
include "PurePHP/sessionCheck.php";
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
        <div class="card w-25 p-2 d-flex justify-content-center align-items-center">
            <form class="mb-4 w-100 d-flex justify-content-between align-items-center flex-column"
                action="PurePHP/updatePassword.php" method="post">
                <div class="mb-5 w-100 d-flex justify-content-between align-items-center">
                    <div class="w-50">
                        Old Password: 
                    </div>
                    <input class="data-field" type="password" name="old-password" value="">
                </div>
                <div class="mb-5 w-100 d-flex justify-content-between align-items-center">
                    <div class="w-50">
                        New Password: 
                    </div>
                    <input class="data-field" type="password" name="new-password" value="">
                </div>
                <input class="submit-change-btn btn btn-info" type="button" value="Change Password">
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="Scripts/ValidationUpdatePassword.js"></script>
</body>
</html>