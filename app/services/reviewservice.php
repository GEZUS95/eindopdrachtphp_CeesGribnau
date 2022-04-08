<?php

require __DIR__ . '/../repositories/reviewrepository.php';

class ReviewService {

    private reviewrepository $repository;

    public function __construct()
    {
        $this->repository = new reviewrepository();
    }

    public function getAll() {

        return $this->repository->getAll();
    }

    function insertOne(review $review) {
        $this->repository->insertOne($review);
    }

    function getOne($companyId, $userId) {
        return $this->getOne($companyId, $userId);
    }
}