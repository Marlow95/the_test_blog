<?php require_once(__DIR__ . "/reusables/header.php") ?>
<?php require_once(__DIR__ . "/reusables/navbar.php") ?>
<div class="container article-page">
    <div class="row">
        <div class="col-8">
            <div class="mt-4 p-4 rounded">
                <?php renderArticle(); ?>
            </div>
        </div>

        <div class="col-4 mt-4">

            <div class="m-4 p-4 signup-sidebar">
                <h2 class="text-center">JOIN OUR <span style="color:#F78989">SENSATIONAL</span> COMMUNITY</h2>
                <form method="post">
                    <div class="form-group m-3 row">
                        <label for="newsletter_email" class="col-sm-2 col-form-label">Email</label>
                        <br>
                        <div class="col-sm-10">
                        <input type="email" class="form-control" id="newsletter_email" name="newsletter_email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group m-3 row">
                        <label for="newsletter_fullname" class="col-sm-2 col-form-label">Fullname</label>
                        <br>
                        <div class="col-sm-10">
                        <input type="fullname" class="form-control" id="newsletter_fullname" name="newsletter_fullname" placeholder="Fullname">
                        </div>
                    </div>
                    <div class="form-group m-3 row">
                        <!--Sidebar breaking problem--->
                        <div class="col-sm-10">
                        <button type="submit" name="newsletter_submit" class="btn text-white" style="background-color: #68A075;">Sign Up</button>
                    </div>
                </div>
                </form>
            </div>

            <div class="categories-sidebar m-4 p-4 text-white">
                <h2 class="text-center">Categories</h2>
                <?php renderCategories(); ?>
            </div>
            <?php articleAuthor(); ?>

        </div>

        <?php
            $title_comment = isset($_POST['title_comment']) ? htmlspecialchars($_POST['title_comment']) : '';
            $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';
        ?>
        
        <div class="col-8 mt-4 border contact text-white">
            
            <h1 class="m-4">Post A Comment</h1>
            <form method="post">
                <div class="form-group m-4 row">
                    <label for="title_comment" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="title_comment" name="title_comment" 
                    value="<?php $title_comment ?>" placeholder="Title">
                    </div>
                </div>

                <div class="form-group m-4 row">
                    <textarea name="message" id="message" value="<?php $message ?>" cols="30" rows="10"></textarea>
                </div>

                <div class="form-group m-4 row">
                    <div class="col-sm-10">
                    <button type="submit" name="submit_contact" class="btn btn-light btn-lg">Submit</button>
                    </div>
                </div>
                <?php 
                    if(isset($_SESSION['comment_error'])){
                        echo '<h3 class="text-danger">' . $_SESSION['comment_error'] . '</h3>';
                        unset($_SESSION['comment_error'] );
                    } 
                ?>
            </form>
        </div>
        <?php

        $id = $_GET['id'];
        $auth_id = $_GET['author'];
        $date = date('Y-m-d');

        $get_id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $author_id = filter_var($auth_id, FILTER_SANITIZE_NUMBER_INT);
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

        if(isset($_POST['submit_contact'])){
            if(isset($_SESSION['user_id'])){
                postComments($title_comment, $message, $date, $user_id, $get_id);
            }
            $_SESSION['comment_error'] = "Only users can post comments";
            header('Location: article.php?id=' . $get_id . "&author=" . $author_id);
            exit;
        }

        ?>
        <div class="col mt-4">
            <?php renderComments(); ?>
        </div>
    </div>
    
</div>

</div>

<?php require_once(__DIR__ . "/reusables/footer.php") ?>