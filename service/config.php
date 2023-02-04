<?php
date_default_timezone_set('Asia/Singapore');
// DATABASE
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nothva_db";

$conn = new mysqli($hostname, $username, $password, $dbname);

if(!$conn){
    echo 'Connection Failed';
    exit();
}
