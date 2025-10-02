<?php

namespace App\Controllers;

use \App\Models\userAuth_model;

class UserAuthController extends BaseController
{
    public $userModel;
    public $brevoService;

    public function __construct()
    {
        $this->userModel = new userAuth_model();
        $this->brevoService = service('brevo');

        // Load email helper
        helper('email');
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

        if ($status['status'] == 200) {
            // Send Welcome Email
            $to = $this->request->getPost('email');
            $name = $this->request->getPost('name');

            // sendEmail($sendTo, $subject, $body)
            // emailBuilder($templateName, $data)
           $mail = emailBuilder('welcome' ,['name' => $name]);
           if($mail['status'] == true) {
            $result = sendEmail(
                $to,
                $mail['subject'],
                $mail['body']
            );
           }
            // Send Welcome Email
        }

        echo json_encode($status);
    }

    public function dashboard()
    {
        return dashboardView('admin/dashboard');
    }
}
