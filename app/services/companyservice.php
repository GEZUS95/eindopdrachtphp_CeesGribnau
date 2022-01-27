<?php

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

    public function getOne($email)
    {
        $obj = $this->repository->getOne($email);
        $description = $obj->{'description'};
        $photos = json_decode($obj->{'photos'}, true);
        if ($photos == null) {$photos = array();}
        if ($obj->{'description'} == null) {$description = "";}
        $comp = new company($obj->{'name'}, $obj->{'email'}, $obj->{'password'}, $obj->{'phone'}, $description, $photos);
        $comp->setId($obj->{'id'});
        return $comp;
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
}