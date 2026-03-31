<?php
$isLocal = $_SERVER['SERVER_NAME'] === 'localhost';

if ($isLocal) {
    $host = "localhost";
    $dbname = "your_local_db";
    $username = "root";
    $password = "";
} else {
    $host = "your_live_host";
    $dbname = "your_live_db";
    $username = "your_live_user";
    $password = "your_live_pass";
}

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

return $conn;