<?php
include "PurePHP/connection.php";
include "PurePHP/sessionCheck.php";
session_start();
checkSession("login.php");
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
            <form class="mb-4 w-100 d-flex justify-content-between align-items-center"
                action="PurePHP/updateData.php" method="post">
                <div class="w-25">
                    Username: 
                </div>
                
                <input class="data-field me-5" type="text" name="username" value="<?php echo $_SESSION["username"]?>">
                <input class="submit-change-btn btn btn-info" type="button" value="Change">
            </form>
            <form class="mb-4 w-100 d-flex justify-content-between align-items-center"
                action="PurePHP/updateData.php" method="post">
                <div class="w-25">
                    Email: 
                </div>
                <input class="data-field me-5" type="email" name="email" value="<?php echo $_SESSION["email"]?>">
                <input class="submit-change-btn btn btn-info" type="button"value="Change">
            </form>
            <form class="mb-4 w-100 d-flex justify-content-between align-items-center"
                action="PurePHP/updateData.php" method="post">
                <div class="w-25">
                    Phone Number: 
                </div>
                <input class="data-field me-5" type="text" name="phone" value="<?php echo $_SESSION["phone"]?>">
                <input class="submit-change-btn btn btn-info" type="button" value="Change">
            </form>
            <div class="mb-4 w-100 d-flex justify-content-center align-items-center">
                <button id="change-password" class="btn btn-info">Change Password</button>
            </div>
            <div class="mb-4 w-100 d-flex justify-content-center align-items-center">
                <a href="PurePHP/logout.php">Logout</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="Scripts/ValidationUpdate.js"></script>
    <script src="Scripts/ChangePasswordBtn.js"></script>
</body>
</html>