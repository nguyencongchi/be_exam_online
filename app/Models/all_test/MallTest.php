<?php

namespace App\Models\all_test;

use App\Models\BaseModel;

class MallTest extends BaseModel
{
    protected $_tests_table = 'tests';

    protected $_test_questiona_table = 'test_questions';

    protected $_test_knowlege_table = 'test_knowledge';

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    /**
     * getAllTestByUser function
     * @param $id
     * @return array
     * @author ChiNguyen
     */
    public function getAllTestByUser($id)
    {
        $query = $this->db->table($this->_tests_table . ' as t')
            ->select('*')
            ->where('user_id', $id)
            ->get();
        return $query->getResultArray();
    }


    public function deletTestDetails($id)
    {
        $this->db->table($this->_tests_table . ' as t')
            ->where('id', $id)
            ->delete();

        $this->db->table($this->_test_questiona_table . ' as tq')
            ->where('test_id', $id)
            ->delete();

        $this->db->table($this->_test_knowlege_table . ' as tk')
            ->where('test_id', $id)
            ->delete();
        return true;
    }
}
