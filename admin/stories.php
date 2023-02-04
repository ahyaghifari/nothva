<?php 
include "components/base-admin.php";
include "../service/config.php";
include "pages/stories_pages.php";

?>
<title>Stories Admin | NOTHVA</title>
<section id="stories" class="content">
    <?php 
    if (isset($_GET['edit'])) {
            $episode = $_GET['edit'];
            editstories($conn, $episode);
    }elseif(isset($_GET['create'])){
            createstories();
    }else{   
        index($conn); 
    }
    ?>

</section>
<?php include "components/footer.php" ?>