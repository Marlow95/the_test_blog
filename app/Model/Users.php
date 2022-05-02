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

    function loginUsers($email, $password){

        try{

            $users = $this->db->pdo->prepare('SELECT * FROM users WHERE email = ?');
            $users->bindParam(1, $email);
            $users->execute();

        }catch(Exception $e){

            $e = "Sorry, this user can't be found";
            echo $e;
            exit;

        }
        
        $users_data = $users->fetchAll(PDO::FETCH_OBJ);

        foreach($users_data as $user){
            if(password_verify($password, $user->password)){
                $_SESSION['is_logged_in'] = true;
                return header('Location: dashboard.php');
            } else {

                header('Location: login.php');
                return $_SESSION['failed_login'] = "Incorrect password";
            }
        }
    }

    function postUsers($email, $firstname, $lastname, $username, $password)
    {
        try{
            $id = null;
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $enum = 'Basic';
            $user_bio = '';
            $timestamp = date("Y/m/d h:i:s");

            $users = $this->db->pdo->prepare('INSERT INTO users (id, firstname, lastname, email, username, password, user_bio, role, created_at, last_login) VALUES (?,?, ?, ?, ?, ?, ?,?, ?,?)');
            $users->bindParam(1, $id);
            $users->bindParam(2, $firstname);
            $users->bindParam(3, $lastname);
            $users->bindParam(4, $email);
            $users->bindParam(5, $username);
            $users->bindParam(6, $hash);
            $users->bindParam(7, $user_bio);
            $users->bindParam(8, $enum);
            $users->bindParam(9, $timestamp);
            $users->bindParam(10, $timestamp);
            $users->execute();
        }catch(Exception $e){

            $e = "Sorry, I can't create this user";
            echo $e;
            exit;

        }
    }

    function update($id)
    {

    }

    function delete($id)
    {

    }
}
