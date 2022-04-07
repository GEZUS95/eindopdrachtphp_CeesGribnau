<?php

session_start();

require __DIR__ . '/../helpers/session_helper.php';

class profilecontroller
{
    protected sessionHelper $sesHelp;

    public function __construct()
    {
        $this->sesHelp = new sessionHelper();
    }

    public function index()
    {
        if ($_SESSION['auth_user']['type'] == 'user' || $_SESSION['auth_user']['type'] == 'admin') {
            require __DIR__ . '/../views/profile/index.php';
        } elseif ($_SESSION['auth_user']['type'] == 'company') {
            require __DIR__ . '/../views/profile/company.php';
        }
    }

    public function change() {
        require __DIR__ . '/../views/profile/change.php';
    }
}