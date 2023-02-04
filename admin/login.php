<?php 
include "../components/head.php";
?>
<title>Login | NOTHVA</title>
<body id="login" class="bg-black h-screen flex justify-center items-center">
    <div id="login-container">
        <div id="login-header" class="flex justify-between">
            <h1 class="font-bebas text-white text-4xl">Login</h1>
            <a onClick="javascript:history.go(-1);" class="text-myred text-sm cursor-pointer md:text-base lg:text-lg">Back</a>
        </div>
        <?php if(isset($_SESSION['failedlogin'])) {?>
            <p class="text-[12px] bg-white text-black p-1">Login Failed! Username or password is wrong</p>
        <?php unset($_SESSION['failedlogin']); } ?>
        <div id="login-content">
            <form action="service/auth.php" method="post" class="text-sm mt-5">
                <div class="mb-3">
                    <label for="username">Username : </label>
                    <input class="mt-2" type="text" name="username" id="username" required autofocus>
                </div>
                <div>
                    <label for="password">Password : </label>
                    <input class="mt-2" type="password" name="password" id="password" required>
                </div>
                <input type="hidden" name="login" value="0">
                <button type="submit" class="mt-3 bg-white text-black py-2 px-4 cursor-p">Login</button>
            </form>
        </div>
    </div>
</body>