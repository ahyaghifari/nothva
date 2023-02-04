<?php 
    include "components/base.php"; 
    include "service/config.php"; 
    $getabout = $conn->query("SELECT * FROM about WHERE id='1'");
    $about = $getabout->fetch_object();
?>

<head>
    <title>About | NOTHVA</title>
    <link rel="stylesheet" href="./assets/scss/about.css">
</head>
<section id="about" class="<?php if ($about->background == Null){?> bg-about <?php } ?> pt-24 p-3 min-h-screen" 
<?php if ($about->background != Null){?>
style="background-image: url('src/bg/about-bg.jpg');"
<?php } ?>
>
<div id="about-header">
    <h1 class="text-5xl text-myred font-bebas text-center md:text-6xl lg:text-7xl">ABOUT</h1>
</div>
<div id="about-body" class="mt-12 mx-auto sm:w-10/12 md:w-8/12">
    <p class="text-sm text-white md:text-base lg:text-lg"><?= $about->body ?></p>
</div>
</section>

<script src="./assets/js/about.js" defer></script>
<?php include "components/footer.php" ?>