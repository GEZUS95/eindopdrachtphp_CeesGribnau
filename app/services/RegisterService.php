<?php

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