<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function index()
    {
        $config = config('Auth');
        return view('auth/login', ['config' => $config, 'title' => 'Login Page']);
    }
    public function register()
    {
        return view('auth/register', ['title' => 'Register']);
    }
    public function forgot()
    {
        $config = config('Forgot');
        return view('auth/forgot', ['config' => $config, 'title' => 'Forgot']);
    }
    public function reset()
    {
        $config = config('Forgot');

        return view('auth/reset', ['config' => $config, 'title' => 'Forgot']);
    }
}
