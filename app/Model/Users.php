<?php
require_once('DatabaseRepository.php');

class Users implements DatabaseRepository
{
    private readonly Database $db;
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    function getAll()
    {
        try{

        $users = $this->db->pdo->query('SELECT * FROM users');

        } catch(Exception $e){
            $e = "Sorry, I can't get the users data";
            echo $e;
            exit;
        }

        $users_data = $users->fetchAll(PDO::FETCH_OBJ);
        return $users_data;
    }

    function getOne($id)
    {
        try{

            $users = $this->db->pdo->prepare('SELECT * FROM users WHERE users.id = ?');
            $users->bindParam(1, $id);
            $users->execute();
    
        } catch(Exception $e){
            $e = "Sorry, I can't get this user";
            echo $e;
            exit;
        }

        $users_data = $users->fetchAll(PDO::FETCH_OBJ);
        return $users_data;
    }

    function post()
    {

    }

    function update($id)
    {

    }

    function delete($id)
    {

    }
}
