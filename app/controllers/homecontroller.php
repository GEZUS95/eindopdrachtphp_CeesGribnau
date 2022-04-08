<?php

session_start();

require __DIR__ . '/../helpers/session_helper.php';
require __DIR__ . '/../repositories/repository.php';
require __DIR__ . '/../models/company.php';
require __DIR__ . '/../services/companyservice.php';

class homecontroller
{
    protected sessionHelper $sesHelp;
    private CompanyService $companyService;

    public function __construct()
    {
        $this->companyService = new CompanyService();
        $this->sesHelp = new sessionHelper();
    }


    public function index()
    {
        $companys = $this->companyService->getAll();
        require __DIR__ . '/../views/home/index.php';
    }

    public function about()
    {
        require __DIR__ . '/../views/home/about.php';
    }
}
