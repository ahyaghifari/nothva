<?php 
include "components/base-admin.php";
include "../components/imagepreview.php";
include "../service/config.php";
include "pages/era_pages.php";
?>
<title>Era Admin | NOTHVA</title>
<section id="era" class="content">

    <?php 
// EDIT
    if (isset($_GET['edit'])) {
        if ($_GET['edit'] == "era") {
            $era = $_GET['era'];
            editera($conn, $era);    
         }elseif ($_GET['edit'] == "eraimages") {
            $id = $_GET['id'];
            $era = $_GET['era'];
            editeraimages($conn, $era, $id);
    }
// CREATE
    }elseif(isset($_GET['create'])){
        if($_GET['create'] == 'era' ){
            createera();
        }else if($_GET['create'] == 'eraimages'){
            $era = $_GET['era'];
            createeraimages($conn, $era);
        }
// MAIN
     }else{
        index($conn); 
     }
    ?>

</section>
<?php include "components/footer.php" ?>