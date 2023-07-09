<div id="question-content">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .container-show-content .inner-show {
            padding: 0px 40px 0px 40px;
            background: #f8f9fa;
            border-radius: 5px;
        }

        .inner-show-min {
            padding: 15px 0px;
        }

        p {
            /*color: #666;*/
            /*!*font-size: 1px;*!*/
            /*line-height: 1.5;*/
            font-size: 15px;
            padding-left: 20px;
        }

        .accordion {
            margin-top: -30px;
        }

        .accordion .accordion-content {
            margin: 10px 0;
            border-radius: 4px;
            overflow: hidden;
        }

        .accordion-content.open {
            padding-bottom: 10px;
        }

        .accordion-content header {
            display: flex;
            min-height: 50px;
            padding: 0 15px;
            cursor: pointer;
            align-items: center;
            transition: all 0.2s linear;
        }

        .accordion-content.open header {
            min-height: 35px;
        }

        .accordion-content header .title {
            font-size: 14px;
            color: #35509a;
        }

        .accordion-content header i {
            margin-left: 10px;
            font-size: 10px;
            color: #35509a;
        }

        .accordion-content .description {
            height: 0;
            font-size: 12px;
            color: #333;
            font-weight: 400;
            padding: 0 15px;
            transition: all 0.2s linear;
            /*background-color: rgb(246, 246, 246);*/
        }

        .modal-dialog {
            max-width: 800px; /* Set the maximum width of the modal dialog */
        }

        .modal-content {
            width: 100%; /* Set the width of the modal content to fill the dialog */
        }

        .correct-answer {
            background: #ddfbe1;
        }

        .wrong-answer {
            background-color: #ffe8e8;
        }

    </style>
    <div id="page_content">
        <div id="page_content_inner">
            <!-- large chart -->
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <div class="md-card">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <i class="md-icon material-icons md-card-fullscreen-activate">&#xE5D0;</i>
                                <i class="md-icon material-icons">&#xE5D5;</i>
                                <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}">
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#">Action 1</a></li>
                                            <li><a href="#">Action 2</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <h3 class="md-card-toolbar-heading-text">
                                KẾT QUẢ LUYỆN TẬP
                            </h3>
                        </div>
                        <div class="md-card">
                            <div class="md-card-content">
                                <div class="mb-3">
                                    <a href="#result-answers" class="btn btn-sm btn-primary">Xem đáp án</a>
                                    <a href=""
                                       class="btn btn-sm btn-sky">Quay về trang tạo đề thi</a>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-3">
                                        <div class="result-stats-box">
                                            <div class="result-stats-item">
                                                <span class="result-stats-label">Kết quả làm bài</span>
                                                <span
                                                    class="result-stats-text"><?php echo $infoTest[0]['count_correct']; ?> / <?php echo $infoTest[0]['num_question']; ?></span>
                                            </div>
                                            <br>
                                            <div class="result-stats-item">
                                                <span class="result-stats-label">Độ chính xác (#đúng/#tổng)</span>
                                                <span
                                                    class="result-stats-text"> <?php echo $infoTest[0]['percent_correct']; ?>%</span>
                                            </div>
                                            <br>
                                            <div class="result-stats-item">
                                                <span class="result-stats-label">Thời gian hoàn thành</span>
                                                <span
                                                    class="result-stats-text"><?php echo $infoTest[0]['reel_time']; ?></span>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <div class="row">
                                            <div class="col">
                                                <div class="result-score-box">
                                                    <div class="result-score-icon text-correct"><span
                                                            class="fas fa-check-circle"></span></div>
                                                    <div class="result-score-icontext text-correct">Trả lời đúng</div>
                                                    <div
                                                        class="result-score-text"><?php echo $infoTest[0]['count_correct']; ?></div>
                                                    <div class="result-score-sub"><span>câu hỏi</span></div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="result-score-box">
                                                    <div class="result-score-icon text-wrong"><span
                                                            class="fas fa-times-circle"></span></div>
                                                    <div class="result-score-icontext text-wrong">Trả lời sai</div>
                                                    <div
                                                        class="result-score-text"><?php echo $infoTest[0]['count_wrong']; ?></div>
                                                    <div class="result-score-sub"><span>câu hỏi</span></div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="result-score-box">
                                                    <div class="result-score-icon text-unanswered"><span
                                                            class="fas fa-minus-circle"></span></div>
                                                    <div class="result-score-icontext text-unanswered">Bỏ qua</div>
                                                    <div
                                                        class="result-score-text"><?php echo $infoTest[0]['count_pass']; ?></div>
                                                    <div class="result-score-sub"><span>câu hỏi</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <div class="container-show-content">
                                    <h4 style="text-align: center;">PHÂN TÍCH CHI TIẾT</h4>
                                    <div class="inner-show">
                                        <div class="inner-show-min">
                                            <h4 style="font-size: 17px">Các câu hỏi bạn làm sai liên quan</h4>
                                            <div>
                                                <?php
                                                $lythuyet = [];
                                                $baitap = [];
                                                $dinhluat = [];
                                                foreach ($knowledgeTest as $item) {
                                                    $knowledge = $item['knowledge_wrong'];
                                                    if (strpos($knowledge, 'Lý thuyết') !== false) {
                                                        $lythuyet[] = $item;
                                                    } elseif (strpos($knowledge, 'Bài tập') !== false) {
                                                        $baitap[] = $item;
                                                    } elseif (strpos($knowledge, 'Định luật') !== false) {
                                                        $dinhluat[] = $item;
                                                    }
                                                }
                                                ?>
                                                <?php if (!empty($lythuyet)) { ?>
                                                    <p style="padding-left: 0px">LÝ THUYẾT</p>
                                                    <ul>
                                                        <?php foreach ($lythuyet as $lt) { ?>
                                                            <li style="margin-bottom: 5px;"><?php echo $lt['knowledge_wrong']; ?></li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>
                                                <?php if (!empty($dinhluat)) { ?>
                                                    <p style="padding-left: 0px">ĐỊNH LUẬT</p>
                                                    <ul>
                                                        <?php foreach ($dinhluat as $dl) { ?>
                                                            <li style="margin-bottom: 5px;"><?php echo $dl['knowledge_wrong']; ?></li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>
                                                <?php if (!empty($baitap)) { ?>
                                                    <p style="padding-left: 0px">BÀI TẬP</p>
                                                    <ul>
                                                        <?php foreach ($baitap as $bt) { ?>
                                                            <li style="margin-bottom: 5px;"><?php echo $bt['knowledge_wrong']; ?></li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-result">
                                    <table class="table table-striped" style="margin-top: 50px">
                                        <thead>
                                        <tr>
                                            <th style="min-width:200px">Phân loại câu hỏi</th>
                                            <th>Số câu đúng</th>
                                            <th>Số câu sai</th>
                                            <th>Số câu bỏ qua</th>
                                            <th>Độ chính xác</th>
                                            <th style="min-width:300px">Danh sách câu hỏi</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td>N/A</td>
                                            <td><?php echo $infoTest[0]['count_correct']; ?></td>
                                            <td><?php echo $infoTest[0]['count_wrong']; ?></td>
                                            <td><?php echo $infoTest[0]['count_pass']; ?></td>
                                            <td><?php echo $infoTest[0]['percent_correct']; ?>%</td>
                                            <td>
                                                <?php $count = 1;
                                                foreach ($resultTest as $question) { ?>
                                                    <?php
                                                    $isCorrect = $question['is_correct'];
                                                    // $class = ($isCorrect == 1) ? 'correct' : 'wrong';
                                                    if ($isCorrect == 0) {
                                                        $class = 'wrong';
                                                    } elseif ($isCorrect == 1) {
                                                        $class = 'correct';
                                                    } else {
                                                        $class = '';
                                                    }
                                                    ?>
                                                    <a class="result-question-item <?php echo $class; ?>"
                                                       data-bs-toggle="modal"
                                                       data-bs-target="#exampleModalCenter"
                                                       data-question-id="<?php echo $question['question_id']; ?>"
                                                       href=""><?php echo $count++; ?> </a>
                                                <?php } ?>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalCenter">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="exampleModalLongTitle">Đáp
                                                                    án chi tiết #<span id="modalCount"></span></h4>
                                                                <button
                                                                    style="font-weight: 600; border: 1px solid; border-radius: 5px; font-size: 15px; background: white; color: #1976d2;"
                                                                    type="button" class="btn-close"
                                                                    data-bs-dismiss="modal">
                                                                    X
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div id="questionContent"
                                                                     class="question-content"
                                                                     style="padding: 10px; background: aliceblue; border-radius: 5px;">
                                                                </div>
                                                                <p id="select_a"></p>
                                                                <p id="select_b"></p>
                                                                <p id="select_c"></p>
                                                                <p id="select_d"></p>
                                                                <p style="margin-top: 10px; color: #3cb46e!important; font-weight: 600"
                                                                   id="answer"></p>
                                                            </div>
                                                            <div class="accordion">
                                                                <div class="accordion-content">
                                                                    <header>
                                                                    <span
                                                                        class="title">Giải thích chi tiết đáp án</span>
                                                                        <i class="fa-solid fa-plus"></i>
                                                                    </header>
                                                                    <div class="description" id="explainAnswer">
                                                                        <img style="width: 100%" id="explainAnswerImg"
                                                                             src="" alt="description of image">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // Xử lý sự kiện khi click vào câu hỏi
            var questionItems = document.querySelectorAll('.result-question-item');
            questionItems.forEach(function (item) {
                item.addEventListener('click', function () {
                        var questionId = this.getAttribute('data-question-id');
                        var questionContent = '';
                        var select_a = '';
                        var select_b = '';
                        var select_c = '';
                        var select_d = '';
                        var answer = '';
                        var explainAnwser = '';
                        var resultTest = <?php echo json_encode($resultTest); ?>;

                        // console.log(resultTest);

                        function findQuestionById(questionId) {
                            for (var i = 0; i < resultTest.length; i++) {
                                if (resultTest[i].question_id == questionId) {
                                    return resultTest[i];
                                }
                            }
                            return null;
                        }

                        var question = findQuestionById(questionId);
                        console.log(question);
                        if (question) {
                            var questionContent = question.contents;
                            var select_a = question.select_a;
                            var select_b = question.select_b;
                            var select_c = question.select_c;
                            var select_d = question.select_d;
                            var answer = question.answer;
                            var explainAnswer = question.image_explain_as;
                            var isCorrect = question.is_correct;
                            var userAnswer = question.user_answer;

                            // Loại bỏ các thẻ HTML trong questionContent
                            var tempElement = document.createElement('div');
                            tempElement.innerHTML = questionContent;
                            var questionContentText = tempElement.textContent || tempElement.innerText;

                            var count = 1;
                            resultTest.forEach(function (item, index) {
                                if (item.question_id == questionId) {
                                    count = index + 1;
                                    return false;
                                }
                            });
                            // Set the question count in the modal
                            document.getElementById('modalCount').textContent = count;

                            // Cập nhật nội dung trong modal
                            var questionContentElement = document.getElementById('questionContent');
                            var select_aElement = document.getElementById('select_a');
                            var select_bElement = document.getElementById('select_b');
                            var select_cElement = document.getElementById('select_c');
                            var select_dElement = document.getElementById('select_d');
                            var answerExplainElement = document.getElementById('explainAnswerImg');
                            questionContentElement.textContent = questionContentText;
                            select_aElement.textContent = select_a;
                            select_bElement.textContent = select_b;
                            select_cElement.textContent = select_c;
                            select_dElement.textContent = select_d;
                            answerExplainElement.src = "public/assets/img/image_answers/" + explainAnswer + ".PNG";

                            // Xử lý modal | hiển thị đáp án đúng sai
                            // Thêm lớp CSS tương ứng

                            // Loại bỏ các lớp CSS trước đó
                            select_aElement.classList.remove('correct-answer', 'wrong-answer');
                            select_bElement.classList.remove('correct-answer', 'wrong-answer');
                            select_cElement.classList.remove('correct-answer', 'wrong-answer');
                            select_dElement.classList.remove('correct-answer', 'wrong-answer');

                            if (isCorrect == 1) {
                                if (userAnswer === select_a) {
                                    select_aElement.classList.add('correct-answer');
                                } else if (userAnswer === select_b) {
                                    select_bElement.classList.add('correct-answer');
                                } else if (userAnswer === select_c) {
                                    select_cElement.classList.add('correct-answer');
                                } else if (userAnswer === select_d) {
                                    select_dElement.classList.add('correct-answer');
                                }
                                var answerElement = document.getElementById('answer');
                                answerElement.textContent = "";
                            } else if (isCorrect == 0) {
                                if (userAnswer === select_a) {
                                    select_aElement.classList.add('wrong-answer');
                                } else if (userAnswer === select_b) {
                                    select_bElement.classList.add('wrong-answer');
                                } else if (userAnswer === select_c) {
                                    select_cElement.classList.add('wrong-answer');
                                } else if (userAnswer === select_d) {
                                    select_dElement.classList.add('wrong-answer');
                                }
                                var answerElement = document.getElementById('answer');
                                answerElement.textContent = "Đáp án đúng: " + answer;
                            } else if (isCorrect == 2 && userAnswer === "") {
                                var answerElement = document.getElementById('answer');
                                answerElement.textContent = "Đáp án đúng: " + answer;
                            }

                        } else {
                            alert('Data Empty');
                        }
                    }
                );
            });

            const accordionContent = document.querySelectorAll(".accordion-content");
            accordionContent.forEach((item, index) => {
                let header = item.querySelector("header");
                header.addEventListener("click", () => {
                    item.classList.toggle("open");

                    let description = item.querySelector(".description");
                    if (item.classList.contains("open")) {
                        description.style.height = `${description.scrollHeight}px`;
                        item.querySelector("i").classList.replace("fa-plus", "fa-minus");
                    } else {
                        description.style.height = "0px";
                        item.querySelector("i").classList.replace("fa-minus", "fa-plus");
                    }
                    removeOpen(index);
                })
            })

            function removeOpen(index1) {
                accordionContent.forEach((item2, index2) => {
                    if (index1 != index2) {
                        item2.classList.remove("open");

                        let des = item2.querySelector(".description");
                        des.style.height = "0px";
                        item2.querySelector("i").classList.replace("fa-minus", "fa-plus");
                    }
                })
            }
        </script>
    </div>



