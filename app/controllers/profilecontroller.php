<?php
session_start();
class profilecontroller
{
    public function index()
    {
        require __DIR__ . '/../views/profile/index.php';
    }
}