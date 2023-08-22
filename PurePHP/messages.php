<?php
include "connection.php";

function showMessage ($message, $links){
    echo "
    <div class='container  d-flex justify-content-center align-items-center h-75'>
        <div class='card w-50'>
            <h2 class='text-center mb-4'>$message</h2>
            $links
        </div>
    </div>
    ";
}

?>