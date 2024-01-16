<!-- create an api -->
<?php

header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == 'GET') {
   //render index.php file
    include "home.php";
} else {
    $response = [
        'status' => 405,
        'message' => 'Method not allowed'
    ];

    echo json_encode($response);
}