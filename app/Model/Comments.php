<?php

require_once('DatabaseRepository.php');

class Comments implements DatabaseRepository
{
    private readonly Database $db;
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    function getAll(){}

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
    
    function post(){}
    function update($id){}
    function delete($id){}
}