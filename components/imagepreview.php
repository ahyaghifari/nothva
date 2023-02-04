<?php function imagepreview($src){ ?>
<div id="image-preview" class="w-[100px] flex flex-col mt-5">
    <label>Preview :</label>
    <img src="<?= $src ?>">
</div>
<?php }