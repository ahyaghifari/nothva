<?php 

// INDEX
function index($conn){
    if (isset($_SESSION['newvalue'])) {
            unset($_SESSION['newvalue']);
        }
    $allera = $conn->query("SELECT * FROM era ORDER BY created_at DESC");
    $allimages = $conn->query("SELECT * FROM era_images");
    ?>
    <div id="era-header" class="flex justify-between items-center">
        <h1 class="titles">ERA</h1>
        <a href="./era.php?create=era">
            <span class="material-symbols-outlined text-white md:text-4xl">
                add
            </span>
        </a>
    </div>    
    <div id="era-container" class="mt-10">
        <?php while ($era = $allera->fetch_object()) {
                $active = ($era->active != 0) ? "opacity-50" : "";
        ?>
        <div class="era shadow-md border-t border-neutral-600 pt-5 mb-10">
            <div class="era-main flex items-center gap-2">
                <div class="era-main-left w-8/12 text-myred lg:w-7/12">
                <h3 class="font-bebas text-2xl sm:text-3xl lg:text-4xl <?= $active ?>">#<?= $era->name ?> :
                    <span class="text-white"><?= $era->title ?></span></h3>
                <a href="./era.php?edit=era&era=<?= $era->slug ?>">
                <span class="material-symbols-outlined text-white">
                        edit
                    </span>
                </a>
                </div>
                <img src="../era/<?= $era->slug ?>/<?= $era->cover ?>" alt="" class="w-4/12 lg:w-5/12 max-h-[20vh] object-contain <?= $active ?>">
            </div>
            <a href="./era.php?create=eraimages&era=<?=$era->slug?>" class="mt-5 flex items-center text-white text-sm"><span class="material-symbols-outlined text-white md:text-4xl">
                add
            </span>images</a>
            <div class="era-images flex items-center w-full overflow-y-hidden overflow-x-scroll h-[25vh] mt-1">
                <?php 
                    $eraimages = $conn->query("SELECT * FROM era_images WHERE era_id='$era->id'");
                    while ($images = $eraimages->fetch_object()) {
                    $active = ($images->active != 0) ? "opacity-50" : "";
                ?>
                <div class="images h-[25vh] w-2/6 text-right relative object-contain lg:w-1/6 flex justify-center mx-3 <?= $active ?>">
                    <img src="../era/<?= $era->slug ?>/<?= $images->image ?>" alt="<?= $images->image ?>" class="h-[25vh] object-contain">
                     <a href="./era.php?edit=eraimages&era=<?=$era->slug?>&id=<?= $images->id ?>" class="absolute bottom-2 right-2">
                        <span class="material-symbols-outlined text-white md:text-4xl text-[20px] md:text-[25px]">
                            edit
                        </span>
                    </a>
                </div>
                <?php  } ?>
            </div>
        </div>
        <?php } ?>
    </div>
<?php }

// EDIT ERA
function editera($conn, $era){
   if(isset($_SESSION['newvalue'])){
        $name = $_SESSION['newvalue']['name']; 
        $title = $_SESSION['newvalue']['title'];
        $desc = $_SESSION['newvalue']['description']; 
        $cover = $_SESSION['newvalue']['cover'];
        $active = $_SESSION['newvalue']['active'];
        $oldslug = $_SESSION['newvalue']['oldslug'];
    }else{
        $getera = $conn->query("SELECT * FROM era WHERE slug='$era'"); 
        $era = $getera->fetch_object(); 
        $name = $era->name; 
        $title = $era->title; 
        $desc = $era->description; 
        $cover = $era->cover;
        $active = $era->active;
        $oldslug = $era->slug;
    }
        $active = ($active == 0) ? "checked" : "";
    ?> 
    <div id="edit-era">
        <h1 class="titles">EDIT ERA</h1>
        <a href="./era.php" class="form-back-btn">Back</a>
        <form action="crud/era_crud.php" method="post" class="mx-auto md:w-11/12 text-sm grid grid-cols-1 md:grid-cols-2 gap-3" enctype="multipart/form-data">
            <div class="form-components col-span-2 md:col-span-1">
                <label for="name">Name : </label>
                <input type="text" name="name" id="name" value="<?= $name ?>" required>
            </div>
            <div class="form-components">
                <label for="name">Title : </label>
                <input type="text" name="title" id="title" value="<?= $title ?>" required>
            </div>
            <div class="form-components col-span-2">
                <label for="desc">Description :</label>
                <textarea name="description" id="desc" cols="30" rows="10" required><?= $desc ?></textarea>
            </div>
            <div class="form-components">
                <label for="active">Active :</label>
                <input type="checkbox" name="active" class="checkbox-input" <?= $active ?>> 
            </div>
            <div class="form-components col-span-2">
                <label for="cover">Cover : </label>
                <input type="file" name="cover" id="cover" class="file-input-image" accept="image/*">
                <?php imagepreview("../era/".$oldslug."/".$cover) ?>
            </div>
            <input type="submit" value="Update" name="updateera" class="cu-btn w-fit">
            <input type="hidden" value="<?= $oldslug ?>" name="oldslug">
            <input type="hidden" value="<?= $cover ?>" name="oldcover">
        </form>
        <form id="form-delete-era" action="crud/era_crud.php" method="post" class="mt-10">
            <input type="hidden" name="deleteera" value="0">
            <input type="hidden" name="era" value="<?= $oldslug ?>">
            <button id="delete-era-btn" class="form-delete-btn">Delete</button>
        </form>
    </div>

<?php }

// CREATE ERA
function createera(){
    if(isset($_SESSION['newvalue'])){
        $name = $_SESSION['newvalue']['name']; 
        $title = $_SESSION['newvalue']['title'];
        $desc = $_SESSION['newvalue']['description']; 
        $active = $_SESSION['newvalue']['active'];
        $cover = $_SESSION['newvalue']['cover'];
        $firstimage = $_SESSION['newvalue']['firstimage'];
    }else{
        $name = ""; 
        $title = ""; 
        $desc = ""; 
        $active = 0;
        $cover = "";
        $firstimage = "";
    }
        $active = ($active == 0) ? "checked" : "";
    ?> 
     <div id="create-era">
        <h1 class="titles">CREATE ERA</h1>
        <a href="./era.php" class="form-back-btn">Back</a>
        <form action="crud/era_crud.php" method="post" class="mx-auto md:w-11/12 text-sm grid grid-cols-1 md:grid-cols-2 gap-3" enctype="multipart/form-data">
            <div class="form-components col-span-2 md:col-span-1">
                <label for="name">Name : </label>
                <input type="text" name="name" id="name" value="<?= $name ?>" required>
            </div>
            <div class="form-components">
                <label for="name">Title : </label>
                <input type="text" name="title" id="title" value="<?= $title ?>" required>
            </div>
            <div class="form-components col-span-2">
                <label for="desc">Description :</label>
                <textarea name="description" id="desc" cols="30" rows="10" required><?= $desc ?></textarea>
            </div>
            <div class="form-components">
                <label for="active">Active :</label>
                <input type="checkbox" name="active" <?= $active ?> class="checkbox-input"> 
            </div>
            <div class="form-components col-span-2">
                <label for="cover">Cover : </label>
                <input type="file" name="cover" id="cover" value="<?= $cover ?>" class="file-input-image-era" accept="image/*" required>
                <p class="mt-4 text-white">Preview : </p>
                <img src="<?= $cover ?>" class="w-[100px]" alt="" class="image-preview">
            </div>
            <div class="form-components col-span-2">
                <label for="firstimage">First Image : </label>
                <input type="file" name="firstimage" id="firstimage" class="file-input-image-era" accept="image/*" value="<?= $firstimage ?>" required>
                <p class="mt-4 text-white">Preview : </p>
                <img src="<?= $firstimage ?>" class="w-[100px]" alt="" class="image-preview">
            </div>
            <input type="submit" value="Create" name="createera" class="cu-btn w-fit">
        </form>
    </div>


<?php }

// CREATE IMAGES
function createeraimages($conn, $era){
    $getera = $era;?>
 
    <div id="create-era-images">
        <h1 class="titles">CREATE ERA IMAGES <span class="text-myred2">#<?= $getera ?></span></h1>
        <a href="./era.php" class="form-back-btn">Back</a>
        <form action="crud/era_crud.php" method="post" class="mx-auto md:w-11/12 text-sm" enctype="multipart/form-data">
            <div class="flex flex-col">
                <label for="images">Images : </label>
                <input type="file" name="images[]" id="image" class="file-input-era-images w-fit" accept="image/*" multiple required>
            </div>
            <div id="image-preview" class="flex flex-wrap w-full mt-3">
            </div>
            <input type="hidden" name="era" value="<?= $getera ?>">
            <input type="submit" value="Create" name="createeraimages" class="cu-btn w-fit">
        </form>
    </div>

<?php }

// EDIT IMAGES
function editeraimages($conn, $era, $id){
    $getimage = $conn->query("SELECT * FROM era_images WHERE id='$id'");
    $image = $getimage->fetch_object();
    $active = ($image->active == 0) ? "checked" : "";
    ?>
    <div id="edit-era-image">
        <h1 class="titles">EDIT ERA IMAGES</h1>
        <a href="./era.php" class="form-back-btn">Back</a>
        <form action="crud/era_crud.php" method="post" class="mx-auto md:w-11/12 text-sm" enctype="multipart/form-data">
            <div class="form-components flex flex-col">
                <label for="image">Image : </label>
                <input type="file" name="image" id="image" class="file-input-image" accept="image/*">
            </div>
            <?php imagepreview("../era/".$era."/".$image->image) ?>
            <div class="form-components ">
                <label for="active">Active : </label>
                <input type="checkbox" name="active" id="active" class="checkbox-input" <?= $active ?>>
            </div>
            <input type="hidden" value="<?= $era ?>" name="era">
            <input type="hidden" value="<?= $image->id ?>" name="oldid">
            <input type="submit" value="Update" name="updateeraimages" class="cu-btn">
        </form>
         <form id="form-delete-eraimages" action="crud/era_crud.php" method="post" class="mt-10">
            <input type="hidden" name="deleteimageera" value="0">
            <input type="hidden" value="<?= $era ?>" name="era">
            <input type="hidden" name="id" value="<?= $image->id ?>">
            <button id="form-delete-eraimage-btn" class="form-delete-btn">Delete</button>
        </form>
    </div>
<?php }