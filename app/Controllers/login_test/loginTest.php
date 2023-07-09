<?php

namespace App\Controllers\login_test;

use App\Controllers\BaseController;

use App\Config\Validation;
use App\Models\login_test\MloginTest;

class loginTest extends BaseController
{
    private $session;

    public function __construct()
    {
        helper('form');
        helper('general_helper');
        $this->session = session();
        $this->request = service('request');
        $this->MloginTest = new MloginTest();
    }

    public function index()
    {
        return view('loginUserView');
    }

    public function checkLogin()
    {
        $data = [];
        $validation = \Config\Services::validation();
        $rules = [
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Tên đăng nhập không được trống',
                ],
            ],

            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Mật khẩu không được trống',
                    'exact_length' => '* Mật khẩu tối thiểu dài 8 ký tự',
                ],
            ],
        ];
        $validation->setRules($rules);
        $data = $this->request->getPost();
        if (!$validation->run($data)) {
            $data['validation_errors'] = $validation->listErrors();
        } else {
            $userdata = $this->MloginTest->verifyAcount($data['username'], md5($data['password']));
            if ($userdata) {
                $this->session->set('login_user', true);
                $this->session->set('username', $data['username']);
                $this->session->set('user_id', $userdata['id']);
                return redirect()->to('https://backend.local.com/be_exam_online/create_test');
            } else {
                $data['verify_error'] = '* Tên đăng nhập hoặc mật khẩu không đúng';
            }
        }
        return view('loginUserView', $data);
    }

    /**
     * logout function
     * @author ChiNguyen
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function logout()
    {
        $this->session = array('username');
        session_destroy();
        return redirect()->to('https://backend.local.com/be_exam_online');
    }
}