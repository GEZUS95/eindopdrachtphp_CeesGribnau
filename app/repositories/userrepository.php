<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/user.php';

class userrepository extends repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'user');
            $articles = $stmt->fetchAll();

            return $articles;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getOne(string $email) {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetch();

        } catch (PDOException $e){
            echo $e;
        }
    }

    function insertOne(user $user){
        try{
        $stmt = $this->connection->prepare("INSERT INTO users (userName, email, password, phone, admin) VALUES (:userName, :email, :password, :phone, :admin)");

        $un = $user->getUserName();
        $mail = $user->getEmail();
        $pas = $user->getPassword();
        $tel = $user->getPhone();
        $admin = $user->isAdmin();

        $stmt->bindParam(':userName', $un);
        $stmt->bindParam(':email', $mail);
        $stmt->bindParam(':password', $pas);
        $stmt->bindParam(':phone', $tel);
        $stmt->bindParam(':admin', $admin);

        $stmt->execute();
        } catch (PDOException $e){
            echo $e;
        }
    }


}
