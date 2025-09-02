<?php

namespace App\Controllers;

class UserAuthController extends BaseController
{
    public function index(): string
    {
        return mainView('user-authentication/main');
    }
}