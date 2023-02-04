<?php
// INDEX
function index($conn){
    $indeximages = $conn->query("SELECT * FROM index_images");
    $getintro = $conn->query("SELECT * FROM index_intro WHERE id='1'");
    $intro = $getintro->fetch_object() ?>
        <div id="index-header">
            <h1 class="titles">Index</h1>
        </div>
        <div id="index-container" class="mt-5">
            <div id="index-intro" class="parts">
                <div class="parts-header">
                    <h3 class="parts-title">Index Intro</h3>
                    <a href="./index.php?edit=indextext">
                        <span class="material-symbols-outlined text-white">
                            edit
                        </span>
                    </a>
                </div>
                <div class="parts-container">
                    <p class="parts-text"><?= $intro->body ?></p>
                </div>
            </div>
            <div id="index-images" class="parts">
                <div class="parts-header">
                    <h3 class="parts-title">Index Images</h3>
                    <a href="./index.php?create=indeximages">
                        <span class="material-symbols-outlined text-white">
                            add
                        </span>
                    </a>
                </div>
                <div class="parts-container flex justify-around flex-wrap gap-3">
                    <?php
                        while ($images = $indeximages->fetch_object()) {
                        $active = ($images->active == 1) ? "opacity-30" : ""
                            ?>
                    <div class="index-images parts-images flex flex-col <?= $active ?>">
                        <img class="w-full object-contain" src="../src/index/<?= $images->image ?>" alt="">
                        <a href="./index.php?edit=indeximages&id=<?= $images->id ?>" class="self-end"><span class="material-symbols-outlined text-[14px] text-white sm:text-[16px] md:text-sm lg:text-lg">
                            edit
                        </span></a>
                    </div>
                    <?php } ?>
            </div>
        </div>
    </div>
<?php } 

// EDIT INDEX INTRO
function editindexintro($conn){
    $getindextext = $conn->query("SELECT * FROM index_intro WHERE id='1'");
    $getbody = $getindextext->fetch_object();
    ?>
    <div id="edit-index-intro">
        <h1 class="titles">EDIT INDEX TEXT</h1>
        <a href="./index.php" class="form-back-btn">Back</a>
        <form action="crud/index_crud.php" method="post" class="mx-auto md:w-11/12 text-sm md:text-base">
            <div class="flex flex-col">
                <label for="body">Body : </label>
                <textarea class="forms-input" name="body" id="body" cols="30" rows="10" required><?= $getbody->body ?></textarea>
            </div>
            <input type="submit" value="Update" name="updatetext" class="cu-btn">
        </form>
    </div>
<?php }

// EDIT INDEX IMAGES
function editindeximages($conn, $id){
    $getindeximage = $conn->query("SELECT * FROM index_images WHERE id='$id'");
    $image = $getindeximage->fetch_object();
    $active = ($image->active == 0 ? "checked" : "")
    ?>

    <div id="edit-index-image">
        <h1 class="titles">EDIT INDEX IMAGE</h1>
        <a href="./index.php" class="form-back-btn">Back</a>
        <form action="crud/index_crud.php" method="post" class="mx-auto md:w-11/12 text-sm" enctype="multipart/form-data">
            <div class="form-components flex flex-col">
                <label for="image">Image : </label>
                <input type="file" name="image" id="image" class="file-input-image w-fit" accept="image/*">
            </div>
            <?php imagepreview("../src/index/".$image->image) ?>
            <div class="form-components ">
                <label for="active">Active : </label>
                <input type="checkbox" name="active" id="active" class="checkbox-input" <?= $active ?>>
            </div>
            <input type="hidden" value="<?= $image->id ?>" name="id">
            <input type="submit" value="Update" name="updateimage" class="cu-btn">
        </form>
         <form id="form-delete-indeximages" action="crud/index_crud.php" method="post" class="mt-10">
            <input type="hidden" name="deleteimage" value="0">
            <input type="hidden" name="id" value="<?= $image->id ?>">
            <button id="form-delete-indeximage-btn" class="form-delete-btn">Delete</button>
        </form>
    </div>


<?php }

// CREATE INDEX IMAGES
function createindeximages($conn) { ?>
    <div id="create-index-image">
        <h1 class="titles">CREATE INDEX IMAGE</h1>
        <a href="./index.php" class="form-back-btn">Back</a>
        <form action="crud/index_crud.php" method="post" class="mx-auto md:w-11/12 text-sm" enctype="multipart/form-data">
            <div class="flex flex-col">
                <label for="image">Image : </label>
                <input type="file" name="image" id="image" class="file-input-image" accept="image/*">
            </div>
            <?php imagepreview("") ?>
            <input type="submit" value="Create" name="createimage" class="cu-btn">
        </form>
    </div>

<?php } ?>

