<?php

require __DIR__ . '/../repositories/reviewrepository.php';

class ReviewService {
    public function getAll() {
        $repository = new reviewrepository();
        return $repository->getAll();
    }
}