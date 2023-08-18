<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles/Extras.css">
    <title>Login</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center h-75">
        <form class="card d-flex justify-content-center align-items-center" action=<?php echo"test"?> method="post">
            <h1 class="mt-1 mb-5">Login</h1>
            <input class="mb-2 w-75" type="text" name="username" id="username" placeholder="Username" required>
            <input class="mb-2 w-75" type="password" name="password" id="password" placeholder="Password" required>
            <input class="mb-5 w-75 btn bg-info" type="button" id="submit" value="Login">
            <a class="mb-1" href="">Register</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="Scripts/Validation.js"></script>
</body>
</body>
</html>