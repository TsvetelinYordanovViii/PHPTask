<?php
include "PurePHP/connection.php";
include "PurePHP/resetSessionCheck.php";
session_start();
checkResetSession("login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>New Password</title>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center h-75">
        <div class="card w-25 p-2 d-flex justify-content-center align-items-center">
            <form id="reset-password-form" class="mb-4 w-100 d-flex justify-content-between align-items-center flex-column"
                action="PurePHP/resetPassword.php" method="post">
                <strong class="mb-5">Here is the reset code: <?php echo "RESET"; ?></strong>
                <div class="mb-5 w-100 d-flex justify-content-between align-items-center">
                    <div class="w-50">
                        Reset Code: 
                    </div>
                    <input class="data-field" type="text" name="reset-code" value="">
                </div>
                <div class="mb-5 w-100 d-flex justify-content-between align-items-center">
                    <div class="w-50">
                        New Password: 
                    </div>
                    <input class="data-field" type="password" name="reset-password" value="">
                </div>
                <input class="submit-change-btn btn btn-info" type="button" value="Reset Password">
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="Scripts/ValidationPasswordResetForm.js"></script>
</body>
</html>