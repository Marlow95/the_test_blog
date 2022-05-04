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
            <form method="post">
                <div class="form-group m-4 row">
                    <label for="email_contact" class="col-sm-2 col-form-label">Firstname</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="email_contact" name="email_contact" placeholder="Firstname">
                    </div>
                </div>
                
                <div class="form-group m-4 row">
                    <label for="fullname_contact" class="col-sm-2 col-form-label">Lastname</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="fullname_contact" name="fullname_contact" placeholder="Lastname">
                    </div>
                </div>
        
                <div class="form-group m-4 row">
                    <label for="fullname_contact" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="email" class="form-control" id="fullname_contact" name="fullname_contact" placeholder="Email">
                    </div>
                </div>
                <hr>
                <div class="form-group m-4 row">
                    <label for="fullname_contact" class="col-sm-2 col-form-label">User Bio</label>
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
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