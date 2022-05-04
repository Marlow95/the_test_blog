<?php require_once(__DIR__ . "/reusables/header.php") ?>
<?php require_once(__DIR__ . "/reusables/navbar.php") ?>
<?php 
//Not a production level version for auth. You should use $_SERVER or a depency for real authentication
//I will add a dependency later this is just for practice...
if (!isset($_SESSION['user_id'])) {
    header("HTTP/1.0 401 Unauthorized");
    print '<h1 class="m-4 text-center">Sorry - you need valid credentials to be granted access to this private area!</h1>';
    exit;
} else { ?>

<div class="row">

    <div class="col-2 p-4">
        <ul class="list-group">
            <li class="list-group-item"><a href="dashboard.php">Home</a></li>
            <li class="list-group-item"><a href="profile_dashboard.php">Profile</a></li>
            <li class="list-group-item"><a href="posts_dashboard.php">Posts</a></li>
            <li class="list-group-item"><a href="comments_dashboard.php">Comments</a></li>
            <li class="list-group-item active" aria-current="true"><a class="text-white" href="settings_dashboard.php">Settings</a></li>
        </ul>
    </div>

    <div class="col-10">

    </div>

</div>

<?php require_once(__DIR__ . "/reusables/footer.php") ?>
<?php }; ?>