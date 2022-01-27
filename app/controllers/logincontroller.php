<?php
session_start();
require __DIR__ . '/../services/loginservice.php';
require __DIR__ . '/../helpers/session_helper.php';
class logincontroller
{

    private loginservice $loginservice;
    protected sessionHelper $sesHelp;

    public function __construct()
    {
        $this->loginservice = new loginservice();
        $this->sesHelp = new sessionHelper();

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $new = array_map('htmlspecialchars', $_POST);
            var_dump($_POST);
            if (empty($new['email'] || $new['password'])) {
                $this->sesHelp->redirect("email or password is empty","/login");
            }
            elseif(isset($new['submit'])) {
                if ($this->loginservice->userExists($new['email'])) {
                    $this->loginUser($new['email'], $new['password']);
                } elseif ($this->loginservice->companyExists($new['email'])) {
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
        $user = $this->loginservice->getOneUser($email);
        if (!empty($user)) {
            if (password_verify($password, $user->getPassword())) {
                if ($user->isAdmin()){$type = 'admin';} else {$type = 'user';}
                $_SESSION['authenticated'] = true;
                $_SESSION['auth_user'] = [
                    'type' => $type,
                    'id' => $user->getId(),
                    'username' => $user->getUserName(),
                    'email' => $user->getEmail(),
                    'phone' => $user->getPhone()
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
        $company = $this->loginservice->getOneCompany($email);
        if (!empty($company)) {
            if (password_verify($password, $company->getPassword())) {
                $_SESSION['authenticated'] = true;
                $_SESSION['auth_user'] = [
                    'type' => 'company',
                    'id' => $company->getId(),
                    'username' => $company->getName(),
                    'email' => $company->getEmail(),
                    'phone' => $company->getPhone()
                ];
                $this->sesHelp->redirect("Login Success!",'/');
            }
        } else {
            $this->sesHelp->redirect("The user was not found, please fill in correctly or register a new account", "/login");
        }
    }
}
