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
                    <a href="#" class="btn btn-success">Edit</a>
                    <a href="#" class="btn btn-danger">Delete</a>
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
            $curr_posts = <<<DELIMITER
            <div class="col mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">$posts->post_title</h5>
                        <p class="card-text">$posts->post_bio</p>
                        <a href="#" class="btn btn-success">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
            DELIMITER;

            echo $curr_posts;
        } 
    }
}