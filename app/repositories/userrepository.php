<?php

namespace Repositories;

use Models\User;

require __DIR__ . '/repository.php';
require __DIR__ . '/../models/user.php';

class UserRepository extends repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'user');

            return $stmt->fetchAll();

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
        $stmt = $this->connection->prepare("INSERT INTO users (userName, role, email, password, phone) VALUES (:userName, :role ,:email, :password, :phone)");

        $stmt->bindParam(':userName', $user->name);
        $stmt->bindParam(':email', $user->email);
        $stmt->bindParam(':password', $user->password);
        $stmt->bindParam(':phone', $user->phone);
        $stmt->bindParam(':role', $user->role);

        $stmt->execute();
        } catch (PDOException $e){
            echo $e;
        }
    }


}
