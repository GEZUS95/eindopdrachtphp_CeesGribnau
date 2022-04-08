<?php

require __DIR__ . '/../helpers/session_helper.php';
require __DIR__ . '/../services/userservice.php';
require __DIR__ . '/../services/companyservice.php';

session_start();

class logincontroller
{
    protected sessionHelper $sesHelp;
    private UserService $userService;
    private CompanyService $companyService;

    public function __construct()
    {
        $this->userService = new UserService();
        $this->companyService = new CompanyService();
        $this->sesHelp = new sessionHelper();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $new = array_map('htmlspecialchars', $_POST);
//            var_dump($_POST);
            if (empty($new['email'] || $new['password'])) {
                $this->sesHelp->redirect("email or password is empty", "/login");
            } elseif (isset($new['submit'])) {
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
        $this->extracted($user, $password);
    }

    public function logout(): void
    {
        require __DIR__ . '/../views/login/logout.php';
        session_unset();
        session_destroy();
        $this->sesHelp->redirect("Successfully logged out", "/");
    }

    private function loginCompany(string $email, string $password)
    {
        $company = $this->companyService->getOneCompany($email);
        $this->extracted($company, $password);
    }

    /**
     * @param $user
     * @param string $password
     * @return void
     */
    public function extracted($user, string $password): void
    {
        if (!empty($user)) {
            if (password_verify($password, $user->password)) {
                $_SESSION['authenticated'] = true;
                $_SESSION['auth_user'] = [
                    'type' => $user->role,
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone
                ];
                if ($user->role === 'company'){
                    $_SESSION['auth_user']['description'] = $user->description;
                    $_SESSION['auth_user']['logo'] = $user->logo;
                    }
                $this->sesHelp->redirect("Login Success!", '/');
            }
        } else {
            $this->sesHelp->redirect("The user was not found, please fill in correctly or register a new account", "/login");
        }
    }
}
