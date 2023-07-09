<?php

namespace App\Models\report_test;

use App\Models\BaseModel;

class MreportTest extends BaseModel
{
    protected $_question_table = 'questions';
    protected $_tests_table = 'tests';
    protected $_test_questions_table = 'test_questions';
    protected $_test_knowledge_table = 'test_knowledge';

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    /**
     * report function
     * @param $user_id
     * @return array
     * @author ChiNguyen
     */
    public function report($user_id)
    {
        $dataCountQuestion = [];
        $dataKnowlegeQuestion = [];
        $dataTimeQuestion = [];
        $dataPercentQuestion = [];
        $dataTotalTest = [];
        $dataTestDone = [];

        $query = $this->db->table($this->_tests_table . ' as t')
            ->select('t.test_name, t.count_correct, t.count_wrong, t.count_pass')
            ->where('user_id', $user_id)
            ->limit(8)
            ->orderBy('t.create_at', 'DESC')
            ->get();
        if ($query->getNumRows() > 0) {
            $dataCountQuestion = $query->getResultArray();
        }

        $query_1 = $this->db->table($this->_test_knowledge_table . ' as tk')
            ->select('tk.knowledge_wrong, count(*) as count_wrong')
            ->join($this->_tests_table . ' as t', 't.id = tk.test_id', 'LEFT')
            ->where('user_id', $user_id)
            ->groupBy('tk.knowledge_wrong')
            ->orderBy('count_wrong', 'DESC')
            ->limit(8)
            ->get();
        if ($query_1->getNumRows() > 0) {
            $dataKnowlegeQuestion = $query_1->getResultArray();
        }

        $query_2 = $this->db->table($this->_tests_table . ' as t')
            ->select('t.test_name, t.reel_time, t.num_question')
            ->where('user_id', $user_id)
            ->orderBy('t.create_at', 'DESC')
            ->get();
        if ($query_2->getNumRows() > 0) {
            $dataTimeQuestion = $query_2->getResultArray();
        }

        $query_3 = $this->db->table($this->_tests_table . ' as t')
            ->select("t.test_name, (t.count_correct + t.count_wrong) as num_question, ROUND((t.count_correct / SUM(t.count_correct + t.count_wrong)) * 100, 2) as 'percent_correct'")
            ->where('user_id', $user_id)
            ->groupBy('t.test_name')
            ->orderBy('t.create_at', 'DESC')
            ->get();
        if ($query_3->getNumRows() > 0) {
            $dataPercentQuestion = $query_3->getResultArray();
        }

        $query_4 = $this->db->table($this->_tests_table . ' as t')
            ->select('count(t.id) as total_test, ROUND(AVG(t.reel_time), 2) as avg_time,  ROUND(AVG((t.count_correct / (t.count_correct + t.count_wrong)) * 100), 2) as percent_correct')
            ->where('user_id', $user_id)
            ->get();
        if ($query_4->getNumRows() > 0) {
            $dataTotalTest = $query_4->getResultArray();
        }

        $query_5 = $this->db->table($this->_tests_table . ' as t')
            ->select('count(id) as test_done')
            ->where('user_id', $user_id)
            ->where('t.count_pass', 0)
            ->get();
        if ($query_5->getNumRows() > 0) {
            $dataTestDone = $query_5->getResultArray();
        }

        $data = [
            'numQuestion' => $dataCountQuestion,
            'knowledgeQuestion' => $dataKnowlegeQuestion,
            'timeQuestion' => $dataTimeQuestion,
            'percentQuestion' => $dataPercentQuestion,
            'totalTest' => $dataTotalTest,
            'testDone' => $dataTestDone
        ];
        return $data;
    }
}
