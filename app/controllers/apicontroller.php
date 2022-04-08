<?php
session_start();
require __DIR__ . '/../models/company.php';
require __DIR__ . '/../models/review.php';
require __DIR__ . '/../models/user.php';
require __DIR__ . '/../repositories/repository.php';
require __DIR__ . '/../services/companyservice.php';
require __DIR__ . '/../services/userservice.php';
require __DIR__ . '/../services/reviewservice.php';



class apicontroller
{

    private CompanyService $companyService;
    private ReviewService $reviewService;
    private $userService;


    public function __construct()
    {
        $this->companyService = new companyservice();
        $this->reviewService = new ReviewService();
        $this->userService = new userService();
    }

    public function reviews()
    {
        foreach ($this->reviewService->getAll() as $row) {
        $array[] = $row;
        }
        $json = json_encode($array);

        header('Content-Type: application/json; charset=utf-8');
        echo $json;
    }

    public function companys()
    {
        foreach ($this->companyService->getAll() as $row)
        {
            $array[] = $row;
        }
        $json = json_encode($array);
        header('Content-Type: application/json; charset=utf-8');
        echo $json;

    }
    public function users()
    {
        foreach ($this->userService->getAll() as $row)
        {
            $array[] = $row;
        }
        $json = json_encode($array);

        header('Content-Type: application/json; charset=utf-8');
        echo($json);
    }
}