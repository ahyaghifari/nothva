<?php 
include "components/base-admin.php";
include "../service/config.php";
include "../components/imagepreview.php";
include "pages/index_pages.php";
?>
<title>Index Admin | NOTHVA</title>
<section id="index" class="content">

    <?php 
// EDIT
    if (isset($_GET['edit'])) {
        if ($_GET['edit'] == "indextext") {
            editindexintro($conn);    
        }elseif ($_GET['edit'] == "indeximages") {
            $id = $_GET['id'];
            editindeximages($conn, $id);
        }
// CREATE
    }elseif(isset($_GET['create'])){
        if($_GET['create'] == "indeximages"){
            createindeximages($conn);
        }
// MAIN
    }else{   
        index($conn); 
    }
    ?>

</section>
<?php include "components/footer.php" ?>