<?php
session_start();
require __DIR__ . '/../services/registerservice.php';
require __DIR__ . '/../services/companyservice.php';
require __DIR__ . '/../helpers/session_helper.php';

class registercontroller
{
    protected sessionHelper $sesHelp;
    private registerservice $service;
    private companyservice $companyservice;

    public function __construct()
    {
        $this->service = new registerservice();
        $this->companyservice = new companyservice();
        $this->sesHelp = new sessionHelper();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $seralisedPOST = array_map('htmlspecialchars', $_POST);
            var_dump($seralisedPOST);
            if (isset($seralisedPOST['user-btn-submit'])) {
                if ($this->confirmEmail($seralisedPOST['email'], $seralisedPOST['email-conf'])) {
                    if ($this->confirmPasswords($seralisedPOST['password'], $seralisedPOST['password-conf'])) {
                        $this->makeUser($seralisedPOST);
                        echo "success";
                    } else {
                        $this->sesHelp->redirect("Passwords does not match", "/register");
                        echo "pass";
                    }
                } else {
                    $this->sesHelp->redirect("The email does not match", "/register");
                    echo "mail";
                }
            } elseif (isset($seralisedPOST['company-btn-submit'])) {
                if ($this->confirmEmail($seralisedPOST['email'], $seralisedPOST['email-conf'])) {
                    if ($this->confirmPasswords($seralisedPOST['password'], $seralisedPOST['password-conf'])) {
                        $this->makeCompany($seralisedPOST);
                    } else {
                        $this->sesHelp->redirect("Passwords does not match", "/register/company");
                    }
                } else {
                    $this->sesHelp->redirect("The email does not match", "/register/company");
                }
            }
            else {
                $this->sesHelp->redirect("The submission failed, please try again.","/register");
            }
        }
    }

    private function confirmEmail($email1, $email2): bool
    {
        if ($email1 === $email2) {
            if ($this->service->userExists($email1)) {
                $this->sesHelp->redirect("The email address is already in use", "/register");
            }
            elseif ($this->companyservice->companyExists($email1)){
                $this->sesHelp->redirect("The email address is already in use", "/register/company");
            }
            else return true;
        }
        return false;
    }

    private function confirmPasswords($pass1, $pass2): bool
    {
        if ($pass1 === $pass2) return true;
        else return false;
    }

    private function makeUser($data)
    {
        var_dump($data);
        $hashedpass = password_hash($data['password'], PASSWORD_DEFAULT);
        if (is_null($data['phone'])) {$tel = 0;} else {$tel = $data['phone'];}
        $newUser = new user(0, $data['username'], $data['email'], $hashedpass, $tel,false);
        $this->service->createUser($newUser);
        $this->sesHelp->redirect2("Account successfully created", "/login", 100);
    }

    public function index()
    {
        require __DIR__ . '/../views/register/index.php';
    }

    public function company(){
        require __DIR__ . '/../views/register/company.php';
    }

    private function makeCompany($data)
    {
        $hashedpass = password_hash($data['password'], PASSWORD_DEFAULT);
        $newCompany = new company($data['companyname'], $data['email'], $hashedpass, $data['phone'], '', array());
        $newCompany->setPassword($hashedpass);


        $this->companyservice->insertOne($newCompany);
        $this->sesHelp->redirect2("Account successfully created", "/login", 100000);
    }

}