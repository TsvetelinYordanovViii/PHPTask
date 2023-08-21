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
    }
?>