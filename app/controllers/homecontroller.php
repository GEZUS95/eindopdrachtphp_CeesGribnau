<?php

require '../helpers/session_helper.php';

session_start();

class homecontroller
{
    protected sessionHelper $sesHelp;

    public function __construct()
    {
        $this->sesHelp = new sessionHelper();
    }


    public function index()
    {
        require __DIR__ . '/../views/home/index.php';
    }

    public function about()
    {
        require __DIR__ . '/../views/home/about.php';
    }
}
