<?php
include "connection.php";

if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["phone"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];

    $usernameCheckQuery = "SELECT * FROM users WHERE username = :checkedusername";
    $usernameCheck = $conn->prepare($usernameCheckQuery);
    $usernameCheck->bindParam(':checkedusername', $username);
    $usernameCheck->execute();

    $checkResult = $usernameCheck->fetchAll(PDO::FETCH_ASSOC);
    echo sizeof($checkResult);
    if (sizeof($checkResult)==0){
        $insertionQuery = "INSERT INTO users (username, email, user_password, phone) VALUES (:username, :email, :userpassword, :phone)";
        $insertion = $conn->prepare($insertionQuery);
        $insertion->bindParam(':username', $username);
        $insertion->bindParam(':email', $email);
        $insertion->bindParam(':userpassword', $password);
        $insertion->bindParam(':phone', $phone);

        $insertion->execute();
    }
    else{
        echo "<script>alert('Username is used. Select a different one.');</script>";
    }
}
else{
    echo "<script>alert('Invalid registration data.');</script>";
}

?>