<?php

session_start();

require __DIR__ . '/../helpers/session_helper.php';
require __DIR__ . '/../services/userservice.php';
require __DIR__ . '/../services/companyservice.php';

class profilecontroller
{
    protected sessionHelper $sesHelp;
    protected UserService $userService;
    private CompanyService $companyService;

    public function __construct()
    {
        $this->sesHelp = new sessionHelper();
        $this->userService = new UserService();
        $this->companyService = new CompanyService();
    }

    public function index()
    {
            require __DIR__ . '/../views/profile/index.php';
    }

    public function change()
    {
        require __DIR__ . '/../views/profile/change.php';
    }

    public function updateuser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $serialized = array_map('htmlspecialchars', $_POST);
            if (isset($serialized['user-btn-submit'])) {

                $updatedUser = new user();
                $updatedUser->id = $serialized['id'];
                $updatedUser->name = $serialized['name'];
                $updatedUser->email = $serialized['email'];
                $updatedUser->phone = $serialized['phone'];

                if (isset($serialized['password'])) {
                    if ($serialized['password'] === $serialized['password-conf']) {
                        $newPass = password_hash($serialized['password'], PASSWORD_DEFAULT);

                        $updatedUser->password = $newPass;
                    } else {
                        $this->sesHelp->redirect("Passwords does not match", "/profile/change");
                        exit;
                    }
                } else {
                    $olduser = $this->userService->getOneById($serialized['id']);
                    $updatedUser->password = $olduser->password;
                }
                $this->userService->updateOne($updatedUser);
                $this->sesHelp->redirect('', '/profile/change');
            }
        }
    }
    public function updatecompany()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $serialized = array_map('htmlspecialchars', $_POST);
            if (isset($serialized['user-btn-submit'])) {

                $updatedCompany = new company();
                $updatedCompany->id = $serialized['id'];
                $updatedCompany->name = $serialized['name'];
                $updatedCompany->email = $serialized['email'];
                $updatedCompany->phone = $serialized['phone'];
                $updatedCompany->description = $serialized['description'];

                if (isset($serialized['password'])) {
                    if ($serialized['password'] === $serialized['password-conf']) {
                        $newPass = password_hash($serialized['password'], PASSWORD_DEFAULT);

                        $updatedCompany->password = $newPass;
                    } else {
                        $this->sesHelp->redirect("Passwords does not match", "/profile/change");
                        exit;
                    }
                } else {
                    $olduser = $this->companyService->getOneById($serialized['id']);
                    $updatedCompany->password = $olduser->password;
                }
                $this->companyService->updateOne($updatedCompany);
                $_SESSION['auth_user']['description'] = $serialized['description'];
                $this->sesHelp->redirect('', '/profile/change');
            }
        }
    }

    public function deleteUser()
    {
        if (!$_SESSION['authenticated'] && $_SESSION['auth_user']['type'] != 'admin') {
            $this->sesHelp->redirect('You need to be an admin for this action','/'); exit();
        }
        $this->userService->deleteOne($_GET['id']);
    }

    public function deleteCompany()
    {
        if (!$_SESSION['authenticated'] && $_SESSION['auth_user']['type'] != 'admin') {
            $this->sesHelp->redirect('You need to be an admin for this action','/'); exit();
        }
        $this->companyService->deleteOne($_GET['id']);
    }
}