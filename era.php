<?php include "components/base.php"; ?>
<?php include "service/config.php"; ?>

<head>
    <title>Era | NOTHVA</title>
    <link rel="stylesheet" href="./assets/scss/era.css">
</head>


<!-- AN ERA -->
<?php if(isset($_GET['era'])){
    $slug = $_GET['era'];
    $anera = $conn->query("SELECT * FROM era WHERE slug='$slug' AND active=0");
    if($anera->num_rows > 0){
        $thisera = $anera->fetch_object();
        $thiseraimg = $conn->query("SELECT * FROM era_images WHERE era_id='$thisera->id' AND active=0");
    ?>
    <section id="era" class="pt-20 w-11/12 mx-auto min-h-screen flex flex-col md:flex-row md:gap-10">
        <div id="era-text" class="md:w-7/12 flex flex-col md:justify-center">
            <div id="era-header" class="relative">
                <h1 id="era-title" class="text-myred font-bebas text-4xl sm:text-5xl lg:text-6xl">#<?= $thisera->name ?> : <span class="text-white"><?= $thisera->title ?></span></h1>
                 <a onClick="javascript:history.go(-1);" class="md:absolute top-1 right-1 text-myred text-sm cursor-pointer md:text-base lg:text-lg">Back</a>
            </div>
            <div id="era-description" class="mt-5 min-h-[30vh] max-h-[30vh] overflow-y-scroll p-2 border-b border-maroon">
                <p class="text-[12px] sm:text-sm text-white lg:text-base">
                    <?= $thisera->description ?>
                </p>
            </div>
        </div>
        <div id="era-faces" class="mt-10 md:w-5/12 h-[40vh] md:h-[80vh] md:mt-0 flex flex-col justify-center">
            <div class="owl-carousel h-[40vh] md:h-[90vh] lg:h-[80vh]">
            <?php 
            if ($thiseraimg->num_rows > 0) {
                while($images = $thiseraimg->fetch_object()){ ?>
                <img src="./era/<?= $thisera->name ?>/<?= $images->image ?>">
                <?php } } ?>
            </div>
        </div>
        <script src="./assets/js/anera.js" defer></script>
    <?php }else{
        include "pages/404.php";
    }?>
<!-- ALL ERA -->
    <?php }else{
        $allera = $conn->query("SELECT * FROM era ORDER BY created_at DESC");
    ?>
    <section id="era" class="mt-20 w-11/12 mx-auto min-h-screen">
    <div id="era-header">
        <h1 class="text-myred text-6xl font-bebas md:text-7xl lg:text-8xl">Era</h1>
    </div>
    <div id="era-container" class="mt-10 grid grid-cols-1 grid-rows-auto gap-5 md:grid-cols-2 pb-56">
    <?php 
        if($allera->num_rows > 0){
            while($eras = $allera->fetch_object()){ ?>
            <a href="./era.php?era=<?= $eras->slug ?>" class="era mx-auto w-8/12 flex justify-center items-center cursor-pointer group">
                <div class="era-text absolute text-center">
                    <h3 class="font-bebas text-5xl text-myred lg:text-8xl w-full">#<?= $eras->name ?></h3>
                    <p class="text-white group-hover:text-black text-sm lg:text-xl"><?= $eras->title ?></p>
                </div>
                <img src="./era/<?= $eras->name ?>/<?= $eras->cover ?>" alt="#<?= $eras->slug?>">
            </a>
    <?php } } ?>
    <script src="./assets/js/era.js" defer></script>
    </div>
    <?php } ?>
</section>
<?php include "components/footer.php"; ?>
