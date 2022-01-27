<?php
require __DIR__ . '../app/repositories/repository.php';

class migration extends Repository
{
    private $sqluserstable = "CREATE TABLE users (
    id int(9) NOT NULL AUTO_INCREMENT,
    userName VARCHAR(30), 
    email VARCHAR(100), 
    password VARCHAR(255), 
    phone int(13),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY(id)
    )";

    private $sqlreviewstable = "CREATE TABLE reviews (
    company_id int(10) NOT NULL,
    user_id int(10) NOT NULL,
    stars int(10) NOT NULL,
    description text,
    PRIMARY KEY(company_id, user_id),
    FOREIGN KEY (company_id) REFERENCES companys(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

    private $sqlcompanystable = "CREATE TABLE companys (
  id int(10) NOT NULL AUTO_INCREMENT,
  name varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  password varchar(255) NOT NULL,
  phone int(13) NOT NULL,
  description text NOT NULL,
  created_at timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (id) 
)";

    public function __construct()
    {
        $rep = new Repository();
        $rep->connection->exec($this->sqluserstable);
        $rep->connection->exec($this->sqlcompanystable);
        $rep->connection->exec($this->sqlreviewstable);
    }
}

//CREATE TABLE `developmentdb`.`users` ( `id` INT(10) NOT NULL AUTO_INCREMENT , `userName` VARCHAR(50) NOT NULL , `email` VARCHAR(50) NOT NULL , `password` VARCHAR(255) NOT NULL , `phone` INT(13) NULL DEFAULT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;}
