<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;


class user extends BaseController
{
    private $session;

    public function __construct()
    {
        $this->session = session();
        helper('form');
        helper('general_helper');
    }

    public function index()
    {
        if (!session()->has('login_user')) {
            return redirect()->to(base_url());
        }
        return view('userProfileView');
    }

    public function viewUserUpdate()
    {
        return view('userProfileUpdateView');
    }
}
