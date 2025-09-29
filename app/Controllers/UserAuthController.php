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

        // $status = $this->userModel->registerAccount($_POST);

        $emailstatus = sendEmail('abhisheksingh5145@gmail.com', 'Abhishek', 'Welcome to Our App!', '<h1>Hello Abhishek!</h1><p>Thanks for joining.</p>');

        var_dump($emailstatus);
        // if($status['status'] == 200) {
        //     // Send Email
        // }

        // echo json_encode($status);
    }

    public function dashboard()
    {

        return dashboardView('admin/dashboard');
    }

    public function testEmail()
    {
        $to = $this->request->getGet('to') ?? 'test@example.com';
        $name = $this->request->getGet('name') ?? 'Test User';

        $brevo = service('brevo');
        $result = $brevo->send($to, $name, 'Brevo Test Email', '<h1>It works!</h1><p>This is a test email from Brevo integration.</p>');

        $error = method_exists($brevo, 'getLastError') ? $brevo->getLastError() : null;
        $response = method_exists($brevo, 'getLastResponse') ? $brevo->getLastResponse() : null;

        return $this->response->setJSON([
            'to' => $to,
            'success' => $result !== false,
            'error' => $error,
            'response' => $response,
        ]);
    }
}
