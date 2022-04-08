<?php

require __DIR__ . '/../repositories/companyrepository.php';

class companyservice
{
    private companyrepository $repository;

    public function __construct()
    {
        $this->repository = new companyrepository();
    }

    public function companyExists($email)
    {
        if ($this->repository->getOne($email) != false) {
            return true;
        }
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function insertOne(company $company)
    {
        $this->repository->insertOne($company);
    }

    public function getOneCompany(string $email)
    {
        return $this->repository->getOne($email);
    }

    public function getOneById(int $id)
    {
        return $this->repository->getOneById($id);
    }

    function updateOne(company $company){
        $this->repository->updateOne($company);
    }

    public function deleteOne(int $id)
    {
        $this->repository->deleteOne($id);
    }
}