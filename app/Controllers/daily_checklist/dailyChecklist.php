<?php

namespace App\Controllers\daily_checklist;

use App\Controllers\BaseController;
use App\Models\daily_checklist\MdailyChecklist;

class dailyChecklist extends BaseController
{
    private $session;

    public function __construct()
    {
        $this->session = session();
        helper('form');
        helper('general_helper');
        $this->request = service('request');
        $this->MdailyChecklist = new MdailyChecklist();
    }

    public function index()
    {
        if (!session()->has('login_user')) {
            return redirect()->to(base_url());
        }
        $dataCheckList = [];
        $data = $this->MdailyChecklist->getDailyChecklist($this->session->get('user_id'));
        if (!empty($data)) {
            $statusList = [
                1 => 'task_cancel',
                2 => 'task_new',
                3 => 'task_progress',
                4 => 'task_done'
            ];
            foreach ($data as $item) {
                $status = $item['status'];
                if (isset($statusList[$status])) {
                    $listKey = $statusList[$status];
                    $dataCheckList[$listKey][] = $item;
                }
            }
        }
        $data = [
            'dataCheckList' => $dataCheckList
        ];
        //session()->set('dataCheckList', $dataCheckList);
        return view('dailyChecklistView', $data);
    }

    public function createChecklist()
    {
        $data = $this->request->getPost();
        if (!empty($data)) {
            $data = [
                'user_id' => $this->session->get('user_id'),
                'subject' => $data['title'],
                'content' => $data['description'],
                'status' => $data['status'],
                'date' => date('Y-m-d'),
            ];
            if ($this->MdailyChecklist->insertChecklist($data)) {
                $response = array(
                    'status' => 'success',
                    'message' => 'Checklist inserted successfully.'
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Failed to insert checklist.'
                );
            }
            return json_encode($response);
        }
    }


    public function getCheckListById($id)
    {
        if ($id) {
            $dataCheckListDetail = $this->MdailyChecklist->getDailyChecklistById($id);
            if ($dataCheckListDetail) {
                return $this->response->setJSON($dataCheckListDetail);
            } else {
                return false;
            }
        }
    }


    public function updateChecklist()
    {
        $data = $this->request->getPost();
        if (!empty($data)) {
            $data = [
                'id' => $data['id'],
                'subject' => $data['title'],
                'content' => $data['description'],
                'status' => $data['status'],
            ];
            if ($this->MdailyChecklist->updateChecklist($data)) {
                $response = array(
                    'status' => 'success',
                    'message' => 'Checklist Updated Successfully.'
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Failed to update checklist.'
                );
            }
            return json_encode($response);
        }
    }
}

