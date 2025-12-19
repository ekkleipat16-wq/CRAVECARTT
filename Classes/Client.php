<?php
require_once('Connection.php');


class Users extends Dbh
{

      public function signup($email, $hashed_password)
    {
        
        $search = $this->connect()->prepare('SELECT username FROM user WHERE username = ?');
        
        $search->bind_param('s', $email);
        $search->execute();
        $search->store_result();
        if ($search->num_rows > 0) {
            return 3;
        }

        $stmt = $this->connect()->prepare("INSERT INTO user (username, password, date_created, status) VALUES (?,?, CURRENT_TIMESTAMP(), 'active')");
        
        $stmt->bind_param('ss', $email, $hashed_password);
        $result = $stmt->execute();

        if ($result) {
            return 1;
        } else {
            return 2;
        }

        return $result;
 
 
    }


   public function login($email, $password)
{
    session_start();

    $stmt = $this->connect()->prepare("SELECT user_id, username, password FROM user WHERE username = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {

          
            $_SESSION['user_id'] = (int)$row['user_id'];
            $_SESSION['username'] = $row['username'];

         
            if ($_SESSION['user_id'] === 5) {
                return '../public/admin/home.php';
            } else {
                return '../public/client/home.php';
            }

        } else {
            return 9; 
        }

    } else {
        return 8; 
    }
}



 }
