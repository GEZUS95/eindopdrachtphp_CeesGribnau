<?php

session_start();

require __DIR__ . '/../services/reviewservice.php';

class ReviewController
{

    private $reviewService;

    function __construct()
    {
        $this->reviewService = new ReviewService();
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
}
