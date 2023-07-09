/**
 * function submit createTest create Exam
 * @author ChiNguyen
 */
$(document).ready(function () {
    $('#submitCreateTest').click(function (e) {
        e.preventDefault();
        var selectedQuestion = $('#selec_question').val();
        var selectedLevel = $('#selec_level').val();
        var selectedSubject = $('#selec_subject').val();
        var selectedClass = $('#selec_class').val();
        var selectedSemester = $('#selec_semester').val();
        var selectedChapter = $('#selec_adv_1').val();

        $.ajax({
            url: './create_test/createTest/createTest',
            method: 'POST',
            data: {
                question: selectedQuestion,
                level: selectedLevel,
                subject: selectedSubject,
                class: selectedClass,
                semester: selectedSemester,
                chapter: selectedChapter
            },
            dataType: 'json',
            success: function (response) {
                $('#general_page_content').html(response.html);
            },
            error: function (xhr, status, error) {

            }
        });
    });
});

function openModalUpdateChecklist(id) {
    $.ajax({
        url: './daily_checklist/dailyChecklist/getCheckListById/' + id,
        type: 'GET',
        success: function (response) {
            $('#task_title_update').val(response[0].subject);
            $('#task_description_update').val(response[0].content);
            // console.log(response[0].status);
            switch (parseInt(response[0].status)) {
                case 1:
                    $('#task_priority_cancle_update').val(response[0].status);
                    $('#task_priority_cancle_update').prop('checked', true);
                    break;
                case 2:
                    //$('#task_priority_new_task_update').val(response[0].status);
                    $('#task_priority_new_task_update').prop('checked', true);
                    break;
                case 3:
                    $('#task_priority_in_process_update').val(response[0].status);
                    $('#task_priority_in_process_update').prop('checked', true);
                    break;
                case 4:
                    $('#task_priority_done_update').val(response[0].status);
                    $('#task_priority_done_update').prop('checked', true);
                    break;
            }
        },
        error: function () {
            // Xử lý khi có lỗi xảy ra
        }
    });


    // update
    $(document).ready(function () {
        $('#btnUpdateChecklist').click(function (e) {
            e.preventDefault();
            console.log('davao');
            var title = $("#task_title_update").val();
            if (title === "") {
                alert('Title không được trống');
            } else {
                var title = $('#task_title_update').val();
                var description = $('#task_description_update').val();
                var priority = $("input[name='task_priority_update']:checked").val()

                $.ajax({
                    url: './daily_checklist/dailyChecklist/updateChecklist',
                    method: 'POST',
                    data: {
                        id: id,
                        title: title,
                        description: description,
                        status: priority
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === 'success') {
                            Toastify({
                                text: "Update Task thành công",
                                duration: 1000,
                                gravity: "top",
                                close: false,
                                callback: function () {
                                    setTimeout(function () {
                                        location.reload();
                                    }, 500);
                                }
                            }).showToast();
                        } else {
                            alert(response.message);
                        }
                        window.scrollTo(0, 0);
                    },
                    error: function (xhr, status, error) {
                    }
                });
                $("#modalUpdateChecklist").modal("hide");
            }
        });
    });

}

