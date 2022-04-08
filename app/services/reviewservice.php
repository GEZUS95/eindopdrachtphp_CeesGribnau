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

    function getOne($id) {
        return $this->repository->getOne($id);
    }

    public function addReaction(int $id, string $reaction)
    {
        $this->repository->addReaction($id, $reaction);
    }

    public function deleteOne(int $id)
    {
        $this->repository->deleteOne($id);
    }
}