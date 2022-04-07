<?php

namespace Services;

use Models\Company;
use Repositories\CompanyRepository;

class companyservice
{
    private companyrepository $repository;

    public function __construct()
    {
        $this->repository = new companyrepository();
    }

    public function updateDescription($id, $description){
        $this->repository->updateDescription($id, $description);
    }

    public function companyExists($email)
    {
        if($this->repository->getOne($email) != false) { return true;}
    }

    public function getAll()
    {
        $this->repository->getAll();
    }

    public function insertOne(company $company)
    {
        $this->repository->insertOne($company);
    }

    public function updatePhotos($id, array $photos)
    {
        $sphotos = json_encode($photos);
        $this->repository->updatePhotos($id, $sphotos);
    }

    public function getOneCompany(string $email)
    {
        return $this->repository->getOne($email);
    }
}