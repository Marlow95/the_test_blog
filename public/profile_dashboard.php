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
            <li class="list-group-item active" aria-current="true"><a class="text-white" href="profile_dashboard.php">Profile</a></li>
            <li class="list-group-item"><a href="posts_dashboard.php">Posts</a></li>
            <li class="list-group-item"><a href="comments_dashboard.php">Comments</a></li>
            <li class="list-group-item"><a href="settings_dashboard.php">Settings</a></li>
        </ul>
    </div>

    <div class="col-10">
        <div class="col m-4 border">
            <h1 class="m-4">Profile</h1>
            <?php
                $find_user = getLoggedInUserData();
                foreach($find_user as $user){
            ?>
            <form method="post">
                <div class="form-group m-4 row">
                    <label for="firstname_user" class="col-sm-2 col-form-label">Firstname</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="firstname_user" name="firstname_user"
                     value="<?php echo $user->firstname; ?>" placeholder="Firstname">
                    </div>
                </div>
                
                <div class="form-group m-4 row">
                    <label for="lastname_user" class="col-sm-2 col-form-label">Lastname</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="lastname_user" name="lastname_user" 
                    value="<?php echo $user->lastname; ?>" placeholder="Lastname">
                    </div>
                </div>
        
                <div class="form-group m-4 row">
                    <label for="email_user" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="email" class="form-control" id="email_user" name="email_user" 
                    value="<?php echo $user->email; ?>" placeholder="Email">
                    </div>
                </div>
                <hr>
                <div class="form-group m-4 row">
                    <label for="user_bio_user" class="col-sm-2 col-form-label">User Bio</label>
                    <textarea name="user_bio_user" id="user_bio_user" cols="30" rows="10"></textarea>
                </div>
                <?php } ?>

                <div class="form-group m-4 row">
                    <div class="col-sm-10">
                    <button type="submit" name="submit_user" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>

            <?php 
                $firstname_user = isset($_POST['firstname_user']) ? htmlspecialchars($_POST['firstname_user']) : '';
                $lastname_user = isset($_POST['lastname_user']) ? htmlspecialchars($_POST['lastname_user']) : '';
                $email_user = isset($_POST['email_user']) ? htmlspecialchars($_POST['email_user']) : '';
                $user_bio_user = isset($_POST['user_bio_user']) ? htmlspecialchars($_POST['user_bio_user']) : '';

                if(isset($_POST['submit_user'])){
                    letUserUpdateTheirProfile($_SESSION['user_id'], $firstname_user, $lastname_user, $email_user, $user_bio_user);
                    header('Location: profile_dashboard.php');
                    exit;
                }

                if(isset($_SESSION['user_update'])){
                    echo $_SESSION['user_update'];
                    unset($_SESSION['user_update']);
                }
            ?>
        
        </div>

    </div>

</div>

<?php require_once(__DIR__ . "/reusables/footer.php") ?>
<?php }; ?>