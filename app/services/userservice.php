<?php

require __DIR__ . '/../repositories/userrepository.php';

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
    public function getOneById(int $id)
    {
        return $this->repository->getOneById($id);
    }

    public function userExists($email)
    {
        if ($this->repository->getOne($email) != false) return true;
    }

    public function insertOne(User $user)
    {
        $this->repository->insertOne($user);
    }

    public function updateOne(user $user){
        $this->repository->updateOne($user);
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function deleteOne(int $id)
    {
        $this->repository->deleteOne($id);
    }

}