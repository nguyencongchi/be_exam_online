<?php

namespace App\Controllers\report_test;

use App\Controllers\BaseController;
use App\Models\report_test\MreportTest;

class reportTest extends BaseController
{
    private $session;
    public function __construct()
    {
        $this->session = session();
        helper('form');
        helper('general_helper');
        $this->request = service('request');
        $this->MreportTest = new MreportTest();
    }

    public function index()
    {
        if (!session()->has('login_user')) {
            return redirect()->to(base_url());
        }
        return view('reportTestView');
    }

    public function getChartData()
    {
        $data = $this->MreportTest->report($this->session->get('user_id'));

        return $this->response->setJSON($data);
    }
}
