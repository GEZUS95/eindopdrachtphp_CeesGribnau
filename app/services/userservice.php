<?php

namespace Services;

use Models\User;
use PDOException;
use Repositories\UserRepository;

class UserService
{
    private UserRepository $repository;

    function __construct()
    {
        $this->repository = new UserRepository;
    }

    public function getOneUser(string $email)
    {
        return $this->repository->getOne($email);
    }

    public function checkPassword($email, $pass)
    {
        try {
            // get the user from db
            $user = $this->repository->getOne($email);

            // verify if the password matches the hash in the database
            $result = password_verify($pass, $user->password);

            if (!$result)
                return false;

            // do not pass the password hash to the caller
            $user->password = "";

            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
        return false;
    }

    public function userExists($email)
    {
        if($this->repository->getOne($email) != false) return true;
    }

    public function insertOne(User $user)
    {
        $this->repository->insertOne($user);
    }

}