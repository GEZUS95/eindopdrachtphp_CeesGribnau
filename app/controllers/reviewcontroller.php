<?php

session_start();

require __DIR__ . '/../repositories/repository.php';
require __DIR__ . '/../models/review.php';
require __DIR__ . '/../models/user.php';
require __DIR__ . '/../models/company.php';
require __DIR__ . '/../services/reviewservice.php';
require __DIR__ . '/../services/userservice.php';
require __DIR__ . '/../services/companyservice.php';
require __DIR__ . '/../helpers/session_helper.php';

class ReviewController
{
    private ReviewService $reviewService;
    private CompanyService $companyService;
    private UserService $userService;
    private sessionHelper $sessionHelper;

    function __construct()
    {
        $this->reviewService = new ReviewService();
        $this->companyService = new CompanyService();
        $this->sessionHelper = new sessionHelper();
        $this->userService = new UserService();
    }

    public function index()
    {
        $model = $this->reviewService->getAll();

        require __DIR__ . '/../views/review/index.php';
    }

    public function single()
    {
        $model = $this->reviewService->getAll();

        require __DIR__ . '/../views/review/single.php';
    }

    public function create()
    {
        $companies = $this->companyService->getAll();

        require __DIR__ . '/../views/review/create.php';
    }

    public function place()
    {
        echo "successfully entered this pice of code <br>";


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $serialized = array_map('htmlspecialchars', $_POST);
            var_dump($serialized); echo "<br>";
            if (isset($serialized['review-btn-submit'])) {
                $review = new review();
                    $review->companyId = $serialized['company'];
                    $review->userId = $serialized['userid'];
                    $review->title = $serialized['title'];
                    $review->description = $serialized['description'];
                    $review->rating = $serialized['rating'];
                    $review->reaction = "";
                var_dump($review);
                $this->reviewService->insertOne($review);
                $this->sessionHelper->redirect('', '/review');
            }
        }
    }
}
