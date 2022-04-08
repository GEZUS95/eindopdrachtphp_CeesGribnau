<?php

require_once __DIR__ . '/../repositories/repository.php';
require_once __DIR__ . '/../models/user.php';

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

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'user');
            return $stmt->fetch();

        } catch (PDOException $e){
            echo $e;
        }
    }

    function insertOne(user $user){
        try{
        $stmt = $this->connection->prepare("INSERT INTO users (name, role, email, password, phone) VALUES (:userName, :role ,:email, :password, :phone)");

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

    public function getOneById(int $id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'user');
            return $stmt->fetch();

        } catch (PDOException $e){
            echo $e;
        }
    }

    function updateOne(user $user){
        try{
            $stmt = $this->connection->prepare("UPDATE users SET name =:name, email = :email, password = :password, phone = :phone WHERE id = :id");

            $stmt->bindParam(':name', $user->name);
            $stmt->bindParam(':email', $user->email);
            $stmt->bindParam(':password', $user->password);
            $stmt->bindParam(':phone', $user->phone);
            $stmt->bindParam(':id', $user->id);


            $stmt->execute();
        } catch (PDOException $e){
            echo $e;
        }
    }

    public function deleteOne(int $id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

}
