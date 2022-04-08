<?php

session_start();

require __DIR__ . '/../services/reviewservice.php';
require __DIR__ . '/../services/userservice.php';
require __DIR__ . '/../services/companyservice.php';
require __DIR__ . '/../helpers/session_helper.php';

class admincontroller
{
    private ReviewService $reviewService;
    private CompanyService $companyService;
    private UserService $userService;
    private sessionHelper $sessionHelper;

    public function __construct()
    {
        $this->sessionHelper = new sessionHelper();
        if (!$_SESSION['authenticated'] && $_SESSION['auth_user']['type'] != 'admin') {
            $this->sessionHelper->redirect('You need to be an admin for this action','/');
        }
        $this->reviewService = new ReviewService();
        $this->companyService = new CompanyService();
        $this->userService = new UserService();

    }

    public function index()
    {
        require __DIR__ . '/../views/admin/index.php';
    }

    public function users()
    {
        $model = $this->userService->getAll();
        require __DIR__ . '/../views/admin/users.php';
    }

    public function companys()
    {
        $model = $this->companyService->getAll();
        require __DIR__ . '/../views/admin/companys.php';
    }

    public function reviews()
    {
        $model = $this->reviewService->getAll();
        require __DIR__ . '/../views/admin/reviews.php';
    }
}