   <footer class="p-3 text-center text-sm text-myred flex flex-col items-center">
        <?php 
        if (isset($_SESSION['adminlogin'])) {?>
        <div class="admin-nav flex ">
            <a href="./admin" class="text-myred mr-3">Dashboard</a> | 
            <form action="admin/service/auth.php" method="post" class="ml-3">
                <input type="hidden" name="logout" value="0">
                <button type="submit" class="text-white mb-2 font-semibold">Logout</button>
            </form>
        </div>
            
        <?php } ?>
        <p>&copy;NOTHVA2023 | <span class="text-white">All Right Reserved</span></p>
    </footer>

<script src="./assets/js/jquery.min.js"></script>
<?php include "scripts.php"; ?>
<script src="./assets/js/script.js"></script>
</body>
</html>