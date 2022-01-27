<?php
require __DIR__ . '/../repositories/userrepository.php';
require __DIR__ . '/../repositories/companyrepository.php';

class registerservice {

    private userrepository $repository;

    public function __construct()
    {
        $this->repository = new userrepository();
    }

    public function createUser(user $user){
        $this->repository->insertOne($user);
    }

    public function userExists($email)
    {
        if($this->repository->getOne($email) != false) { return true;}
    }

    public function companyExists($email1)
    {
    }
}