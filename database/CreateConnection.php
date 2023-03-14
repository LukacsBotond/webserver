<?php declare(strict_types=1);

session_start();

function startConnection()
{
    $log_path = __DIR__ . '/logs/ConnLog.txt';
    $servername = "localhost";
    $username = $_SESSION['username'];
    $password = $_SESSION["password"];
    $dbname = $_SESSION['databaseName'];
    file_put_contents($log_path,$username);
    file_put_contents($log_path,$password, FILE_APPEND);
    file_put_contents($log_path,$dbname, FILE_APPEND);
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    return $conn;
}

function endConnection(mysqli $conn){
    $conn->close();
}
?>