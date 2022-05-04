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
        <div class="col m-4 border">
            <h1 class="m-4">Update Password</h1>
            <form method="post">
                <div class="form-group m-4 row">
                    <label for="email_contact" class="col-sm-2 col-form-label">Current Password</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" id="email_contact" name="email_contact" placeholder="Old Password">
                    </div>
                </div>
                
                <div class="form-group m-4 row">
                    <label for="fullname_contact" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" id="fullname_contact" name="fullname_contact" placeholder="New Password">
                    </div>
                </div>
        
                <div class="form-group m-4 row">
                    <label for="fullname_contact" class="col-sm-2 col-form-label">Confirm New Password</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" id="fullname_contact" name="fullname_contact" placeholder="New Password">
                    </div>
                </div>

                <div class="form-group m-4 row">
                    <div class="col-sm-10">
                    <button type="submit" name="submit_contact" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        
        </div>
    </div>
</div>

<?php require_once(__DIR__ . "/reusables/footer.php") ?>
<?php }; ?>