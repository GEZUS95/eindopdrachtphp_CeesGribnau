<?php

require __DIR__ . '/../helpers/session_helper.php';
require __DIR__ . '/../services/companyservice.php';
require __DIR__ . '/../services/userservice.php';
require __DIR__ . '/../services/RegisterService.php';

session_start();

class registercontroller
{
    protected sessionHelper $sesHelp;
    private RegisterService $service;
    private companyservice $companyService;
    private UserService $userService;

    public function __construct()
    {
        $this->service = new RegisterService();
        $this->companyService = new companyservice();
        $this->userService = new userservice();
        $this->sesHelp = new sessionHelper();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $seralisedPOST = array_map('htmlspecialchars', $_POST);
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
            } else {
                $this->sesHelp->redirect("The submission failed, please try again.", "/register");
            }
        }
    }

    private function confirmEmail($email1, $email2): bool
    {
        if ($email1 === $email2) {
            if ($this->userService->userExists($email1)) {
                $this->sesHelp->redirect("The email address is already in use", "/register");
            } elseif ($this->companyService->companyExists($email1)) {
                $this->sesHelp->redirect("The email address is already in use", "/register/company");
            } else return true;
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
        $hashedpass = password_hash($data['password'], PASSWORD_DEFAULT);
        if (is_null($data['phone'])) {
            $tel = 0;
        } else {
            $tel = $data['phone'];
        }
        $user = new User();
            $user->name = $data['name'];
            $user->role = 'user';
            $user->email = $data['email'];
            $user->password = $hashedpass;
            $user->phone = $tel;

        $this->service->createUser($user);
        $this->sesHelp->redirect("Account successfully created", "/login");
    }

    public function index()
    {
        require __DIR__ . '/../views/register/index.php';
    }

    public function company()
    {
        require __DIR__ . '/../views/register/company.php';
    }

    private function makeCompany($data)
    {
        $hashedpass = password_hash($data['password'], PASSWORD_DEFAULT);

        $comp = new Company();
        $comp->name = $data['companyname'];
        $comp->role = 'company';
        $comp->email = $data['email'];
        $comp->password = $hashedpass;
        $comp->phone = $data['phone'];
        $comp->description = '';


        $this->service->createCompany($comp);
        $this->sesHelp->redirect("Account successfully created", "/login");
    }

}