<?php

require_once __DIR__ . '/../repositories/repository.php';
require_once __DIR__ . '/../models/review.php';


class reviewrepository extends repository
{
    public function getAll()
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

    public function getOne($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM reviews WHERE id = :id LIMIT 1");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'review');
            return $stmt->fetch();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function insertOne(review $review)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO reviews (companyId, userId, title, description, rating, reaction) VALUES (:companyId, :userId, :title, :description, :rating, :reaction)");

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

    public function addReaction(int $id, string $reaction)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE reviews SET reaction = :react WHERE id = :id LIMIT 1");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':react', $reaction);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'review');
            return $stmt->fetch();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function deleteOne(int $id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM reviews WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }


}
