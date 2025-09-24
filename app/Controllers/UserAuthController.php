<?php

namespace App\Controllers;

use \App\Models\userAuth_model;

class UserAuthController extends BaseController
{
    public $userModel;
    public function __construct()
    {
        $this->userModel = new userAuth_model();
    }

    public function index(): string
    {
        return mainView('user-authentication/main');
    }

    public function login()
    {

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel->userAuth($username, $password);

        echo json_encode($user);
        return;
    }

    public function register(): string
    {

        return mainView('user-authentication/register');
    }

    public function registerAccount()
    {

        $status = $this->userModel->registerAccount($_POST);

        echo json_encode($status);
    }

    public function dashboard()
    {

        return dashboardView('admin/dashboard');
    }
}
