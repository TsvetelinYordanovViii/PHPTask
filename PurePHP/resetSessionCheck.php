<?php

//Because the ".." always means the previous folder, I had to convert this into a function so that I can define when to add the go up dots or not.
function checkResetSession($redirectPath){
    //If either of the session variables are not set, redirect to the login page.
    if (!isset($_SESSION["reset-email"])){
        session_destroy();
        header("Location: $redirectPath");
    }
}

?>