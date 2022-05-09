<?php
require_once(__DIR__ . '/bootstrap.php');

//Renders posts on index.php
function renderPosts(){
    global $db;
    $blog_posts = new Posts($db);
    $get_all_posts = $blog_posts->getAll();

    foreach($get_all_posts as $posts){
        $card = <<<DELIMITER
        <div class="col-3 mt-4 p-4">
            <div class="front-card card m-3">
                <img class="card-img-top" src="https://placehold.co/250x250" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title"><a href="article.php?id=$posts->post_id&author=$posts->user_id">$posts->post_title</a></h3>
                    <p class="card-text">$posts->post_bio</p>
                    <a class="btn btn-lg btn-success" 
                    href="article.php?id=$posts->post_id&author=$posts->user_id">Read More</a>
                </div>
            </div>
        </div>   
        DELIMITER;

        echo $card;
    };
}

function renderArticle(){
    global $db;
    $response = $_GET['id'];
    $filter = filter_var($response, FILTER_SANITIZE_NUMBER_INT);
    $blog_article = new Posts($db);
    $get_article = $blog_article->getOne($filter);

    foreach($get_article as $posts){
        $card = <<<DELIMITER
        <article class="p-4">
            <h2>$posts->post_title</h2>
            <hr>
            <nav aria-label="breadcrumb">
                <div class="justify-content-start">
                    <em><img src="../public/img/rating.png"> Rating $posts->post_rating</em>
                </div>
                <em>
                <ol class="breadcrumb justify-content-end" style="position: relative; bottom: 2.3em;">
                    <li class="breadcrumb-item"><a href="post.php">Blog Posts</a></li>
                    <li class="breadcrumb-item active" aria-current="page">$posts->post_title</li>
                </ol>
                </em>
            </nav>
            <p>$posts->post_body</p>
        </article>
        DELIMITER;
        echo $card;
    };

}

function articleAuthor(){
    global $db;
    $response = $_GET['author'];
    $filter = filter_var($response, FILTER_SANITIZE_NUMBER_INT);
    $user = new Users($db);
    $article_author = $user->getOne($filter);
    
    foreach($article_author as $author){
        $card = <<<DELIMITER
        <div class="p-4">
            <h2>Author of This Post</h2>
            <p>$author->firstname $author->lastname</p>
        </div>
        DELIMITER;
        echo ucwords($card);
    };
}

//Prints all posts on the post page
function renderPostPage(){
    global $db;
    $blog_posts = new Posts($db);
    $get_all_posts = $blog_posts->getAll();

    foreach($get_all_posts as $posts){
        $card = <<<DELIMITER
            <div class="col">
                <div class="card mb-3 mt-3">
                    <img src="https://placehold.co/300x150/png" height="300px" class="card-img-top" alt="...">
                    <div class="card-body rounded text-white" style="background-color:#3F5AA0;">
                    <h4 class="card-title">
                        <a class="card-title text-white" 
                        href="article.php?id=$posts->post_id&author=$posts->user_id">
                            $posts->post_title
                        </a>
                    </h4>
                    <hr>
                    <p class="card-text">$posts->post_bio</p>
                    <p class="card-text">
                    <small class="text-white">
                        <img src="../public/img/rating.png" alt="star"> <strong><em>Ratings: $posts->post_rating | $posts->created_at</em></strong>
                    </small>
                    </p>
                    </div>
                </div>
            </div>
        DELIMITER;
        echo $card;
    }
}

function signupMessage(){
    $msg = '<h3> Account Created </h3>';
    echo $msg;
    header('Location: success.php');
}

function signupUsers($email, $firstname, $lastname, $username, $password){
    global $db;
    $users = new Users($db);
    $post_user = $users->postUsers($email, $firstname, $lastname, $username, $password);
    signupMessage();
    return $post_user;
}

function loginUsers($email, $password){
    global $db;
    $users = new Users($db);
    $login_user = $users->loginUsers($email, $password);
    return $login_user;
}


function renderCategories(){
    global $db;
    $blog_categories = new Categories($db);
    $get_all_categories = $blog_categories->getAll();

    foreach($get_all_categories as $category){

        $tabs = <<<DELIMITER
        <ul class="list-group">
        <li class="list-group-item"><a href="category.php?category_id=$category->category_id">$category->category_title</a></li>
        </ul>
        DELIMITER;

        echo $tabs;

    }
}


function renderComments(){

    global $db;
    $response = $_GET['id'];
    $filter = filter_var($response, FILTER_SANITIZE_NUMBER_INT);
    $comments = new Comments($db);
    $article_comments = $comments->getOne($filter);

    foreach($article_comments as $post_comments){

        $find_user = findUser(ucwords($post_comments->user_id));

        $card = <<<DELIMITER
        <div class="card mb-4" style="width: 880px;">
            <h5 class="card-header">Comment By: $find_user</h5>
            <div class="card-body">
                <h5 class="card-title">$post_comments->comment_title</h5>
                <p class="card-text">$post_comments->comment_body</p>
        DELIMITER;

        echo $card;

        if(isset($_SESSION['user_id'])){
            if($_SESSION['user_id'] === $post_comments->user_id){
                echo '<a href="#" class="btn btn-success">Edit</a>' . 
                ' <a href="#" class="btn btn-danger">Delete</a>';
            }
        }

        $card2 = <<<DELIMITER
            </div>
        </div>
        DELIMITER;
        echo $card2;

    }

}

function findUser($find_user){
    global $db;
    $users = new Users($db);
    $get_user = $users->getOne($find_user);

    foreach($get_user as $user){
        return $user->firstname;
    }
}

function postComments($title, $body, $created_at, $user_id, $post_id){
    global $db;
    $comments = new Comments($db);
    $comment = $comments->post($title, $body, $created_at, $user_id, $post_id);
    return $comment;
}


function categoriesThatMatchPosts($id){
    global $db;
    $filter = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    $blog_posts = new Posts($db);
    $get_all_posts = $blog_posts->getAll();

    foreach($get_all_posts as $posts){

        
        if($posts->category_id == $filter){

            $card = <<<DELIMITER
            <div class="col-3">
                <div class="card mt-4" style="width: 18rem;">
                    <img class="card-img-top" src="https://placehold.co/250x250" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title"><a href="article.php?id=$posts->post_id&author=$posts->user_id">$posts->post_title</a></h3>
                        <p class="card-text">$posts->post_bio</p>
                        <a class="btn btn-primary" 
                        href="article.php?id=$posts->post_id&author=$posts->user_id">Read More</a>
                    </div>
                </div>  
            </div> 
            DELIMITER;

            echo $card;
        }
        
    

    }
}

function search($search){
    global $db;
    $blog_posts = new Posts($db);
    $search_posts = $blog_posts->search($search);

    foreach($search_posts as $posts){
        $results = <<<DELIMITER
        <ul class="list-group">
            <a class="list-group-item" href="article.php?id=$posts->post_id&author=$posts->user_id">$posts->post_title</a>
        </ul>
        DELIMITER;
        echo $results;
    }
}
