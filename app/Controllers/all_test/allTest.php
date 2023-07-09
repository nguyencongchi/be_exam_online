<?php

namespace App\Controllers\all_test;

use App\Controllers\BaseController;
use App\Models\all_test\MallTest;
use App\Models\create_test\McreateTest;
use mysql_xdevapi\Session;

class allTest extends BaseController
{
    private $session;

    public function __construct()
    {
        $this->session = session();
        helper('form');
        helper('general_helper');
        $this->request = service('request');
        $this->MallTest = new MallTest();
        $this->McreateTest = new McreateTest();
    }

    public function index()
    {
        if (!session()->has('login_user')) {
            return redirect()->to(base_url());
        }

        $data = [
            'test' => $this->MallTest->getAllTestByUser($this->session->get('user_id')),
        ];
        return view('allTestView', $data);
    }

    /**
     * getTestDetail function
     * @return \CodeIgniter\HTTP\ResponseInterface
     * @author ChiNguyen
     */
    public function getTestDetail()
    {
        $testId = $this->request->getPost();
        $dataTest = [
            'resultTest' => $this->McreateTest->getReportTest($testId),
            'infoTest' => $this->McreateTest->getInfoTest($testId),
            'knowledgeTest' => $this->McreateTest->getKnowledgeTest($testId)
        ];
        $html = view('showResultView', $dataTest);
        return $this->response->setJSON(
            [
                'html' => $html,
                // 'data' => $data
            ]
        );
    }

    public function deleteTestDetail()
    {
        $testId = $this->request->getPost();
        $message = [
            'result' => false,
            'message' => 'delete test fails'
        ];
        if ($this->MallTest->deletTestDetails($testId['testId'])) {
            $message = [
                'result' => true,
                'message' => 'delete test success'
            ];
        }
        return $this->response->setJSON(
            [
                'result' => $message,
            ]
        );
    }
}
