<?php

namespace App\Controllers\create_test;

use App\Controllers\BaseController;
use App\Models\create_test\McreateTest;
use App\Models\UsersModels;
use CodeIgniter\HTTP\Request;
use DateTime;


class createTest extends BaseController
{
    private $McreateTest;

    protected $request;
    private $session;

    public function __construct()
    {
        $this->session = session();
        helper('form');
        helper('general_helper');
        $this->request = service('request');
        $this->McreateTest = new McreateTest();
    }

    public function index()
    {
        if (!session()->has('login_user')) {
            return redirect()->to(base_url());
        }

        $data = [
            'chapters' => $this->McreateTest->getChapter("", ""),
        ];
        return view('createTestView', $data);
    }

    /**
     * getChapterByClass function
     * @return \CodeIgniter\HTTP\ResponseInterface
     * @author ChiNguyen
     */
    public function getChapterByClass()
    {
        $data_select = $this->request->getPost();
        if (!empty($data_select)) {
            $data = [
                'chapters' => $this->McreateTest->getChapter($data_select['sl_class'], $data_select['sl_semester']),
            ];
        }
        $html = view('selectChapterView', $data);
        return $this->response->setJSON([
            'html' => $html
        ]);
    }

    /**
     * createTest function
     * @return void
     * @author ChiNguyen
     */
    public function createTest()
    {
        $data = $this->request->getPost();
        $question_data = $this->McreateTest->getData($data,  $this->session->get('user_id'));

        if (!empty($question_data) && !empty($data)) {
            session()->set('total_question', $data['question']);
            session()->set('question_data', $question_data);
        }

        $data = [
            'question_data' => $question_data,
        ];

        $html = view('questionTestView', $data);

        return $this->response->setJSON([
            'html' => $html,
            'data' => $data,
        ]);
    }


    /**
     * saveTest function
     * @return void
     * @author ChiNguyen
     */
    public function activeTest()
    {
        $question_data = session()->get('question_data');
        $data_test_info = $this->request->getPost();
        if (!empty($data_test_info)) {
            session()->set('data_test_info', $data_test_info);
        }
        if (!empty($question_data) && !empty($data_test_info)) {
            $data_insert_test = [
                'question_data' => $question_data,
                'info_test' => $data_test_info,
            ];

            if (!empty($data_insert_test['info_test'])) {
                $item['testName'] = $data_insert_test['info_test']['testName'];
                $item['description'] = $data_insert_test['info_test']['description'];
                $item['estimate_time'] = $data_insert_test['info_test']['estimateTime'];
                $item['dateInput'] = $data_insert_test['info_test']['dateTest'];
                $test_id = $this->McreateTest->insertTests($item, $this->session->get('user_id'));
                session()->set('test_id', $test_id);

                if (!empty($data_insert_test['question_data'])) {
                    foreach ($data_insert_test['question_data'] as $qs) {
                        $result['test_id'] = $test_id;
                        $result['question_id'] = $qs['id'];
                        $this->McreateTest->insertTestQuestions($result);
                    }
                }
            }
            $html = view('questionActiveTestView', $data_insert_test);
            return $this->response->setJSON(
                [
                    'html' => $html
                ]
            );
        }
    }


    /**
     * knowledgeCount function
     * @param $data
     * @return array
     * @author ChiNguyen
     */
    public function knowledgeCount($data)
    {
        $knowledge_count = array();
        foreach ($data as $knowledge) {
            if (array_key_exists($knowledge, $knowledge_count)) {
                $knowledge_count[$knowledge]++;
            } else {
                $knowledge_count[$knowledge] = 1;
            }
        }

        foreach ($knowledge_count as $knowledge => $count) {
            $knowledgeList[] = [
                'knowledge' => $knowledge,
                'count' => $count
            ];
        }
        return $knowledgeList;
    }

    /**
     * checkResultTest function
     * check result answer | report knowledge
     * @return void
     * @author ChiNguyen
     */
    public
    function checkExamTest()
    {
        $data = [];
        $count_answer_correct = $count_answer_wrong = $count_answer_pass = 0;
        $rs_answer_correct = $rs_answer_wrong = $rs_answer_pass = $review = [];
        $question_data = session()->get('question_data');
        $data_test_info = session()->get('data_test_info');
        $total_question = session()->get('total_question');
        $data_user_answer = $this->request->getPost();
        if (!empty($data_user_answer['answers'])) {
            if (!empty($question_data)) {
                foreach ($question_data as $question) {
                    $rs[$question['id']] = [
                        'id' => $question['id'],
                        'answer' => $question['answer'],
                        'question_info' => $question['question_info']
                    ];
                }
            }
            if (!empty($data_user_answer)) {
                foreach ($rs as $key => $item) {
                    $priReview[] = $item['question_info'];
                    if (isset($data_user_answer['answers'][$key])) {
                        $value = $data_user_answer['answers'][$key];
                        if ($item['answer'] == $value) {
                            $count_answer_correct++;
                            $rs_answer_correct[] = [
                                'id' => $key,
                                'user_answer' => $value,
                                'is_correct' => 1
                            ];
                        } else {
                            $count_answer_wrong++;
                            $rs_answer_wrong[] = [
                                'id' => $key,
                                'user_answer' => $value,
                                'is_correct' => 0
                            ];
                            $review[] = $item['question_info'];
                        }
                    } else {
                        $count_answer_pass++;
                        $rs_answer_pass[] = [
                            'id' => $key,
                            'user_answer' => "",
                            'is_correct' => 2
                        ];
                    }
                }
            } else {
                $count_answer_pass = count($question_data);
                $rs_answer_pass[] = [
                    'id' => $rs,
                ];
            }

            // Tính tỉ lệ thống kê kiếm thức sai
            $knowledgePriCount = $this->knowledgeCount($priReview);
            $knowledgePassCount = $this->knowledgeCount($review);
            foreach ($knowledgePassCount as $item1) {
                foreach ($knowledgePriCount as $item2) {
                    if ($item1["knowledge"] == $item2["knowledge"]) {
                        $ratio = ($item1["count"] / $item2["count"]) * 100;
                        if ($ratio >= 50) {
                            $totalKnowWrong[] = $item1;
                        }
                    }
                }
            }

            if (!empty($data_user_answer['timeTest']) && $data_user_answer['timeTest'] != 0) {
                $estimatedTime = $data_test_info['estimateTime'] . ':00';
                list($hours, $minutes) = explode(':', $data_user_answer['timeTest']);
                list($hour, $minute) = explode(':', $estimatedTime);
                $timeInMinutes = $hours * 60 + $minutes;
                $timeEtimated = $hour * 60 + $minute;
                $remainingTime = $timeEtimated - $timeInMinutes;
                $minutes = floor($remainingTime / 60);
                $seconds = $remainingTime % 60;
                if ($seconds < 10) {
                    $seconds = '0' . $seconds;
                }
                $time = $minutes . ':' . $seconds;
            } else {
                $time = $data_test_info['estimateTime'] . ':00';
            }
            $data = [
                'rs' => true,
                'time' => $time,
                'total_question' => $total_question,
                'count_correct' => $count_answer_correct,
                'count_wrong' => $count_answer_wrong,
                'count_pass' => $count_answer_pass,
                'totalKnowWrong' => $totalKnowWrong
            ];
            $rs = array_merge($rs_answer_correct, $rs_answer_wrong, $rs_answer_pass);
            $testId = session()->get('test_id');
            foreach ($data['totalKnowWrong'] as $item) {
                $this->McreateTest->insertTestKnowledge($testId, $item);
            }
            foreach ($rs as $item1) {
                $this->McreateTest->updateTestQuestion($testId, $item1);
            }
            $this->McreateTest->updateTest($testId, $data);
            $dataReport = [
                'resultTest' => $this->McreateTest->getReportTest($testId),
                'infoTest' => $this->McreateTest->getInfoTest($testId),
                'knowledgeTest' => $this->McreateTest->getKnowledgeTest($testId)
            ];
            //   p($dataReport);
        } else {
            $data = [
                'rs' => false,
                'ms' => 'Vui lòng làm bài Test',
            ];
        }
        $html = view('showResultView', $dataReport);
        return $this->response->setJSON(
            [
                'html' => $html,
                'data' => $data
            ]
        );
    }
}