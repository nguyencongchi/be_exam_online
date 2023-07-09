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
                            ĐỀ TRẮC NGHIỆM
                        </h3>
                    </div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <!-- The Modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLongTitle">Thực hiện tạo đề
                                                thi</h4>
                                            <button
                                                style="font-weight: 600; border: 1px solid; border-radius: 5px; font-size: 15px; background: white; color: #1976d2;"
                                                type="button" class="btn-close" data-bs-dismiss="modal">
                                                X
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="save-test">
                                                <div class="form-row">
                                                    <div class="col-5">
                                                        <input type="text" class="form-control" name="testName"
                                                               id="testName"
                                                               placeholder="Nhập tên đề thi">
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control" name="estimateTime"
                                                               id="estimateTime"
                                                               placeholder="Thời gian thi">
                                                    </div>
                                                    <div class="col">
                                                        <input type="date" class="form-control" id="dateInput"
                                                               name="dateInput" disabled>
                                                    </div>
                                                    <div class="input-group"
                                                         style="margin-top: 10px; padding-left: 5px; padding-right: 5px">
                                                        <textarea class="form-control" placeholder="Ghi chú"
                                                                  id="description"
                                                                  name="description"
                                                                  aria-label="With textarea"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer-special">
                                                    <button style="background: #1976d2; margin-right: 10px"
                                                            type="submit" id="practiceTest" data-bs-dismiss="modal"
                                                            class="startTest btn btn-primary">
                                                        Luyện tập
                                                    </button>
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Đóng
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="list-question-active">
                                <?php
                                $count = 0;
                                foreach ($question_data as $question) {
                                    $count++;
                                    ?>
                                    <div class="question" style="margin-bottom: 30px">
                                        <div class="question-content"><span style="color: #1976d2; font-weight: 600"> Câu <?php echo $count ?>  : </span><?php echo $question['contents']; ?>
                                            <?php if (!empty($question['image_as'])) { ?>
                                                <div class="question-image" style="text-align: left">
                                                    <img style="padding: 10px;"
                                                         src="public/assets/img/image_answer/<?php echo $question['image_as'] . '.PNG'; ?>"
                                                         alt="description of image">
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <input type="hidden" name="question-<?php echo $question['id']; ?>"
                                               value="<?php echo $question['id']; ?>">
                                        <div class="question-option">
                                            <input type="radio" name="answer-<?php echo $question['id']; ?>"
                                                   value="<?php echo $question['select_a']; ?>"
                                                   id="answer-<?php echo $question['id']; ?>-a">
                                            <label
                                                for="answer-<?php echo $question['id']; ?>-a"><?php echo $question['select_a']; ?></label>
                                        </div>
                                        <div class="question-option">
                                            <input type="radio" name="answer-<?php echo $question['id']; ?>"
                                                   value="<?php echo $question['select_b']; ?>"
                                                   id="answer-<?php echo $question['id']; ?>-b">
                                            <label
                                                for="answer-<?php echo $question['id']; ?>-b"><?php echo $question['select_b']; ?></label>
                                        </div>
                                        <div class="question-option">
                                            <input type="radio" name="answer-<?php echo $question['id']; ?>"
                                                   value="<?php echo $question['select_c']; ?>"
                                                   id="answer-<?php echo $question['id']; ?>-c">
                                            <label
                                                for="answer-<?php echo $question['id']; ?>-c"><?php echo $question['select_c']; ?></label>
                                        </div>
                                        <div class="question-option">
                                            <input type="radio" name="answer-<?php echo $question['id']; ?>"
                                                   value="<?php echo $question['select_d']; ?>"
                                                   id="answer-<?php echo $question['id']; ?>-d">
                                            <label
                                                for="answer-<?php echo $question['id']; ?>-d"><?php echo $question['select_d']; ?></label>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div style="text-align: center">
                                <div style="text-align: center">
                                    <button
                                        class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light"
                                        class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#myModal"> Bắt đầu thi
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var currentDate = new Date().toISOString().slice(0, 10);

            document.getElementById('dateInput').value = currentDate;

            document.getElementById('save-test').addEventListener('submit', function () {
                document.getElementById('dateInput').removeAttribute('disabled');
            });

            $(document).ready(function () {
                $('#practiceTest').click(function (e) {
                    e.preventDefault();
                    var testName = $('#testName').val();
                    var estimateTime = $('#estimateTime').val();
                    var dateTest = $('#dateInput').val();
                    var description = $('#description').val();
                    $.ajax({
                        url: './create_test/createTest/activeTest',
                        method: 'POST',
                        data: {
                            testName: testName,
                            estimateTime: estimateTime,
                            dateTest: dateTest,
                            description: description
                        },
                        dataType: 'json',
                        success: function (response) {
                            console.log(response);
                            $('#general_page_content').html(response.html);
                            window.scrollTo(0, 0);
                        },
                        error: function (xhr, status, error) {

                        }
                    });
                });
            });
        </script>
    </div>





