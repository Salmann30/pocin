<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        // $auth = service('authentication');
        // if ($auth->check()) {
        //     return redirect()->to('/profile'); // Jika sudah login, arahkan ke dashboard atau halaman setelah login
        // }

        // Tampilkan halaman landing page
        return view('beranda/index');
    }
    public function register(): string
    {
        return view('auth/register');
    }
    public function umkm(): string
    {
        return view('umkm/');
    }
}
