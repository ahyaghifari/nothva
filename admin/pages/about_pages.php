<?php

// INDEX
function index($conn){
    if(isset($_SESSION['newvalue'])){
        unset($_SESSION['newvalue']);
    }
    $getabout = $conn->query("SELECT * FROM about WHERE id=1");
    $about = $getabout->fetch_object();
    ?>
    <div id="about-header">
        <h1 class="titles">About</h1>
    </div>
    <div id="about-container" class="mt-5">
        <div id="about-body" class="parts">
            <div class="parts-header">
                <h3 class="parts-title">About Body</h3>
                <a href="./about.php?edit=body">
                    <span class="material-symbols-outlined text-white">
                        edit
                    </span>
                </a>
            </div>
            <div class="parts-container">
                <p class="parts-text"><?= $about->body ?></p>
            </div>
        </div>
        <div id="about-background" class="parts">
            <div class="parts-header">
                <h3 class="parts-title">About Background</h3>
                <a href="./about.php?edit=bg">
                    <span class="material-symbols-outlined text-white">
                            edit
                    </span>
                </a>
                </div>
            <div class="parts-container flex justify-around flex-wrap gap-3">
                <?php if($about->background != NULL){?>
                <div class="index-images parts-images flex flex-col <?= $active ?>">
                    <img class="w-full object-contain" src="../src/bg/<?= $about->background ?>" alt="">
                </div>
                <?php }else{ ?>
                    <p class="text-white">About Background is not setting</p>
                <?php } ?>
            </div>
    </div>
<?php }

// EDIT BODY
function editaboutbody($conn){
    $getabout = $conn->query("SELECT body FROM about WHERE id=1");
    $about = $getabout->fetch_object();?>

    <div id="edit-about-body">
        <h1 class="titles">EDIT ABOUT BODY</h1>
        <a href="./about.php" class="form-back-btn">Back</a>
        <form action="crud/about_crud.php" method="post" class="mx-auto md:w-11/12 text-sm">
            <div class="flex flex-col">
                <label for="body">Body : </label>
                <textarea class="forms-input" name="body" id="body" cols="30" rows="10" required><?= $about->body ?></textarea>
            </div>
            <input type="submit" value="Update" name="updatebody" class="cu-btn">
        </form>
    </div>


<?php }

function editaboutbg($conn){
    $getabout = $conn->query("SELECT background FROM about WHERE id=1");
    $about = $getabout->fetch_object();
    ?>

    <div id="edit-about-background">
        <h1 class="titles">EDIT ABOUT BACKGROUND</h1>
        <a href="./about.php" class="form-back-btn">Back</a>
        <form action="crud/about_crud.php" method="post" class="mx-auto md:w-11/12 text-sm" enctype="multipart/form-data">
            <div class="form-components flex flex-col">
                <label for="background">Background : </label>
                <input type="file" name="background" id="background" class="file-input-image" accept="image/*" required>
            </div>
            <?php imagepreview("../src/bg/".$about->background) ?>
            <input type="submit" value="Update" name="updatebg" class="cu-btn">
        </form>
         <form id="form-delete-aboutbg" action="crud/about_crud.php" method="post" class="mt-10">
            <input type="submit" name="deletebg" value="Delete" class="form-delete-btn">
        </form>
    </div>

<?php } ?>