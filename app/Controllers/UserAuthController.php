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
        // $status = $this->userModel->registerAccount($_POST);

        // Fixed: Correct parameter order (to, subject, htmlContent, textContent)
        $emailStatus = $this->brevoService->sendEmail(
            'abhisheksingh5145@gmail.com', 
            'Welcome to Our App!', 
            '<h1>Hello Abhishek!</h1><p>Thanks for joining our platform!</p>',
            'Hello Abhishek! Thanks for joining our platform!' // Plain text version
        );

        // Or using the helper function:
        // $emailStatus = sendEmail(
        //     'abhisheksingh5145@gmail.com', 
        //     'Abhishek',  // This parameter is not used in the helper, remove it
        //     'Welcome to Our App!', 
        //     '<h1>Hello Abhishek!</h1><p>Thanks for joining.</p>'
        // );

        var_dump($emailStatus);

        // if($status['status'] == 200) {
        //     // Email sending logic here
        // }

        // echo json_encode($status);
    }

    public function dashboard()
    {
        return dashboardView('admin/dashboard');
    }

    public function testEmail()
    {
        $to = $this->request->getGet('to') ?? 'abhisheksingh5145@gmail.com';
        $name = $this->request->getGet('name') ?? 'Abhishek';

        // Fixed: Correct parameter order and better error handling
        $result = $this->brevoService->sendEmail(
            $to, 
            'Brevo Test Email', // subject
            "<h1>Hello {$name}!</h1><p>This is a test email from Brevo integration.</p><p>Email sent to: {$to}</p>", // HTML content
            "Hello {$name}! This is a test email from Brevo integration. Email sent to: {$to}" // Plain text content
        );

        // Better response structure
        return $this->response->setJSON([
            'to' => $to,
            'name' => $name,
            'success' => $result['success'],
            'message' => $result['success'] ? $result['message'] : $result['error'],
            'messageId' => $result['success'] ? ($result['messageId'] ?? null) : null,
            'timestamp' => date('Y-m-d H:i:s')
        ]);
    }
}