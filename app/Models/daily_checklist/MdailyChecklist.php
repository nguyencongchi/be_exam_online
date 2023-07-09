<?php

namespace App\Models\daily_checklist;

use App\Models\BaseModel;

class MdailyChecklist extends BaseModel
{
    private $_users_table = 'users';
    private $_user_daily_checklist = 'user_daily_checklists';

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    /**
     * getDailyChecklist function
     * @return array
     * @author ChiNguyen
     */
    public function getDailyChecklist($user_id)
    {
        $dataChecklist = [];
        $query = $this->db->table($this->_user_daily_checklist . ' as udc')
            ->select('udc.id, udc.subject, udc.content, udc.status, udc.date')
            ->join($this->_users_table . ' as u', 'u.id = udc.user_id', 'LEFT')
            ->where('u.id', $user_id)
            ->orderBy('udc.date', 'ASC')
            ->get();
        if ($query->getNumRows() > 0) {
            $dataChecklist = $query->getResultArray();
        }
        return $dataChecklist;
    }

    /**
     * insertChecklist function
     * @param $data
     * @return bool
     * @author ChiNguyen
     */
    public function insertChecklist($data)
    {
        if ($this->db->table($this->_user_daily_checklist)->insert($data)) {
            return true;
        } else {
            return false;
        }
    }

    public function getDailyChecklistById($id)
    {
        $query = $this->db->table($this->_user_daily_checklist)
            ->where('id', $id)
            ->get();
        if ($query->getNumRows() > 0) {
            $dataCheckListDetail = $query->getResultArray();
        }
        return $dataCheckListDetail;
    }

    public function updateChecklist($data)
    {
        if (!empty($data)) {
            $dataUpdate = [
                'subject' => $data['subject'],
                'content' => $data['content'],
                'status' => $data['status'],
            ];
            $this->db->table($this->_user_daily_checklist)
                ->where('id', $data['id'])
                ->update($dataUpdate);

            return true;
        }
    }
}

