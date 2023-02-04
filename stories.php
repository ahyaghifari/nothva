<?php include "components/base.php"; include "service/config.php"; ?>
<head>
    <title>Stories | NOTHVA</title>
    <link rel="stylesheet" href="./assets/scss/stories.css">
</head>

<!-- A STORIES -->
<?php if (isset($_GET['episode'])) {
    $episode = $_GET['episode'];
    $astory = $conn->query("SELECT * FROM stories WHERE episode='$episode' AND active='0'");
    if($astory->num_rows > 0){
        $thisstory = $astory->fetch_object();?>

        <section id="stories" class="single-stories mt-24 w-10/12 mx-auto min-h-screen bg-black p-2 border-l border-maroon flex flex-col">
            <div id="stories-header" class="relative">
                <h3 class="text-white">Stories</h3>
                <h1 id="stories-title" class="text-myred2 text-2xl font-bebas md:text-4xl">Episode <?= $thisstory->episode ?> : <span class="text-white"><?= $thisstory->title ?></span></h1>
                <a onClick="javascript:history.go(-1);" class="absolute top-1 right-1 text-white text-sm cursor-pointer md:text-base lg:text-lg">Back</a>
            </div>
            <div id="stories-body" class="mt-10">
                    <p class="text-[13px] text-white md:w-9/12 md:text-sm md:text-base"><?= $thisstory->body ?></p>
                </div>
            </div>
        <script src="./assets/js/astory.js" defer></script>
    <?php  
    }else{ 
        include "pages/404.php";
    } ?>

 
<!-- ALL STORIES -->
<?php }else{
    $allstories = $conn->query("SELECT * FROM stories WHERE active='0' ORDER BY episode DESC");
    ?>
<section id="stories" class="pt-24 w-11/12 mx-auto md:w-8/12 min-h-screen grid grid-cols-2 md:flex-row">
    <h1 class="text-white font-bebas text-5xl md:text-7xl lg:text-8xl">Stories</h1>
    <?php 
    if ($allstories->num_rows > 0) {
        while ($stories = $allstories->fetch_object()) { ?>
        <a href="./stories.php?episode=<?= $stories->episode ?>" class="stories bg-myred2 border border-black p-3 row-span-<?php echo rand(1, 2) ?> cursor-pointer">
            <h3 class="text-black font-bebas text-xl md:text-2xl lg:text-3xl">Episode <?= $stories->episode ?></h3>
            <h3 class="text-white font-bebas text-2xl md:text-3xl lg:text-4xl"><?= $stories->title ?></h3>
            <h3 class="text-sm text-maroon mb-8 md:text-base lg:text-lg"><?= $stories->preview ?>...</h3>
        </a>
        <?php } } ?>

    <script src="./assets/js/stories.js" defer></script>
<?php } ?>
</section>

<!-- <script src="./assets/js/era.js" defer></script> -->
<?php include "components/footer.php"; ?>
