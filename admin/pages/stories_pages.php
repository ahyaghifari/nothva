<?php
// INDEX
function index($conn){
    if(isset($_SESSION['newvalue'])){
        unset($_SESSION['newvalue']);
    }
    $getstories = $conn->query("SELECT * FROM stories ORDER BY episode DESC");
   ?>

    <div id="stories-header" class="flex justify-between items-center">
        <h1 class="titles">Stories</h1>
        <a href="./stories.php?create=0">
            <span class="material-symbols-outlined text-white md:text-4xl">
                add
            </span>
        </a>
    </div>
    <div id="stories-container" class="mt-5">
        <?php 
            while($stories = $getstories->fetch_object()){
            $active = ($stories->active == 1 ) ? "opacity-50" : ""
        ?>
        <div class="stories bg-myred2 p-2 my-4 md:w-10/12 mx-auto">
            <div class="stories-content <?= $active ?>">
                <h5 class="font-bebas text-lg md:text-2xl">Episode <?= $stories->episode ?></h3>
                <h3 class="font-bebas text-white text-2xl md:text-4xl"><?= $stories->title ?></h3>
                <p class="text-black text-sm"><?= $stories->preview ?>...</p>
            </div>
            <div class="stories-action mt-2 text-right">
                <a href="./stories.php?edit=<?= $stories->episode ?>">
                    <span class="material-symbols-outlined text-white text-[18px]">
                            edit
                    </span>
                </a>
            </div>
        </div>
        <?php } ?>
    </div>

<?php }

// EDIT STORIES
function editstories($conn, $oldepisode){

    if(isset($_SESSION['newvalue'])){
        $title = $_SESSION['newvalue']['title'];
        $episode = $_SESSION['newvalue']['episode'];
        $body = $_SESSION['newvalue']['body'];
        $active = $_SESSION['newvalue']['active'];
    }else{
        $getstories = $conn->query("SELECT * FROM stories WHERE episode='$oldepisode'");
        $story = $getstories->fetch_object();
        $title = $story->title;
        $episode = $story->episode;
        $body = $story->body;
        $active = $story->active;
    }

    $active = ($active == 0 ) ? "checked" : "";
    ?>

    <div id="edit-stories">
        <h1 class="titles">EDIT STORIES</h1>
        <a href="./stories.php" class="form-back-btn">Back</a>
        <form action="crud/stories_crud.php" method="post" class="mx-auto md:w-11/12 text-sm">
            <div class="form-components">
                <label for="title">Title : </label>
                <input type="text" id="title" name="title" value="<?= $title ?>" required>
            </div>
            <div class="form-components">
                <label for="episode">Episode : </label>
                <input type="number" id="episode" name="episode" value="<?= $episode ?>" required>
            </div>
            <div class="form-components">
                <label for="body">Body : </label>
                <textarea name="body" id="body" cols="30" rows="10" required><?= $body ?></textarea>
            </div>
            <div class="form-components">
                <label for="active">Active : </label>
                <input type="checkbox" name="active" id="active" <?= $active ?> class="checkbox-input">
            </div>
            <input type="hidden" name="oldepisode" value="<?= $oldepisode ?>">
            <input type="submit" value="Update" name="updatestories" class="cu-btn">
        </form>
        <form id="form-delete-stories" action="crud/stories_crud.php" method="post" class="mt-10">
            <input type="hidden" name="deletestories" value="0">
            <input type="hidden" name="episode" value="<?= $oldepisode ?>">
            <button id="form-delete-stories-btn" class="form-delete-btn">Delete</button>
        </form>
    </div>


<?php }

// CREATE STORIES
function createstories(){ 
    if(isset($_SESSION['newvalue'])){
        $title = $_SESSION['newvalue']['title'];
        $episode = $_SESSION['newvalue']['episode'];
        $body = $_SESSION['newvalue']['body'];
        $active = $_SESSION['newvalue']['active'];
    }else{
        $title = "";
        $episode = NULL;
        $body = "";
        $active = 0;
    }
    $active = ($active == 0 ) ? "checked" : "";
    ?>

    <div id="create-stories">
        <h1 class="titles">CREATE STORIES</h1>
        <a href="./stories.php" class="form-back-btn">Back</a>
        <form action="crud/stories_crud.php" method="post" class="mx-auto md:w-11/12 text-sm">
            <div class="form-components">
                <label for="title">Title : </label>
                <input type="text" id="title" name="title" value="<?= $title ?>" required>
            </div>
            <div class="form-components">
                <label for="episode">Episode : </label>
                <input type="number" id="episode" name="episode" value="<?= $episode ?>" required>
            </div>
            <div class="form-components">
                <label for="body">Body : </label>
                <textarea name="body" id="body" cols="30" rows="10" required><?= $body ?></textarea>
            </div>
            <div class="form-components">
                <label for="active">Active : </label>
                <input type="checkbox" class="checkbox-input" name="active" id="active" <?= $active ?>>
            </div>
            <input type="submit" value="Create" name="createstories" class="cu-btn">
        </form>
    </div

<?php } ?>