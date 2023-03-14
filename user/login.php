<?php
session_start();

//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
//include_once("../get.php");
include_once("../database/login.php");
$log_path = __DIR__ . '/logs/ConnLog.txt';

/*
returnCode 0-> succ
1->fields are not filler in
2->not activated
3->incorrect cred/no such user
*/
$data = array(
    "returnCode" => 0,
    "returnMessage" => "",
    "username" => "",
    "email" => "",
    "phone_number" =>"",
    "token" => "",
    "creation_time" => 0,
    "refresh_time" => 0
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    file_put_contents($log_path,"");
    foreach($_POST as $key=>$value){
        file_put_contents($log_path,  $key.' '.$value."\n", FILE_APPEND);
        //fwrite($myfile, $key.' '.$value."\n");
    }
    if (!checkIfFilled()){
        $data["returnCode"] = 1;
    }
    else{
        fillData();
    }
    // Convert the array to a JSON string
    $json = json_encode($data);
    file_put_contents($log_path, $json, FILE_APPEND);
    //
    sendReply($json);
}

function checkIfFilled()
{
    if(strlen($_POST["username"]) == 0){
        return false;
    }
    if(strlen($_POST["password"]) == 0){
        return false;
    }
    return true;
}

function fillData(){
    $result = executeLogin($_POST['username'],$_POST['password']);
}

function sendReply(string $reply){
    $ip_address = $_SERVER['REMOTE_ADDR'];
    header('Content-Type: application/json');
    header("Content-Length: " . strlen($reply));
    header("Connection: close");
    header("X-Powered-By: PHP/" . phpversion());
    
    echo $reply;
}

?>