<?php require_once(__DIR__ . "/reusables/header.php") ?>
<?php require_once(__DIR__ . "/reusables/navbar.php") ?>
<div class="container">
    <div class="col">
        <div class="row text-center m-2 p-4 rounded text-white" 
        style="background-color: #2E4172;">
        <?php renderArticle(); ?>
        </div>
        <?php articleAuthor(); ?>
    </div>
</div>

<?php require_once(__DIR__ . "/reusables/footer.php") ?>