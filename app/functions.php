<?php
require_once(__DIR__ . '/bootstrap.php');

//Renders posts on index.php
function renderPosts(){
    global $db;
    $blog_posts = new Posts($db);
    $get_all_posts = $blog_posts->getAll();

    foreach($get_all_posts as $posts){
        $card = <<<DELIMITER
        <div class="card m-4" style="width: 18rem;">
            <img class="card-img-top" src="https://placehold.co/250x250" alt="Card image cap">
            <div class="card-body">
                <h3 class="card-title">$posts->post_title</h3>
                <p class="card-text">$posts->post_bio</p>
                <a class="btn btn-primary" 
                href="article.php?id=$posts->post_id&author=$posts->user_id">Read More</a>
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
        <div class="card">
        <h5 class="card-header">Author</h5>
        <div class="card-body">
        <p class="card-text">$author->firstname $author->lastname</p>
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
            <div class="card mb-3 m-4">
                <img src="https://placehold.co/300x150/png" height="300px" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title text-center"><a href="article.php?id=$posts->post_id&author=$posts->user_id">$posts->post_title</a></h5>
                <p class="card-text">$posts->post_bio</p>
                <p class="card-text"><small class="text-muted">$posts->created_at</small></p>
                </div>
            </div>
        DELIMITER;
        echo $card;
    }
}

/*

function renderOneCategories(){
    global $db;
    $blog_categories = new Categories($db);
    $get_all_categories = $blog_categories->getOne();

    foreach($get_all_categories as $category){

        $tabs = <<<DELIMITER

        DELIMITER;

        echo $tabs;

    }
}

*/
