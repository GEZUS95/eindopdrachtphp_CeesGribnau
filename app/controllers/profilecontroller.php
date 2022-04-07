<?php

session_start();

class profilecontroller
{
    public function index()
    {
        if ($_SESSION['auth_user']['type'] == 'user' || $_SESSION['auth_user']['type'] == 'admin') {
            require __DIR__ . '/../views/profile/index.php';
        } elseif ($_SESSION['auth_user']['type'] == 'company') {
            require __DIR__ . '/../views/profile/company.php';
        }
    }
}