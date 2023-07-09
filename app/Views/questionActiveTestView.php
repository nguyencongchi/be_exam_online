<style>
    .info-test {
        display: flex;
        justify-content: space-between;
    }

    .count-time {
        margin-top: 16px;
        margin-right: 10px;
        font-size: 15px;
    }

    .count-time span {
        font-weight: bold;
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
                        <div class="info-test">
                            <div>
                                <h3 class="md-card-toolbar-heading-text">
                                    ĐỀ TRẮC NGHIỆM: <?php echo $info_test['testName']; ?> </span>
                                </h3>
                            </div>
                            <div class="count-time">Thời gian còn lại: <span
                                    id="countdown-timer"></span></div>
                        </div>
                    </div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div id="activeTest">
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
                                            <input type="radio" name="<?php echo $question['id']; ?>"
                                                   value="<?php echo $question['select_a']; ?>"
                                                   id="answer-<?php echo $question['id']; ?>-a">
                                            <label
                                                for="answer-<?php echo $question['id']; ?>-a"><?php echo $question['select_a']; ?></label>
                                        </div>
                                        <div class="question-option">
                                            <input type="radio" name="<?php echo $question['id']; ?>"
                                                   value="<?php echo $question['select_b']; ?>"
                                                   id="answer-<?php echo $question['id']; ?>-b">
                                            <label
                                                for="answer-<?php echo $question['id']; ?>-b"><?php echo $question['select_b']; ?></label>
                                        </div>
                                        <div class="question-option">
                                            <input type="radio" name="<?php echo $question['id']; ?>"
                                                   value="<?php echo $question['select_c']; ?>"
                                                   id="answer-<?php echo $question['id']; ?>-c">
                                            <label
                                                for="answer-<?php echo $question['id']; ?>-c"><?php echo $question['select_c']; ?></label>
                                        </div>
                                        <div class="question-option">
                                            <input type="radio" name="<?php echo $question['id']; ?>"
                                                   value="<?php echo $question['select_d']; ?>"
                                                   id="answer-<?php echo $question['id']; ?>-d">
                                            <label
                                                for="answer-<?php echo $question['id']; ?>-d"><?php echo $question['select_d']; ?></label>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div style="text-align: center">
                                    <button
                                        class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light"
                                        id="submitTestV1"
                                        class="btn btn-primary"> Nộp Bài
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>

            var countDownDate = new Date();
            countDownDate.setMinutes(countDownDate.getMinutes() + <?php echo $info_test['estimateTime']; ?>);
            var x = setInterval(function () {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                var countdownTimer = document.getElementById("countdown-timer");
                countdownTimer.innerHTML = minutes + ":" + (seconds < 10 ? "0" : "") + seconds;
                // Lưu giá trị countdownTimer vào biến countdownTimerValue
                 countdownTimerValue = countdownTimer.innerText;

                if (distance < 0) {
                    clearInterval(x);
                    countdownTimer.innerHTML = "00:00";

                    function showAlert(message, callback) {
                        alert(message);
                        if (typeof callback === 'function') {
                            callback();
                        }
                    }
                    function handleAlertOk() {
                        var answers = {};
                        $('input[type=radio]:checked').each(function () {
                            var name = $(this).attr('name');
                            var value = $(this).val();
                            answers[name] = value;
                        });
                        var timeTest = 0;
                        $.ajax({
                            url: './create_test/createTest/checkExamTest',
                            method: 'POST',
                            data: {
                                answers: answers,
                                timeTest: timeTest
                            },
                            dataType: 'json',
                            success: function (response) {
                                if (response.data.rs != false) {
                                    $('#general_page_content').html(response.html);
                                } else {
                                    alert(response.data.ms);
                                }
                            },
                            error: function (xhr, status, error) {
                            }
                        });
                    }
                    showAlert('Kết thúc thời gian thi', handleAlertOk);
                }
            }, 1000);
        </script>
        <script>
            $(document).ready(function () {
                $('#submitTestV1').click(function (e) {
                    alertify.confirm("Leave site?", 'Changes you made may not be saved.',
                        function () {
                            var answers = {};
                            $('input[type=radio]:checked').each(function () {
                                var name = $(this).attr('name');
                                var value = $(this).val();
                                answers[name] = value;
                            });
                            var timeTest = countdownTimerValue;
                            $.ajax({
                                url: './create_test/createTest/checkExamTest',
                                method: 'POST',
                                data: {
                                    answers: answers,
                                    timeTest: timeTest
                                },
                                dataType: 'json',
                                success: function (response) {
                                    if (response.data.rs != false) {
                                        $('#general_page_content').html(response.html);
                                    } else {
                                        alert(response.data.ms);
                                    }
                                },
                                error: function (xhr, status, error) {
                                }
                            });
                        },
                        function () {
                            // xu ly cancle
                            window.scrollTo(0, 0)
                        });
                    // alertify.confirm("Changes you made may not be saved.",function(){}, 'Tiêu đề mới',
                    //     function () {
                    //         $.ajax({
                    //             url: './create_test/createTest/checkExamTest',
                    //             method: 'POST',
                    //             data: {},
                    //             dataType: 'json',
                    //             success: function (response) {
                    //                 $('#general_page_content').html(response.html);
                    //             },
                    //             error: function (xhr, status, error) {
                    //             }
                    //         });
                    //     },
                    //     function () {
                    //         // xu ly cancle
                    //         window.scrollTo(0, 0)
                    //     });
                });
            });
        </script>






