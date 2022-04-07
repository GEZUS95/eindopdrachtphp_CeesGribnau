<?php

require __DIR__ . '/../models/company.php';
require __DIR__ . '/../models/user.php';
require __DIR__ . '/../services/companyservice.php';
require __DIR__ . '/../services/userservice.php';

class RegisterService {

    private userService $userService;
    private companyService $companyService;

    public function __construct()
    {
        $this->userService = new userService();
        $this->companyService = new companyService();
    }

    public function createUser(user $user){
        $this->userService->insertOne($user);
    }

    public function createCompany(company $company){
        $this->companyService->insertOne($company);
    }
}