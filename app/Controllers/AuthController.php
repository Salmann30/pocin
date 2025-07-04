<?php

namespace App\Controllers;

use Myth\Auth\Controllers\AuthController as BaseAuth;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;
use Config\Database;

class AuthController extends BaseAuth
{
    protected $config;
    protected $auth;

    public function __construct()
    {
        $this->config = config('Auth');
        $this->auth   = service('authentication');
    }

    public function login()
    {
        if ($this->auth->check()) {
            $userId = $this->auth->user()->id;
            $db     = Database::connect();
            $role   = $db->table('auth_groups_users')->where('user_id', $userId)->get()->getRowArray();
            $groupId = $role['group_id'] ?? null;

            $redirectURL = match ((int) $groupId) {
                1 => site_url('/admin/dashboard'),       // Admin
                2 => site_url('/umkm/produk/index'),     // UMKM
                default => site_url('/'),
            };

            unset($_SESSION['redirect_url']);
            return redirect()->to($redirectURL);
        }

        $_SESSION['redirect_url'] = session('redirect_url') ?? previous_url() ?? site_url('/');
        return $this->_render($this->config->views['login'], [
            'config' => $this->config,
            'title'  => 'Login',
        ]);
    }

    public function attemptLogin()
    {
        $rules = [
            'login'    => 'required',
            'password' => 'required',
        ];

        if ($this->config->validFields === ['email']) {
            $rules['login'] .= '|valid_email';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $login    = $this->request->getPost('login');
        $password = $this->request->getPost('password');
        $remember = (bool) $this->request->getPost('remember');

        $type = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (!$this->auth->attempt([$type => $login, 'password' => $password], $remember)) {
            return redirect()->back()->withInput()->with('error', $this->auth->error() ?? lang('Auth.badAttempt'));
        }

        $userId = $this->auth->user()->id;
        $db     = Database::connect();
        $role   = $db->table('auth_groups_users')->where('user_id', $userId)->get()->getRowArray();
        $groupId = $role['group_id'] ?? null;

        $redirectURL = match ((int) $groupId) {
            1 => site_url('/admin/dashboard'),
            2 => site_url('/umkm/produk/index'),
            default => site_url('/'),
        };

        unset($_SESSION['redirect_url']);
        return redirect()->to($redirectURL)->withCookies()->with('message', lang('Auth.loginSuccess'));
    }

    public function logout()
    {
        if ($this->auth->check()) {
            $this->auth->logout();
        }
        return redirect()->to(site_url('/'));
    }

    public function register()
    {
        if ($this->auth->check()) {
            return redirect()->back();
        }

        if (!$this->config->allowRegistration) {
            return redirect()->back()->withInput()->with('error', lang('Auth.registerDisabled'));
        }

        return $this->_render($this->config->views['register'], [
            'config' => $this->config,
            'title'  => 'Register',
        ]);
    }

    public function attemptRegister()
    {
        if (!$this->config->allowRegistration) {
            return redirect()->back()->withInput()->with('error', lang('Auth.registerDisabled'));
        }

        $users = model(UserModel::class);

        $rules = config('Validation')->registrationRules ?? [
            'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $rules = [
            'password'     => 'required|strong_password',
            'pass_confirm' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
        $dataPost = $this->request->getPost($allowedPostFields);
        $dataPost['tipeakun'] = 0; // default: belum diverifikasi

        $user = new User($dataPost);
        $this->config->requireActivation === null ? $user->activate() : $user->generateActivateHash();

        if (!$users->save($user)) {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        // Masukkan user ke group UMKM (group_id = 2)
        $db = Database::connect();
        $db->table('auth_groups_users')->insert([
            'user_id'  => $users->getInsertID(),
            'group_id' => 2,
        ]);

        if ($this->config->requireActivation !== null) {
            $activator = service('activator');
            if (!$activator->send($user)) {
                return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
            }
            return redirect()->route('login')->with('message', lang('Auth.activationSuccess'));
        }

        return redirect()->route('login')->with('message', lang('Auth.registerSuccess'));
    }

    public function forgot()
    {
        if ($this->config->activeResetter === null) {
            return redirect()->route('login')->with('error', lang('Auth.forgotDisabled'));
        }

        return $this->_render($this->config->views['forgot'], [
            'config' => $this->config,
            'title'  => 'Forgot Password',
        ]);
    }

    public function reset()
    {
        if ($this->config->activeResetter === null) {
            return redirect()->route('login')->with('error', lang('Auth.forgotDisabled'));
        }

        $token = $this->request->getGet('token');

        return $this->_render($this->config->views['reset'], [
            'token'  => $token,
            'title'  => 'Reset Password',
            'config' => $this->config,
        ]);
    }
}
