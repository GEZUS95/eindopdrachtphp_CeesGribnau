<?php

require __DIR__ . '/repository.php';
require __DIR__ . '/../models/review.php';

class reviewrepository extends repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM reviews");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'review');

            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getOne($companyId, $userId)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM reviews WHERE companyID = :cID AND userId = :uID LIMIT 1");
            $stmt->bindParam(':cID', $companyId);
            $stmt->bindParam(':uID', $userId);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'review');
            return $stmt->fetch();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function insertOne(review $review)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO review (companyId, userId, title, description, rating, reaction) VALUES (:companyId, :userId, :title, :description, :rating, :reaction)");

            $stmt->bindParam(':companyId', $review->companyId);
            $stmt->bindParam(':userId', $review->userId);
            $stmt->bindParam(':title', $review->title);
            $stmt->bindParam(':description', $review->description);
            $stmt->bindParam(':rating', $review->rating);
            $stmt->bindParam(':reaction', $review->reaction);

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }


}
