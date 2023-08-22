<?php
include "connection.php";
include "sessionCheck.php";
session_start();
checkSession("../login.php");

$fields = ["username", "email", "phone"];

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

        $message = "The $field is updated successfully.";
        $links = "<a class='text-center mb-1' href='../userProperties.php'>User Information</a> <a class='text-center mb-1' href='PurePHP/logout.php'>Logout</a>";
        echo "
        <div class='container  d-flex justify-content-center align-items-center h-75'>
            <div class='card w-50'>
                <h2 class='text-center'>$message</h2>
                $links
            </div>
        </div>
        ";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>