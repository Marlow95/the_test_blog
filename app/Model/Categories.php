<?php
require_once('DatabaseRepository.php');
class Categories implements DatabaseRepository
{
    private readonly Database $db;
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    function getAll()
    {
        try{

        $categories = $this->db->pdo->query('SELECT * FROM categories');

        } catch(Exception $e){
            $e = "Sorry, I can't get the categories data";
            echo $e;
            exit;
        }

        $categories_data = $categories->fetchAll(PDO::FETCH_OBJ);
        return $categories_data;
    }

    function getOne($id)
    {
        try{

        $categories = $this->db->pdo->prepare('SELECT * FROM categories WHERE categories_id = ?');
        $categories->bindParam(1, $id);
        $categories->execute();

        } catch(Exception $e){
            $e = "Sorry, I can't get the categoriess data";
            echo $e;
            exit;
        }

        $categories_data = $categories->fetchAll(PDO::FETCH_OBJ);
        return $categories_data;
    }
    function post($email, $firstname, $lastname, $username, $password){}
    function update($id){}
    function delete($id){}
}