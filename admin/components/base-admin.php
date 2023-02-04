<?php 
include "../components/head.php";
include "../service/config.php";
session_start();

if(!isset($_SESSION['adminlogin'])){
    $checkadmin = $conn->query("SELECT * FROM admin WHERE status=0");
    if($checkadmin->num_rows > 0){
        header("location: ../index.php");
        return;
    }else{
        header("location: login.php");
    }
}

?>
<body class="font-mont bg-neutral-900">
    <header class="p-2 md:px-4 bg-myred2 flex justify-between items-center">
        <div id="header-left" class="flex">
            <span id="nav-admin-toggle" class="material-symbols-outlined mr-3 cursor-pointer text-white md:hidden">
                menu
            </span>
            <h1 class="text-white font-bebas text-2xl md:text-3xl">Hi, NOTHVA</h1>
        </div>
        <a href="../index.php" class="text-lg cursor-pointer"><span class="material-symbols-outlined text-white">
            home
        </span></a>
    </header>
    <main class="flex">
    <nav id="nav-admin">
        <a href="./index.php">Index</a>
        <a href="./stories.php">Stories</a>
        <a href="./era.php">Era</a>
        <a href="./about.php">About</a>
    </nav>
    <div id="main-content" class="mt-8">
        
    <?php if(isset($_SESSION['message'])) { $context = ($_SESSION['message']['context'] == "success") ? "bg-green-600" : "bg-red-700" ?>
        <div id="message" class="flex text-sm md:text-base justify-between items-center px-2 py-1 mb-3 w-11/12 md:w-9/12 mx-auto 
        <?= $context ?>">
            <p class="text-white"><?= $_SESSION['message']['message'] ?></p>
            <span class="material-symbols-outlined message-close-btn cursor-pointer text-white">
                close
            </span>
        </div>
    <?php unset($_SESSION['message']); } ?> 