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
                <li class="list-group-item"><a href="comments_dashboard.php">Comments</a></li>
                <li class="list-group-item active" aria-current="true"><a class="text-white" href="settings_dashboard.php">Settings</a></li>
            </ul>
        </div>

        <div class="col-10">
            <div class="col m-4 border">
                <h1 class="m-4">Update Password</h1>
                <form method="post">
                    <div class="form-group m-4 row">
                        <label for="old_password" class="col-sm-2 col-form-label">Current Password</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="old_password" name="old_password" placeholder="Old Password">
                        </div>
                    </div>
                    
                    <div class="form-group m-4 row">
                        <label for="new_password" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password">
                        </div>
                    </div>
            
                    <div class="form-group m-4 row">
                        <label for="new_confirm_password" class="col-sm-2 col-form-label">Confirm New Password</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="new_confirm_password" name="new_confirm_password" placeholder="Confirm New Password">
                        </div>
                    </div>

                    <div class="form-group m-4 row">
                        <div class="col-sm-10">
                        <button type="password" name="submit_new_pass" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
                <?php 
                
                    if(isset($_POST['submit_new_pass'])){
                       header('Location: settings_dashboard.php');
                       updateThisUsersPassword(htmlspecialchars($_POST['old_password']), htmlspecialchars($_POST['new_password']), htmlspecialchars($_POST['new_confirm_password']));
                       exit;
                    }

                    if(isset($_SESSION['user_update_password'])){
                        echo '<h4>' . $_SESSION['user_update_password'] . '</h4>';
                        unset($_SESSION['user_update_password']);
                    }
                ?>
            </div>
            <div class="col m-4">
                <h4>DANGER AREA- THIS IS TO DELETE YOUR ACCOUNT PERMENENTLY</h4>
                <hr>
                <form method="post">
                    <button type="submit" name="delete_account" class="btn btn-danger btn-lg">Delete Account</button>
                </form>
                <?php 
                    if(isset($_POST['delete_account'])){
                        header('location: delete_account.php');
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<?php require_once(__DIR__ . "/reusables/footer.php") ?>
<?php }; ?>