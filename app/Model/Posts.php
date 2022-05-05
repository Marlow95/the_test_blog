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
            $e = "Sorry, I can't get the posts data";
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
            $e = "Sorry, I can't get the posts data";
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

    function update($id, $post_title, $post_bio, $post_body, $category_id, $post_id){
        try{

            $posts = $this->db->pdo->prepare('UPDATE posts SET post_title = ?, post_bio = ?, 
            post_body = ?, category_id  = ? WHERE user_id = ? AND post_id = ?');
            $posts->bindParam(1, $post_title);
            $posts->bindParam(2, $post_bio);
            $posts->bindParam(3, $post_body);
            $posts->bindParam(4, $category_id);
            $posts->bindParam(5, $id);
            $posts->bindParam(6, $post_id);
            $posts->execute();
    
        } catch(Exception $e){
            $e = "Sorry, I can't update the posts data";
            echo $e;
            exit;
        }

        $_SESSION['post_updated_success'] ='Your post has been sucessfully updated';
        $posts_data = $posts->fetchAll(PDO::FETCH_OBJ);
        return $posts_data;
    }

    function delete($id, $user_id){
        try{

            $posts = $this->db->pdo->prepare('DELETE FROM posts WHERE post_id = ? AND user_id = ?');
            $posts->bindParam(1, $id);
            $posts->bindParam(2, $user_id);
            $posts->execute();
    
        } catch(Exception $e){
            $e = "Sorry, I can't delete this post";
            echo $e;
            exit;
        }


        $_SESSION['post_deleted_success'] ='Your post has been sucessfully deleted';
        $posts_data = $posts->fetchAll(PDO::FETCH_OBJ);
        return $posts_data;
    }
}