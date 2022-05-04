<?php

require_once('DatabaseRepository.php');

class Posts implements DatabaseRepository
{
    private readonly Database $db;
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    function getAll()
    {
        try{

        $posts = $this->db->pdo->query('SELECT * FROM posts');

        } catch(Exception $e){
            $e = "Sorry, I can't get the users data";
            echo $e;
            exit;
        }

        $posts_data = $posts->fetchAll(PDO::FETCH_OBJ);
        return $posts_data;
    }

    function getOne($id)
    {
        try{

        $posts = $this->db->pdo->prepare('SELECT * FROM posts WHERE post_id = ?');
        $posts->bindParam(1, $id);
        $posts->execute();

        } catch(Exception $e){
            $e = "Sorry, I can't get the users data";
            echo $e;
            exit;
        }

        $posts_data = $posts->fetchAll(PDO::FETCH_OBJ);
        return $posts_data;
    }

    function post($title, $bio, $body, $user_id, $category){

        $id = null;
        $date = date('Y/m/d');
        $rating = 0;

        try{

            $posts = $this->db->pdo->prepare('INSERT INTO posts (post_id, post_title, post_bio,
             post_rating, post_body, user_id, category_id, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
            $posts->bindParam(1, $id);
            $posts->bindParam(2, $title);
            $posts->bindParam(3, $bio);
            $posts->bindParam(4, $rating);
            $posts->bindParam(5, $body);
            $posts->bindParam(6, $user_id);
            $posts->bindParam(7, $category);
            $posts->bindParam(8, $date);
            $posts->execute();

        } catch(Exception $e){
            $e = "Sorry, I can't post this blog post";
            echo $e;
            exit;
        }

        $_SESSION['blog_post_success'] = 'Your post has been submitted';
        $posts_data = $posts->fetchAll(PDO::FETCH_OBJ);
        return $posts_data;
    }

    function update($id){}
    function delete($id){}
}