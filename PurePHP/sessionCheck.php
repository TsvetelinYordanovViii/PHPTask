<?php

//Because the ".." always means the previous folder, I had to convert this into a function so that I can define when to add the go up dots or not.
function checkSession($redirectPath){
    //If either of the session variables are not set, redirect to the login page.
    if (!isset($_SESSION["id"]) || !isset($_SESSION["username"]) || !isset($_SESSION["email"]) || !isset($_SESSION["phone"]) || !isset($_SESSION["user_password"])){
        session_destroy();
        echo "<script>alert('Invalid session. Redirecting to login page.')</script>";
        header("Location: $redirectPath");
    }
}

?>