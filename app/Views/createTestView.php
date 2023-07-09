<?= $this->extend('layouts/base'); ?>
<?= $this->section('content'); ?>
<style>
    .md-card-content {
        font-family: "Nunito", sans-serif;
        font-size: 15px;
        line-height: 20px;
        font-weight: 400;
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
                                YÊU CẦU TẠO ĐỀ CƠ BẢN
                            </h3>
                        </div>
                        <div class="md-card">
                            <div class="md-card-content">
                                <div class="form-ajax">
                                    <div class=" form-group-select">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Số câu</label>
                                            <br>
                                            <select class="form-control" id="selec_question" name="selec_num_question">
                                                <option>5</option>
                                                <option>10</option>
                                                <option>20</option>
                                                <option>30</option>
                                                <option>45</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Độ khó</label>
                                            <br>
                                            <select class="form-control" id="selec_level" name="selec_level">
                                                <option value="0">Dễ</option>
                                                <option value="1">Trung Bình</option>
                                                <option value="2">Khó</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Môn học</label>
                                            <br>
                                            <select class="form-control" id="selec_subject" name="selec_subject">
                                                <option>Vật lý</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Lớp</label>
                                            <br>
                                            <select class="form-control" id="selec_class" name="select_class">
                                                <option value="1">Lớp 11</option>
                                                <option value="3">Lớp 12</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group-select" style="margin-top: 20px">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Học kỳ</label>
                                            <br>
                                            <select class="form-control" id="selec_semester" name="select_semester">
                                                <option value="1">Học kỳ I</option>
                                                <option value="2">Học kỳ II</option>
                                                <option value="3">Cả năm</option>
                                            </select>
                                        </div>
                                        <div class="form-group" style="width: 74%" id="sl_chapter">
                                            <label for="selec_adv_1">Chương</label>
                                            <select id="selec_adv_1" name="selec_adv_1[]" multiple>
                                                <?php foreach ($chapters as $item) { ?>
                                                    <option value="<?php echo $item['id']; ?>"
                                                            selected><?php echo $item['name_chapter']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div style="margin-top: 10px">
                                        <button
                                            class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light"
                                            id="submitCreateTest"
                                            type="submit" class="btn btn-primary">Tạo đề
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>



