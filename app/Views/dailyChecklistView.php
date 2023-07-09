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
        <div id="scrum_board" class="uk-clearfix">
            <div>
                <div class="scrum_column_heading">Cancle</div>
                <div class="scrum_column">
                    <div id="scrum_column_cancle">
                        <?php if (!empty($dataCheckList) && !empty($dataCheckList['task_cancel'])) {
                            foreach ($dataCheckList['task_cancel'] as $item) { ?>
                                <div style="margin-bottom: 10px">
                                    <div class="scrum_task blocker" style="cursor: pointer"
                                         data-uk-modal="{ center:true }" data-bs-toggle="modal"
                                         data-bs-target="#modalUpdateChecklist" onclick="openModalUpdateChecklist(<?php echo $item['id']; ?>)">
                                        <h3 class="scrum_task_title"><a href="<?php echo $item['id']; ?>"
                                                                        data-uk-modal="{ center:true }"><?php echo $item['subject']; ?></a>
                                        </h3>
                                        <p class="scrum_task_description"><?php echo $item['content']; ?></p>
                                        <p class="scrum_task_info"><span class="uk-text-muted">Date: </span> <a
                                                href="#"><?php echo $item['date']; ?></a></p>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>
            </div>
            <div>
                <div class="scrum_column_heading">New Task</div>
                <div class="scrum_column">
                    <div id="scrum_column_newTask">
                        <?php if (!empty($dataCheckList) && !empty($dataCheckList['task_new'])) {
                            foreach ($dataCheckList['task_new'] as $item) { ?>
                                <div style="margin-bottom: 10px">
                                    <div class="scrum_task" style="border-left-color: #1976d2; cursor: pointer"
                                         data-uk-modal="{ center:true }" data-bs-toggle="modal"
                                         data-bs-target="#modalUpdateChecklist" onclick="openModalUpdateChecklist(<?php echo $item['id']; ?>)">
                                        <h3 class="scrum_task_title"><a href="<?php echo $item['id']; ?>"
                                                                        data-uk-modal="{ center:true }"><?php echo $item['subject']; ?></a>
                                        </h3>
                                        <p class="scrum_task_description"><?php echo $item['content']; ?></p>
                                        <p class="scrum_task_info"><span class="uk-text-muted">Date:</span> <a
                                                href="#"><?php echo $item['date']; ?></a></p>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>
            </div>
            <div>
                <div class="scrum_column_heading">In progress</div>
                <div class="scrum_column">
                    <div id="scrum_column_inProgress">
                        <?php if (!empty($dataCheckList) && !empty($dataCheckList['task_progress'])) {
                            foreach ($dataCheckList['task_progress'] as $item) { ?>
                                    <div style="margin-bottom: 10px">
                                        <div class="scrum_task critical" style="cursor: pointer"
                                             data-uk-modal="{ center:true }" data-bs-toggle="modal"
                                             data-bs-target="#modalUpdateChecklist" onclick="openModalUpdateChecklist(<?php echo $item['id']; ?>)">
                                            <h3 class="scrum_task_title"><a href="<?php echo $item['id']; ?>"
                                                                            data-uk-modal="{ center:true }"><?php echo $item['subject']; ?></a>
                                            </h3>
                                            <p class="scrum_task_description"><?php echo $item['content']; ?></p>
                                            <p class="scrum_task_info"><span class="uk-text-muted">Date:</span> <a
                                                    href="#"><?php echo $item['date']; ?></a></p>
                                        </div>
                                    </div>
                            <?php }
                        } ?>
                    </div>
                </div>
            </div>
            <div>
                <div class="scrum_column_heading">Done</div>
                <div class="scrum_column">
                    <div id="scrum_column_done">
                        <?php if (!empty($dataCheckList) && !empty($dataCheckList['task_done'])) {
                            foreach ($dataCheckList['task_done'] as $item) { ?>
                                <div style="margin-bottom: 10px">
                                    <div class="scrum_task minor" style="cursor: pointer"
                                         data-uk-modal="{ center:true }" data-bs-toggle="modal"
                                         data-bs-target="#modalUpdateChecklist"  onclick="openModalUpdateChecklist(<?php echo $item['id']; ?>)">
                                        <h3 class="scrum_task_title"><a href="<?php echo $item['id']; ?>"
                                                                        data-uk-modal="{ center:true }"><?php echo $item['subject']; ?></a>
                                        </h3>
                                        <p class="scrum_task_description"><?php echo $item['content']; ?></p>
                                        <p class="scrum_task_info"><span class="uk-text-muted">Date:</span> <a
                                                href="#"><?php echo $item['date']; ?></a></p>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  open modal insert checklist  -->
    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-accent md-fab-wave" data-uk-modal="{ center:true }" data-bs-toggle="modal"
           data-bs-target="#modalInsertChecklist">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>
    <!--  modal insert  -->
    <div class="modal fade" id="modalInsertChecklist">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">
                        Create New Task
                    </h4>
                    <button
                        style="font-weight: 600; border: 1px solid; border-radius: 5px; font-size: 15px; background: white; color: #1976d2;"
                        type="button" class="btn-close" data-bs-dismiss="modal">
                        X
                    </button>
                </div>
                <div class="modal-body">
                    <div id="create-task">
                        <form class="uk-form-stacked">
                            <div class="uk-margin-medium-bottom">
                                <label for="task_title">Title</label>
                                <input type="text" class="md-input" id="task_title_create" name="snippet_title"/>
                            </div>
                            <div class="uk-margin-medium-bottom">
                                <label for="task_description">Description</label>
                                <textarea class="md-input" id="task_description_create"
                                          name="task_description"></textarea>
                            </div>
                            <div class="uk-margin-medium-bottom">
                                <label for="task_priority" class="uk-form-label">Priority</label>
                                <span class="icheck-inline">
                            <input type="radio" name="task_priority" value="1" id="task_priority_cancle"
                                   data-md-icheck/>
                            <label for="task_priority_cancle"
                                   class="inline-label uk-badge uk-badge-danger">CANCLE</label>
                        </span>
                                <span class="icheck-inline">
                            <input type="radio" name="task_priority" value="2" id="task_priority_new_task" checked
                                   data-md-icheck/>
                            <label for="task_priority_new_task"
                                   class="inline-label uk-badge uk-badge-newtask">NEW TASK</label>
                        </span>
                                <span class="icheck-inline">
                            <input type="radio" name="task_priority" value="3" id="task_priority_in_process"
                                   data-md-icheck/>
                            <label for="task_priority_in_process"
                                   class="inline-label uk-badge uk-badge-warning">IN PROCESS</label>
                        </span>
                                <span class="icheck-inline">
                            <input type="radio" name="task_priority" value="4" id="task_priority_done" data-md-icheck/>
                            <label for="task_priority_done"
                                   class="inline-label uk-badge uk-badge-success">DONE</label>
                        </span>

                            </div>
                    </div>
                    </form>
                    <div class="modal-footer-special">
                        <button style="background: #1976d2; margin-right: 10px"
                                type="submit" id="btnInsertChecklist"
                                class="startTest btn btn-primary">
                            Add Task
                        </button>
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Cancle
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  modal update  -->
<div class="modal fade" id="modalUpdateChecklist">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">
                    Update Task
                </h4>
                <button
                    style="font-weight: 600; border: 1px solid; border-radius: 5px; font-size: 15px; background: white; color: #1976d2;"
                    type="button" class="btn-close" data-bs-dismiss="modal">
                    X
                </button>
            </div>
            <div class="modal-body">
                <div id="create-task">
                    <form class="uk-form-stacked">
                        <div class="uk-margin-medium-bottom">
                            <label for="task_title">Title</label>
                            <input type="text" class="md-input" id="task_title_update" name="snippet_title"/>
                        </div>
                        <div class="uk-margin-medium-bottom">
                            <label for="task_description">Description</label>
                            <textarea class="md-input" id="task_description_update" name="task_description"></textarea>
                        </div>
                        <div class="uk-margin-medium-bottom">
                            <label for="task_priority" class="uk-form-label">Priority</label>
                            <span class="icheck-inline">
                            <input type="radio" name="task_priority_update" value="1" id="task_priority_cancle_update"
                                   data-md-icheck/>
                            <label for="task_priority_cancle_update"
                                   class="inline-label uk-badge uk-badge-danger">CANCLE</label>
                        </span>
                            <span class="icheck-inline">
                            <input type="radio" name="task_priority_update" value="2" id="task_priority_new_task_update"
                                    data-md-icheck/>
                            <label for="task_priority_new_task_update"
                                   class="inline-label uk-badge uk-badge-newtask">NEW TASK</label>
                        </span>
                            <span class="icheck-inline">
                            <input type="radio" name="task_priority_update" value="3" id="task_priority_in_process_update"
                                   data-md-icheck/>
                            <label for="task_priority_in_process_update"
                                   class="inline-label uk-badge uk-badge-warning">IN PROCESS</label>
                        </span>
                            <span class="icheck-inline">
                            <input type="radio" name="task_priority_update" value="4" id="task_priority_done_update"
                                   data-md-icheck/>
                            <label for="task_priority_done_update"
                                   class="inline-label uk-badge uk-badge-success">DONE</label>
                        </span>
                        </div>
                    </form>
                    <div class="modal-footer-special">
                        <button style="background: #1976d2; margin-right: 10px"
                                type="submit"  id="btnUpdateChecklist"
                                class="startTest btn btn-primary">
                            Save
                        </button>
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Cancle
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>



