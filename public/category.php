<?php require_once(__DIR__ . "/reusables/header.php") ?>
<?php require_once(__DIR__ . "/reusables/navbar.php") ?>
<div class="container">
    <div class="row row-col-4">
        <?php categoriesThatMatchPosts($_GET['category_id']); ?>
    </div>
</div>
<?php require_once(__DIR__ . "/reusables/footer.php") ?>
