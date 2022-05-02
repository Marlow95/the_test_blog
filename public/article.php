<?php require_once(__DIR__ . "/reusables/header.php") ?>
<?php require_once(__DIR__ . "/reusables/navbar.php") ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="mt-4 p-4 rounded text-white" 
            style="background-color: #2E4172;">
            <?php renderArticle(); ?>
            </div>
            
        </div>

        <div class="col-4 mt-4">
            <h2>Categories</h2>
            <?php renderCategories(); ?>
        </div>

        <div class="col-8 mt-4 border bg-light text-dark">
            <h1 class="m-4">Post A Comment</h1>
            <form method="post">
                <div class="form-group m-4 row">
                    <label for="title_comment" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="title_comment" name="title_comment" placeholder="Title">
                    </div>
                </div>
                <div class="form-group m-4 row">
                    <label for="body_comment" class="col-sm-2 col-form-label">Comment</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="body_comment" name="body_comment" placeholder="Leave A Comment">
                    </div>
                </div>
                <div class="form-group m-4 row">
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group m-4 row">
                    <div class="col-sm-10">
                    <button type="submit" name="submit_contact" class="btn btn-outline-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col mt-4">
            <?php renderComments(); ?>
        </div>
    </div>
    
</div>

</div>

<?php require_once(__DIR__ . "/reusables/footer.php") ?>