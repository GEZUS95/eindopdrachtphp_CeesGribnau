<?php
require __DIR__ . '/../models/company.php';

class companyrepository extends repository
{
    public function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM companys");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'user');
            $articles = $stmt->fetchAll();

            return $articles;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getOne(string $email) {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM companys WHERE email = :email LIMIT 1");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetch();

        } catch (PDOException $e){
            echo $e;
        }
    }

    public function insertOne(company $company){
        try{
            $stmt = $this->connection->prepare("INSERT INTO companys (name, email, password, phone, description) VALUES (:cname, :email, :password, :phone, null)");

            $un = $company->getName();
            $mail = $company->getEmail();
            $pas = $company->getPassword();
            $tel = $company->getPhone();

            $stmt->bindParam(':cname', $un);
            $stmt->bindParam(':email', $mail);
            $stmt->bindParam(':password', $pas);
            $stmt->bindParam(':phone', $tel);

            $stmt->execute();
        } catch (PDOException $e){
            echo $e;
        }
    }

    public function updateDescription($id, $description){
        try {
            $stmt = $this->connection->prepare("UPDATE companys SET description=:description WHERE id=:id");

            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':id', $id);

            $stmt->execute();
        } catch (PDOException $e){
            echo $e;
        }
    }

    public function updatePhotos($id, $photos)  {
        try {
            $stmt = $this->connection->prepare("UPDATE companys SET photos=:photos WHERE id=:id");

            $stmt->bindParam(':photos', $photos);
            $stmt->bindParam(':id', $id);

            $stmt->execute();
        } catch (PDOException $e){
            echo $e;
        }
    }

}
