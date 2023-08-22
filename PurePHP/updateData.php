<?php
include "connection.php";
include "sessionCheck.php";
include "messages.php";
session_start();
checkSession("../login.php");

$fields = ["username", "email", "phone"];

for ($i=0; $i < 3; $i++) { 
    //Check if the field is set, then sanitize and check for equality.
    if (isset($_POST[$fields[$i]])) {
        $newData = $_POST[$fields[$i]];
        $newData = filter_var($newData, FILTER_SANITIZE_STRING);
        if ($newData!=$_SESSION[$fields[$i]])
        {
            updateDataField($fields[$i], $newData, $_SESSION["id"], $conn);
            break;
        }
        else{
            //A message for clicking the change button without changing the set value.
            $message = "The $fields[$i]'s value wasn't changed. No change committed.";
            $links = "<a class='text-center mb-1' href='../userProperties.php'>User Information</a> <a class='text-center mb-1' href='logout.php'>Logout</a>";
            
            showMessage($message, $links);
            break;
        }
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
        $links = "<a class='text-center mb-1' href='../userProperties.php'>User Information</a> <a class='text-center mb-1' href='logout.php'>Logout</a>";
        
        showMessage($message, $links);
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