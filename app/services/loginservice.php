<?php
require __DIR__ . '/../repositories/userrepository.php';
require __DIR__ . '/../repositories/companyrepository.php';

class loginservice
{
    private userrepository $userrepository;
    private companyrepository $companyrepository;

    public function __construct()
    {
        $this->userrepository = new userrepository();
        $this->companyrepository = new companyrepository();
    }


//    public function getAllUsers() {
//        return $this->userrepository->getAll();
//    }

    public function getOneUser(string $email) {
            $obj = $this->userrepository->getOne($email);
            if ($obj->{'admin'}){$type = 'admin';} else {$type = 'user';}
            return new user($obj->{'id'}, $obj->{'userName'}, $obj->{'email'}, $obj->{'password'}, $obj->{'phone'}, $type);
    }

    public function getOneCompany(string $email) {
            $obj = $this->companyrepository->getOne($email);
            $description = $obj->{'description'};
            $photos = json_decode($obj->{'photos'}, true);
            if ($photos == null) {$photos = [];}
            if ($obj->{'description'} == null) {$description = "";}
            $company = new company($obj->{'name'}, $obj->{'email'}, $obj->{'password'}, $obj->{'phone'}, $description , $photos);
            $company->setId($obj->{'id'});
            return $company;
    }

    public function userExists($email)
    {
        if($this->userrepository->getOne($email) != false) { return true;}
    }

    public function companyExists($email)
    {
        if($this->companyrepository->getOne($email) != false) { return true;}
    }
}