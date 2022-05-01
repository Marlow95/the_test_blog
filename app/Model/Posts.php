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
    function post(){}
    function update($id){}
    function delete($id){}
}