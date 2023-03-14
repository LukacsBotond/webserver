<?php

session_start();

function GetCredentials()
{
    $myfile = fopen("../../login.txt", "r") or die("Unable to open file!");
    $_SESSION['username'] =str_replace("\n", '',fgets($myfile));
    $_SESSION['password'] = str_replace("\n", '',fgets($myfile));
    $_SESSION['databaseName'] = str_replace("\n", '',fgets($myfile));
    fclose($myfile);

}
