<?php

require_once(__DIR__ . '/bootstrap.php');

function commentsThatBelongToUser($id){

    global $db;
    $comments= new Comments($db);
    $get_all_comments = $comments->getAll();

    foreach($get_all_comments as $comments){

        
        if($comments->user_id == $id){

            $card = <<<DELIMITER
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">$comments->comment_title</h5>
                    <p class="card-text">$comments->comment_body</p>
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#editCommentModal$comments->comment_id">Edit</a>
                    <a href="delete_comment.php?delete_comment_id=$comments->comment_id&delete_comment_user_id=$comments->user_id" class="btn btn-danger">Delete</a>

                    <div class="modal fade" id="editCommentModal$comments->comment_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editCommentModalLabel">Edit Your Comment</h5>
                            <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post">
                                <div class="form-group m-4">
                                    <label hidden for="edit_comment_id" class="col-sm-2 col-form-label">ID</label>
                                    <div class="col-sm-10">
                                    <input hidden type="text" class="form-control" id="edit_comment_id" name="edit_comment_id" 
                                    value="$comments->comment_id" placeholder="ID">
                                    </div>
                                </div>
                                <div class="form-group m-4">
                                    <label for="edit_title_comment" class="col-sm-2 col-form-label">Title</label>
                                    <br>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="edit_title_comment" name="edit_title_comment" 
                                    value="$comments->comment_title" placeholder="Title">
                                    </div>
                                </div>
                                <span class="m-4 text-muted">Your comment message</span>
                                <div class="form-group m-4 row">
                                    <textarea name="edit_body_comment" id="edit_body_comment" cols="30" rows="10">$comments->comment_body</textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="edit_comment_submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            DELIMITER;

            echo $card;
        }
    }
}


function postBlogPost($title, $bio, $body, $user_id, $category){
    global $db;
    $blog_post = new Posts($db);
    $post_blog_post = $blog_post->post($title, $bio, $body, $user_id, $category);
    return $post_blog_post;
}


function postsMadeByUser(){
    global $db;
    $blog_post = new Posts($db);
    $blog_posts_by_user = $blog_post->getAll();

    foreach($blog_posts_by_user as $posts){
        if($posts->user_id == $_SESSION['user_id']){
            $post_title = htmlspecialchars($posts->post_title);
            $post_bio = htmlspecialchars($posts->post_bio);
            $post_body = htmlspecialchars($posts->post_body);

            $curr_posts = <<<DELIMITER
            <div class="col mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">$posts->post_title</h5>
                        <p class="card-text">$posts->post_bio</p>
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#editModal$posts->post_id">Edit</a>
                        <a href="delete_post.php?delete_post_id=$posts->post_id&delete_user_id=$posts->user_id" class="btn btn-danger">Delete</a>

                        <div class="modal fade" id="editModal$posts->post_id" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Update Your Blog Post</h5>
                                <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form method="post">
                                <div class="form-group m-4 row">
                                <label hidden for="edit_post_id" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                <input hidden type="text" class="form-control" id="edit_post_id" value="$posts->post_id" name="edit_post_id" placeholder="PostID">
                                </div>

                                </div>
                                <div class="form-group m-4 row">
                                    <label for="edit_post_title" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="edit_post_title" value="$post_title" name="edit_post_title" placeholder="Title">
                                    </div>
                                </div>
                                <div class="form-group m-4 row">
                                    <label for="edit_post_bio" class="col-sm-2 col-form-label">Bio</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="edit_post_bio" name="edit_post_bio" value="$post_bio" placeholder="Bio">
                                    </div>
                                </div>
                                <p class="m-4 text-muted">The category of your post</p>
                                <div class="input-group m-4 ">
                                    <select class="custom-select" id="inputGroupSelect02" name="edit_post_category">
                                        <option selected value="$posts->category_id">Default...</option>
                                        <option value="1">Digital Marketing</option>
                                        <option value="2">Leadership</option>
                                    </select>
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                    </div>
                                </div>
                                <div class="form-group m-4 row">
                                    <textarea name="edit_post_body" id="edit_post_body" cols="30" rows="10">$post_body</textarea>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="edit_post_submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            DELIMITER;

            echo $curr_posts;
        } 
    
    }
}

function letUserUpdateTheirProfile($id, $firstname, $lastname, $email, $user_bio){
    global $db;
    $update_user = new Users($db);
    $update_user_now = $update_user->update($id, $firstname, $lastname, $email, $user_bio);
    return $update_user_now;
}

function getLoggedInUserData(){
    global $db;
    $user = new Users($db);
    $get_user = $user->getOne($_SESSION['user_id']);
    return $get_user;
}

function updateThisUsersBlogPost($id, $post_title, $post_bio, $post_body, $category_id, $post_id){
    global $db;
    $post = new Posts($db);
    $update_post = $post->update($id, $post_title, $post_bio, $post_body, $category_id, $post_id);
    return $update_post;
}

function updateThisUsersComment($comment_title, $comment_body, $comment_id, $user_id){
    global $db;
    $comment = new Comments($db);
    $update_comment = $comment->update($comment_title, $comment_body, $comment_id, $user_id);
    return $update_comment;
}

function deleteSelectedBlogPost($id, $user_id){
    global $db;
    $post = new Posts($db);
    $delete_post = $post->delete($id, $user_id);
    return $delete_post;
}

function deleteSelectedComment($id, $user_id){
    global $db;
    $comment = new Comments($db);
    $delete_comment = $comment->delete($id, $user_id);
    return $delete_comment;
}

function deleteAccountPermenantly($id, $user_id){
    global $db;
    $user = new Users($db);
    $delete_user = $user->delete($id, $user_id);
    return $delete_user;
}