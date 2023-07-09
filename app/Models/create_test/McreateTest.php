<?php

namespace App\Models\create_test;

use App\Models\BaseModel;

class McreateTest extends BaseModel
{
    protected $_question_table = 'questions';
    protected $_tests_table = 'tests';
    protected $_test_questions_table = 'test_questions';
    protected $_chapters_table = 'chapters';
    protected $_lessons_table = 'lessons';
    protected $_test_knowledge = 'test_knowledge';

    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getLesson($data)
    {
        $query = $this->db->table($this->_lessons_table . ' as ls')
            ->select('ls.id, ls.name_lesson')
            ->join($this->_chapters_table . ' as cht', 'cht.id = ls.id_chapter', 'left')
            ->whereIn('cht.id', $data)
            ->get();
        return $query->getResultArray();
    }

    /**
     * getIdQuestionCreateList function
     * @author ChiNguyen
     * @return void
     */
    public function getIdQuestionCreatedList($user_id){
        $query = $this->db->table($this->_test_questions_table . ' as tq')
            ->select('tq.question_id')
            ->join($this->_tests_table . ' as t', 't.id = tq.test_id', 'left')
            ->where('user_id', $user_id)
            ->get();
        $result = $query->getResultArray();
        $idArray = array_column($result, 'question_id');
        return $idArray;
    }

    /**
     * getData function
     * @return array
     * @author ChiNguyen
     */
    public function getData($data, $user_id)
    {
        $listIdCreated = array_merge($this->getIdQuestionCreatedList($user_id));
        if (!empty($data)) {
            $lessonList = $this->getLesson($data['chapter']);
            foreach ($lessonList as $lesson) {
                $lessonIdList[] = $lesson['id'];
            }
            shuffle($lessonIdList);
            $query = $this->db->table($this->_question_table)
                ->select('questions.id,questions.contents,questions.level,select_a,select_b,select_c,select_d,image_as,image_explain_as,id_lessons,answer, CONCAT_WS(COALESCE(kn_format.name_knowledge, \'\'), COALESCE(dl_format.name_knowledge, \'\'), COALESCE(bt_format.name_knowledge, \'\')) AS question_info')
                ->join('kn_format', 'kn_format.id = questions.id_kn_format', 'left')
                ->join('dl_format', 'dl_format.id = questions.id_dl_format', 'left')
                ->join('bt_format', 'bt_format.id = questions.id_bt_format', 'left')
                ->where('level', $data['level'])
                ->whereNotIn('questions.id', $listIdCreated)
                ->orderBy('RAND()');
            if (!empty($data['chapter'])) {
                $query->whereIn('id_lessons', $lessonIdList);
            }
            if (!empty($data['question'])) {
                $query->limit($data['question']);
            }
            $rs = $query->get()->getResultArray();
            if(empty($rs)){
             //   echo 'thieu cau hoi';
                $query1 = $this->db->table($this->_question_table)
                    ->select('questions.id,questions.contents,questions.level,select_a,select_b,select_c,select_d,image_as,image_explain_as,id_lessons,answer, CONCAT_WS(COALESCE(kn_format.name_knowledge, \'\'), COALESCE(dl_format.name_knowledge, \'\'), COALESCE(bt_format.name_knowledge, \'\')) AS question_info')
                    ->join('kn_format', 'kn_format.id = questions.id_kn_format', 'left')
                    ->join('dl_format', 'dl_format.id = questions.id_dl_format', 'left')
                    ->join('bt_format', 'bt_format.id = questions.id_bt_format', 'left')
                    ->where('level', $data['level'])
                    //->whereNotIn('questions.id', $listIdCreated)
                    ->orderBy('RAND()');
                if (!empty($data['chapter'])) {
                    $query1->whereIn('id_lessons', $lessonIdList);
                }
                if (!empty($data['question'])) {
                    $query1->limit($data['question']);
                }
                $rs = $query1->get()->getResultArray();
            }
            return $rs;
        }
    }

    /**
     * getChapter function
     * @param $class
     * @param $semester
     * @return array
     * @author ChiNguyen
     */
    public
    function getChapter($class, $semester)
    {
        if (!empty($class) && !empty($semester)) {
            if ($semester == 3) {
                $query = $this->db->table($this->_chapters_table)
                    ->select('*')
                    ->where('id_subject', $class);
            } else {
                $query = $this->db->table($this->_chapters_table)
                    ->select('*')
                    ->where('id_subject', $class)
                    ->where('id_semester', $semester);
            }
        } else {
            $query = $this->db->table($this->_chapters_table)
                ->select('*')
                ->where('id_subject', 1)
                ->where('id_semester', 1);
        }
        //p($query->get()->getResultArray());
        return $query->get()->getResultArray();
    }


    /**
     * insertTests function
     * @param $item
     * @return void
     * @author ChiNguyen
     */
    public
    function insertTests($item, $user_id)
    {
        if (!empty($item)) {
            $data = [
                'test_name' => $item['testName'],
                'test_description' => $item['description'],
                'estimate_time' => $item['estimate_time'],
                'reel_time' => 0,
                'create_at' => $item['dateInput'],
                'user_id' => $user_id,
            ];
            $this->db->table($this->_tests_table)->insert($data);
            return $this->db->insertID();
        }
        return false;
    }

    /**
     * insertTestQuestions function
     * @param $item
     * @return void
     * @author ChiNguyen
     */
    public function insertTestQuestions($item)
    {
        if (!empty($item)) {
            $data = [
                'test_id' => $item['test_id'],
                'question_id' => $item['question_id'],
                'user_answer' => '',
                'is_correct' => '',
            ];
            $this->db->table($this->_test_questions_table)->insert($data);
        }
    }

    /**
     * insertTestKnowkedge function
     * @param $testId
     * @param $item
     * @return void
     * @author ChiNguyen
     */
    public function insertTestKnowledge($testId, $item)
    {
        if (!empty($item)) {
            $data = [
                'test_id' => $testId,
                'knowledge_wrong' => $item['knowledge'],
            ];
            $this->db->table($this->_test_knowledge)->insert($data);
        }
    }

    /**
     * updateTest function
     * @param $testId
     * @param $data
     * @return void
     * @author ChiNguyen
     */
    public function updateTest($testId, $data)
    {
        if (!empty($testId) && !empty($data)) {
            $dataUpdate = [
                'num_question' => $data['total_question'],
                'count_correct' => $data['count_correct'],
                'count_wrong' => $data['count_wrong'],
                'count_pass' => $data['count_pass'],
                'reel_time' => $data['time'],
            ];
            $this->db->table($this->_tests_table)
                ->where('id', $testId)
                ->update($dataUpdate);
        }
    }

    /**
     * updateTestQuestion function
     * @param $testId
     * @param $data
     * @return void
     * @author ChiNguyen
     */
    public function updateTestQuestion($testId, $data)
    {
        if (!empty($testId) && !empty($data)) {
            $dataUpdate = [
                'user_answer' => $data['user_answer'],
                'is_correct' => $data['is_correct'],
            ];
            $this->db->table($this->_test_questions_table)
                ->where('test_id', $testId)
                ->where('question_id', $data['id'])
                ->update($dataUpdate);
        }
    }


    /**
     * getReportTest function
     * @param $testId
     * @return array
     * @author ChiNguyen
     */
    public function getReportTest($testId)
    {
        $query = $this->db->table($this->_tests_table . ' as t')
            ->select('t.id, ts.question_id, ts.user_answer, ts.is_correct, qt.contents, qt.select_a, qt.select_b, qt.select_c, qt.select_d, qt.answer, qt.image_as, qt.image_explain_as')
            ->join($this->_test_questions_table . ' as ts', 'ts.test_id = t.id', 'left')
            ->join($this->_question_table . ' as qt', 'qt.id = ts.question_id', 'left')
            ->where('t.id', $testId)
            ->get();
        $results = $query->getResultArray();
        return $results;
    }

    /**
     * getInfoTest function
     * @param $testId
     * @return array
     * @author ChiNguyen
     */
    public function getInfoTest($testId)
    {
        $query = $this->db->table($this->_tests_table . ' as t')
            ->select("t.*, ROUND((t.count_correct / SUM(t.count_correct + t.count_wrong)) * 100, 2) as 'percent_correct'") // question correct / question tested
            ->where('t.id', $testId)
            ->get();
        $results = $query->getResultArray();
        return $results;
    }


    /**
     * getKnowledgeTest function
     * @param $testId
     * @return array
     * @author ChiNguyen
     */
    public function getKnowledgeTest($testId)
    {
        $query = $this->db->table($this->_test_knowledge . ' as tk')
            ->select('tk.*')
            ->where('tk.test_id', $testId)
            ->get();
        $results = $query->getResultArray();
        return $results;
    }
}