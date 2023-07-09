<?= $this->extend('layouts/base'); ?>
<?= $this->section('content'); ?>
<style>
    .md-card-content {
        font-family: "Nunito", sans-serif;
        font-size: 15px;
        line-height: 20px;
        font-weight: 400;
    }

    .data_row {
        padding: 10px; /* Khoảng cách trong */
        margin-bottom: 10px; /* Khoảng cách giữa các hộp */
    }

    .data_row td {
        padding: 15px 5px; /* Khoảng cách trong cho các ô */
        font-size: 13px;
    }
</style>
<div id="general_page_content">
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
                                TỔNG QUAN ĐỀ THI
                            </h3>
                        </div>
                        <div class="md-card">
                            <div class="md-card-content">
                                <div class="uk-overflow-container uk-margin-bottom">
                                    <table
                                        class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair"
                                        id="ts_issues">
                                        <thead>
                                        <div class="all-test-box">
                                            <tr>
                                                <th class="">Tên đề thi</th>
                                                <th>Số câu hỏi</th>
                                                <th>Số câu đúng</th>
                                                <th>Số câu sai</th>
                                                <th>Số câu bỏ qua</th>
                                                <th>Thời gian ước tính</th>
                                                <th>Thời gian làm bài</th>
                                                <th>Ngày tạo</th>
                                                <th></th> <!-- Cột chứa biểu tượng xóa -->
                                                <th></th> <!-- Cột chứa biểu tượng thông tin -->
                                            </tr>
                                        </div>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($test as $t) { ?>
                                            <tr class="data_row">
                                                <td><?php echo $t['test_name']; ?></td>
                                                <td><?php echo $t['num_question']; ?></td>
                                                <td><?php echo $t['count_correct']; ?></td>
                                                <td><?php echo $t['count_wrong']; ?></td>
                                                <td><?php echo $t['count_pass']; ?></td>
                                                <td><?php echo $t['estimate_time']; ?></td>
                                                <td><?php echo $t['reel_time']; ?></td>
                                                <td><?php echo $t['create_at']; ?></td>
                                                <td>
                                                    <a href="../be_exam_online/all_test/test_detail/<?php echo $t['id']; ?>"
                                                       class="info_icon"><i
                                                            style="font-size: 20px; color: #1976d2;"
                                                            class="material-icons">info</i></a>
                                                </td>
                                                <td>
                                                    <a href="./be_exam_online/all_test/test_delete/<?php echo $t['id']; ?>"
                                                       class="delete_icon"><i
                                                            style="font-size: 20px; color: #e43a45;"
                                                            class="material-icons">delete</i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                    <!-- Các hàng dữ liệu khác -->
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // xử lý gửi status edit | delete
    const infoIcons = document.querySelectorAll('a.info_icon');
    infoIcons.forEach(function (icon) {
        icon.addEventListener('click', function (event) {
            event.preventDefault();
            // alert('click');
            const href = this.getAttribute('href');
            const parts = href.split("/");
            const id = parts[parts.length - 1];

            $.ajax({
                url: './all_test/allTest/getTestDetail',
                method: 'POST',
                data: {
                    testId: id
                },
                success: function (response) {
                    $('#general_page_content').html(response.html);
                },
                error: function (xhr, status, error) {
                    // Xử lý lỗi nếu có
                    console.error(error);
                }
            });
        });
    });

    // delete
    const deleteIcons = document.querySelectorAll('a.delete_icon');
    deleteIcons.forEach(function (icon) {
        icon.addEventListener('click', function (event) {
            event.preventDefault();
            // alert('click');
            const href = this.getAttribute('href');
            const parts = href.split("/");
            const id = parts[parts.length - 1];

            var confirmation = window.confirm('Bài thi sẽ được xóa và không thể khôi phục! Bạn có chắc chắn muốn xóa?');

            if (confirmation) {
                $.ajax({
                    url: './all_test/allTest/deleteTestDetail',
                    method: 'POST',
                    data: {
                        testId: id
                    },
                    success: function (response) {
                        if (response.result['result']) {
                            Toastify({
                                text: "Xóa bài thi thành công",
                                duration: 1000,
                                gravity: "top",
                                close: false,
                                callback: function () {
                                    setTimeout(function () {
                                        location.reload();
                                    }, 500); // Khoảng thời gian chờ trước khi reload trang (ở đây là 1 giây)
                                }
                            }).showToast();
                        }
                        // $('#general_page_content').html(response.html);
                    },
                    error: function (xhr, status, error) {
                        // Xử lý lỗi nếu có
                        console.error(error);
                    }
                });
            }
        });
    });
</script>
<?= $this->endSection(); ?>



