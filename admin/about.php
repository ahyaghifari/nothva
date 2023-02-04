<?php 
include "components/base-admin.php";
include "../service/config.php";
include "../components/imagepreview.php";
include "pages/about_pages.php";
?>
<title>About Admin | NOTHVA</title>
<section id="about" class="content">
    <?php 

    if(isset($_GET['edit'])){
        if($_GET['edit'] == "body"){
            editaboutbody($conn);
        }else if($_GET['edit'] == "bg"){
            editaboutbg($conn);
        }

    }else{
        index($conn);
    }
    ?>
</section>
<?php include "components/footer.php" ?>