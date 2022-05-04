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
            <li class="list-group-item active" aria-current="true"><a class="text-white" href="posts_dashboard.php">Posts</a></li>
            <li class="list-group-item"><a href="comments_dashboard.php">Comments</a></li>
            <li class="list-group-item"><a href="settings_dashboard.php">Settings</a></li>
        </ul>
    </div>
    <?php 
    $post_title = isset($_POST['post_title']) ? htmlspecialchars($_POST['post_title']) : '' ;
    $post_bio = isset($_POST['post_bio']) ? htmlspecialchars($_POST['post_bio']) : '' ;
    $post_category = isset($_POST['post_category']) ? htmlspecialchars($_POST['post_category']) : '' ;
    $post_body = isset($_POST['post_body']) ? htmlspecialchars($_POST['post_body']) : '' ;
    ?>
    <div class="col-10">
        <div class="row row-col-2">
            <div class="col">
                <h1 class="mt-4">Your Current Blog Posts</h1>
                <?php postsMadeByUser();?>
            </div>

            <div class="col m-4 border">
                    <h1 class="m-4">Make a Blog Post</h1>
                    <form method="post">
                        <p class="m-4 text-muted">The title of your post</p>
                        <div class="form-group m-4 row">
                            <label for="post_title" class="col-sm-2 col-form-label">Title</label>
                            <br>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="post_title" name="post_title" value="<?php $post_title ?>" placeholder="Title">
                            </div>
                        </div>
                        <span class="m-4 text-muted">A short 2-3 sentence bio about your post</span>
                        <div class="form-group m-4 row">
                            <label for="post_bio" class="col-sm-2 col-form-label">Bio</label>
                            <br>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="post_bio" name="post_bio" value="<?php $post_bio ?>" placeholder="Bio">
                            </div>
                        </div>
                        <p class="m-4 text-muted">The category of your post</p>
                        <div class="input-group m-4 ">
                            <select class="custom-select" id="inputGroupSelect02" name="post_category" value="<?php $post_category ?>">
                                <option selected>Choose...</option>
                                <option value="1">Digital Marketing</option>
                                <option value="2">Leadership</option>
                            </select>
                            <div class="input-group-append">
                                <label class="input-group-text" for="inputGroupSelect02">Options</label>
                            </div>
                        </div>
                        <div class="form-group m-4 row">
                            <textarea name="post_body" value="<?php $post_body ?>" id="post_body" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group m-4 row">
                            <div class="col-sm-10">
                            <button type="submit" name="submit_post" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        <?php 
                            $user_id = $_SESSION['user_id'];
                            if(isset($_POST['submit_post'])){
                                postBlogPost($post_title, $post_bio, $post_body, $user_id, $post_category);
                                header('posts_dashboard.php');
                                echo isset($_SESSION['blog_post_success']) ? $_SESSION['blog_post_success'] : '';
                            }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?php require_once(__DIR__ . "/reusables/footer.php") ?>
<?php }; ?>