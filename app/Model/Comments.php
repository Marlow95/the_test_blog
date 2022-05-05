<?php

require_once('DatabaseRepository.php');

class Comments implements DatabaseRepository
{
    private readonly Database $db;
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    function getAll(){

        try{

            $comments = $this->db->pdo->query('SELECT * FROM comments');
    
        } catch(Exception $e){
            $e = "Sorry, I can't get the comments data";
            echo $e;
            exit;
        }
    
        $comments_data = $comments->fetchAll(PDO::FETCH_OBJ);
        return $comments_data;
    }

    function getOne($id){

        try{
        $comments = $this->db->pdo->prepare('SELECT * FROM comments WHERE post_id = ?');
        $comments->bindParam(1, $id);
        $comments->execute();

        } catch(Exception $e){
            $e = "Sorry, I can't get the comments data";
            echo $e;
            exit;
        }

        $comments_data = $comments->fetchAll(PDO::FETCH_OBJ);
        return $comments_data;
    }
    
    function post($title, $body, $created_at, $user_id, $post_id){

        try {
            $comment_id = null;
            $comments = $this->db->pdo->prepare('INSERT INTO comments (comment_id, comment_title, comment_body, created_at, user_id, post_id) 
            VALUES (?, ?, ?, ?, ?, ?)');
            $comments->bindParam(1, $comment_id);
            $comments->bindParam(2, $title);
            $comments->bindParam(3, $body);
            $comments->bindParam(4, $created_at);
            $comments->bindParam(5, $user_id);
            $comments->bindParam(6, $post_id);
            $comments->execute();

        }catch(PDOException $e){
            //$e = "Sorry, I can't post this comment";
            echo $e;
            exit;
        }
    }
    function update($comment_title, $comment_body, $comment_id, $user_id){
        try{
            $comments = $this->db->pdo->prepare('UPDATE comments SET comment_title = ?, comment_body = ? WHERE comment_id = ? AND user_id = ?');
            $comments->bindParam(1, $comment_title);
            $comments->bindParam(2, $comment_body);
            $comments->bindParam(3, $comment_id);
            $comments->bindParam(4, $user_id);
            $comments->execute();
    
        } catch(Exception $e){
            $e = "Sorry, I can't get the comments data";
            echo $e;
            exit;
        }

        $_SESSION['update_comment_success'] = "You have successfully updated your comment";
        $comments_data = $comments->fetchAll(PDO::FETCH_OBJ);
        return $comments_data;
    }

    function delete($id, $user_id){
        try{
            $comments = $this->db->pdo->prepare('DELETE FROM comments WHERE comment_id = ? AND user_id = ?');
            $comments->bindParam(1, $id);
            $comments->bindParam(2, $user_id);
            $comments->execute();
    
        } catch(Exception $e){
            $e = "Sorry, I can't delete the comments data";
            echo $e;
            exit;
        }

        $_SESSION['delete_comment_success'] = "You have successfully deleted your comment";
        $comments_data = $comments->fetchAll(PDO::FETCH_OBJ);
        return $comments_data;
    }
}