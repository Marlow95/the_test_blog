<?php require_once(__DIR__ . "/reusables/header.php") ?>
<?php require_once(__DIR__ . "/reusables/navbar.php") ?>

<div class="container">
    <div class="row m-4">
        <div class="col text-center m-4">
            <h1>Search Results</h1>
            <?php search($_SESSION['lookup']); ?>
        </div>
    </div>
</div>


<?php require_once(__DIR__ . "/reusables/footer.php") ?>