<?php 
session_start();
include "../../service/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if(isset($_POST['login'])){
    $username = htmlspecialchars($_POST['username']);
    $password = md5(htmlspecialchars($_POST['password']));
 
    $getadmin = $conn->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");

    if($getadmin->num_rows == 0){
        $_SESSION['failedlogin'] = true;
        header("location: ../login.php");
        return;
    }

    $updateadmin = $conn->query("UPDATE admin SET status=0 WHERE username='nothva'");
    if($updateadmin){
        $_SESSION['adminlogin'] = true;
        header("location: ../index.php");
    }
}

if(isset($_POST['logout'])){
    $updateadmin = $conn->query("UPDATE admin SET status=1 WHERE username='nothva'");
    session_destroy();
    header("location: ../../index.php");
}

}else{
    echo "Not Found";
}