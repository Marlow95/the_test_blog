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
<div class="container m-4">
    <div class="row">

        <div class="col-2 p-4">
            <ul class="list-group">
                <li class="list-group-item active" aria-current="true">Home</li>
                <li class="list-group-item"><a href="profile_dashboard.php">Profile</a></li>
                <li class="list-group-item"><a href="posts_dashboard.php">Posts</a></li>
                <li class="list-group-item"><a href="comments_dashboard.php">Comments</a></li>
                <li class="list-group-item"><a href="settings_dashboard.php">Settings</a></li>
            </ul>
        </div>

        <div class="col-10">
            <h1 class="m-2 p-1">Hello <?php echo isset($_SESSION['firstname']) ? ucwords($_SESSION['firstname']) : ''; ?></h1>
            <hr>
            <?php
                $find_user = getLoggedInUserData();

                foreach($find_user as $user){

                    $bio = <<<DELIMITER
                        <p class="m-4">$user->user_bio</p>
                    DELIMITER;
                    
                    echo $bio;
                }
            ?>
        </div>

    </div>
</div>

<?php require_once(__DIR__ . "/reusables/footer.php") ?>
<?php }; ?>
