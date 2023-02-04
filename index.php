<?php 
include "./components/base.php";
include "./service/config.php";

$indeximages = $conn->query("SELECT * FROM index_images WHERE active='0'");
$getintro = $conn->query("SELECT * FROM index_intro WHERE id='1'");
$intro = $getintro->fetch_object();
?>
<head>
    <title>Index | NOTHVA</title>
    <link rel="stylesheet" href="./assets/scss/index.css">
</head>
<section id="index" class="h-screen grid grid-cols-2 grid-rows-2 mt-10 mx-auto w-11/12 md:mt-20 lg:mt-24 lg:h-[90vh]">
    <div id="index-image" class="col-span-2 h-[45vh] md:h-full self-end flex justify-center border-2 border-myred2 md:col-span-1 md:order-1 bg-black md:self-start">
        <div class="owl-carousel h-full overflow-hidden">
            <?php while($images = $indeximages->fetch_object()) { if ($images->active == 0) { ?>
                <img src="./src/index/<?= $images->image ?>" class="h-full object-contain" alt="nothva">
            <?php } } ?>
        </div>
    </div>
    <div id="index-title" class="bg-myred2 p-2 flex md:items-center md:justify-center">
            <h1 class="text-myred font-bebas text-7xl w-10/12 break-all text-black md:w-11/12 md:text-8xl lg:text-9xl">NOTHVA</h1>
        </div>
    <p id="index-intro" class="text-neutral-200 font-semibold text-[13px] self-center text-center md:order-last sm:text-base md:text-2xl md:col-span-2 md:w-8/12 md:mx-auto p-1"><?= $intro->body ?></p>
</section>

<script src="./assets/js/index.js" defer></script>
<?php include "components/footer.php"; ?>
