<?php require_once(__DIR__ . "/reusables/header.php") ?>
<?php require_once(__DIR__ . "/reusables/navbar.php") ?>

<h1 class="m-4">Do you want to <span class="text-danger">DELETE YOUR ACCOUNT?</span></h1>

<form class="m-4" method="post">
    <button type="submit" name="permenent_delete" class="btn btn-danger">Yes</button>
    <button type="submit" name="stop_delete" class="btn btn-success">No</button>
</form>


<?php 
    if(isset($_POST['stop_delete'])){
        header('Location: settings_dashboard.php');
        exit;
    }
    if(isset($_POST['permenent_delete'])){
        deleteAccountPermenantly(null, $_SESSION['user_id']);
        header('Location: account_delete_success.php');
        session_destroy();
        exit;
    }
?>


<?php require_once(__DIR__ . "/reusables/footer.php") ?>

