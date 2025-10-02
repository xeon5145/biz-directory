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
        // Uncomment when ready to use
        $status = $this->userModel->registerAccount($_POST);

        if ($status['status'] == 200) {
            // Send Welcome Email
            $to = $this->request->getPost('email');
            $name = $this->request->getPost('name');

            // sendEmail($sendTo, $subject, $body)
            $result = sendEmail(
                $to,
                'Welcome to Biz Directory', // subject
                "<h1>Hello {$name}!</h1><p>Welcome to Biz Directory. You can now login to your account.</p><p>Email sent to: {$to}</p>" // HTML content
            );
            // Send Welcome Email
        }

        echo json_encode($status);
    }

    public function dashboard()
    {
        return dashboardView('admin/dashboard');
    }

    public function testEmail()
    {
        $to = $this->request->getGet('to') ?? 'covas86611@rograc.com';
        $name = $this->request->getGet('name') ?? 'Abhishek';

        // Fixed: Correct parameter order and better error handling
        $result = sendEmail(
            $to,
            'Brevo Test Email', // subject
            "<h1>Hello {$name}!</h1><p>This is a test email from Brevo integration.</p><p>Email sent to: {$to}</p>", // HTML content

        );

        echo  json_encode($result['status']);
    }
}
