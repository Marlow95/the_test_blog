<?php
require_once('app/DatabaseRepository.php');

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
            echo "I can't get the users data";
            exit;
        }

        $users_data = $users->fetchAll(PDO::FETCH_OBJ);

        foreach($users_data as $all_users){
            echo <<<DELIMITER
            $all_users->username
            $all_users->email
            DELIMITER;
        }
    }

    function getOne()
    {

    }

    function post()
    {

    }

    function update()
    {

    }

    function delete()
    {

    }
}
