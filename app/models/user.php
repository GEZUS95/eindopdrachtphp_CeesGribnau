<?php

class user
{
    private int $id;
    private string $userName;
    private string $email;
    private string $password;
    private string $phone;
    private bool $admin;

    /**
     * @param int $id
     * @param string $userName
     * @param string $email
     * @param string $password
     * @param string $phone
     * @param bool $admin
     */
    public function __construct(int $id, string $userName, string $email, string $password, string $phone, bool $admin)
    {
        $this->id = $id;
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->admin = $admin;
    }


    /**
    * @return int
    */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }


    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     */
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function isAdmin()
    {
        return $this->admin;
    }


}