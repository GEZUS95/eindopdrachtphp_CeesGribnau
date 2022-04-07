<?php

namespace Controllers;


use Helpers\sessionHelper;
use Services\CompanyService;
use Services\loginservice;
use Services\UserService;

session_start();

class logincontroller
{

    private loginservice $loginservice;
    protected sessionHelper $sesHelp;
    private UserService $userService;
    private CompanyService $companyService;

    public function __construct()
    {
        $this->loginservice = new loginservice();
        $this->userService = new UserService();
        $this->companyService = new CompanyService();
        $this->sesHelp = new sessionHelper();

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $new = array_map('htmlspecialchars', $_POST);
//            var_dump($_POST);
            if (empty($new['email'] || $new['password'])) {
                $this->sesHelp->redirect("email or password is empty","/login");
            }
            elseif(isset($new['submit'])) {
                if ($this->userService->userExists($new['email'])) {
                    $this->loginUser($new['email'], $new['password']);
                } elseif ($this->companyService->companyExists($new['email'])) {
                    $this->loginCompany($new['email'], $new['password']);
                } else {
                    $this->sesHelp->redirect("User or Company does not exists", "/login");
                }
            }
        }
    }

    public function index()
    {
        require __DIR__ . '/../views/login/index.php';
    }

    public function loginUser(string $email, string $password): void
    {
        $user = $this->userService->getOneUser($email);
        if (!empty($user)) {
            if ($this->userService->checkPassword($password, $user->password)) {
                $_SESSION['authenticated'] = true;
                $_SESSION['auth_user'] = [
                    'type' => $user->role,
                    'id' => $user->id,
                    'username' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone
                ];
                $this->sesHelp->redirect("Login Success!",'/');
            }
        } else {
            $this->sesHelp->redirect("The user was not found, please fill in correctly or register a new account", "/login");
        }
    }

    public function logout(): void {
        require __DIR__ . '/../views/login/logout.php';
        session_unset();
        session_destroy();
        $this->sesHelp->redirect("Succesfully loged out","/");
    }

    private function loginCompany(string $email, string $password)
    {
        $company = $this->companyService->getOneCompany($email);
        if (!empty($company)) {
            if ($this->companyService->checkPassword($password, $company->password)) {
                $_SESSION['authenticated'] = true;
                $_SESSION['auth_user'] = [
                    'type' => $company->role,
                    'id' => $company->id,
                    'username' => $company->name,
                    'email' => $company->email,
                    'phone' => $company->phone
                ];
                $this->sesHelp->redirect("Login Success!",'/');
            }
        } else {
            $this->sesHelp->redirect("The user was not found, please fill in correctly or register a new account", "/login");
        }
    }
}
