<?php
include "connection.php";
session_start();
$fields = ["username", "email", "phone", "user_password"];

for ($i=0; $i < 4; $i++) { 
    if (isset($_POST[$fields[$i]]) && $_POST[$fields[$i]]!=$_SESSION[$fields[$i]]) {
        updateDataField($fields[$i], $_POST[$fields[$i]], $_SESSION["id"], $conn);
        break;
    }
}

function updateDataField ($field, $data, $id, $conn){
        //$field is the only parameter that is added directly into the sql.
        //Using the bindParam function causes errors.
        $updateQuery = "
        UPDATE users
        SET $field = :value
        WHERE id = :id
        ";

        $update = $conn->prepare($updateQuery);
        $update->bindParam(':value', $data);
        $update->bindParam(':id', $id);
        $update->execute();

        $_SESSION[$field] = $data;

        echo "success";
    
        //$userCheckResult = $userCheck->fetchAll(PDO::FETCH_ASSOC);
    
        /*if (sizeof($userCheckResult)==1){
            session_start();
    
            $_SESSION["userId"] = $userCheckResult[0]["id"];
            $_SESSION["username"] = $userCheckResult[0]["username"];
            $_SESSION["email"] = $userCheckResult[0]["email"];
            $_SESSION["phoneNumber"] = $userCheckResult[0]["phone"];
            $_SESSION["password"] = $userCheckResult[0]["user_password"];
    
            $username = $_SESSION["username"];
    
            //$message = "Login successful, $username.";
            //$links = "<a class='text-center mb-1' href='../userProperties.php'>User Information</a> <a class='text-center mb-1' href=''>Logout</a>";
        }
        else{
            //$message = "Incorrect email or password.";
            //$links = "<a class='text-center mb-1' href='../login.php'>Login</a> <a class='text-center mb-1' href='../index.php'>Use a different username</a>";
        }*/
    }
?>