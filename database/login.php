<?php declare(strict_types=1);
session_start();
error_reporting();


include_once("CreateConnection.php");
include_once("../get.php");

function executeLogin(string $username, string $password){
    $log_path = __DIR__ . '/logs/loginLog.txt';
    GetCredentials();
    $conn = startConnection();
    $stmt = $conn->prepare("SELECT * FROM USER WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    file_put_contents($log_path, implode(',',$result->fetch_row()));
    endConnection($conn);
    return $result;
}
?>