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
                <li class="list-group-item"><a href="dashboard.php">Home</a></li>
                <li class="list-group-item"><a href="profile_dashboard.php">Profile</a></li>
                <li class="list-group-item"><a href="posts_dashboard.php">Posts</a></li>
                <li class="list-group-item active" aria-current="true"><a class="text-white" href="comments_dashboard.php">Comments</a></li>
                <li class="list-group-item"><a href="settings_dashboard.php">Settings</a></li>
            </ul>
        </div>

        <div class="col-10 mt-4">
            <h1 class="m-4">Comments You've Made</h1>
            <?php 
                if(isset($_POST['edit_comment_submit'])){
                    updateThisUsersComment(htmlspecialchars($_POST['edit_title_comment']), htmlspecialchars($_POST['edit_body_comment']), 
                    $_POST['edit_comment_id'], $_SESSION['user_id']);
                }
            ?>
            <?php 
                if(isset($_SESSION['update_comment_success'])){
                    echo '<h3>' . $_SESSION['update_comment_success'] . '</h3>';
                    unset($_SESSION['update_comment_success']);
                }
            ?>
            <?php 
                if(isset($_SESSION['delete_comment_success'])){
                    echo '<h3>' . $_SESSION['delete_comment_success'] . '</h3>';
                    unset($_SESSION['delete_comment_success']);
                }
            ?>
            <hr>
            <?php commentsThatBelongToUser($_SESSION['user_id'])?>
        </div>

    </div>

    <?php require_once(__DIR__ . "/reusables/footer.php") ?>
    <?php }; ?>
</div>