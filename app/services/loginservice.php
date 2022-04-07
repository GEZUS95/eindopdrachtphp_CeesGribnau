<?php

namespace Services;


class loginservice
{
    private userservice $userService;
    private companyservice $companyService;

    public function __construct()
    {
        $this->userService = new userservice();
        $this->companyService = new companyservice();
    }

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
}