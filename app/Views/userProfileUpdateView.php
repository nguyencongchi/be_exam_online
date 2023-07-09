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
            <form action="" class="uk-form-stacked" id="user_edit_form">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-large-7-10">
                        <div class="md-card">
                            <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                                <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="public/assets/img/avatars/user.png" alt="user avatar"/>
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div class="user_avatar_controls">
                                        <span class="btn-file">
                                            <span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
                                            <span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
                                            <input type="file" name="user_edit_avatar_control"
                                                   id="user_edit_avatar_control">
                                        </span>
                                        <a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput"><i
                                                class="material-icons">&#xE5CD;</i></a>
                                    </div>
                                </div>
                                <div class="user_heading_content">
                                    <h2 class="heading_b"><span class="uk-text-truncate" id="user_edit_uname">Kallie Will</span><span
                                            class="sub-heading"
                                            id="user_edit_position">Land acquisition specialist</span></h2>
                                </div>
                                <div class="md-fab-wrapper">
                                    <div class="md-fab md-fab-toolbar md-fab-small md-fab-accent">
                                        <i class="material-icons">&#xE8BE;</i>
                                        <div class="md-fab-toolbar-actions">
                                            <button type="submit" id="user_edit_save"
                                                    data-uk-tooltip="{cls:'uk-tooltip-small',pos:'bottom'}"
                                                    title="Save"><i class="material-icons md-color-white">&#xE161;</i>
                                            </button>
                                            <button type="submit" id="user_edit_print"
                                                    data-uk-tooltip="{cls:'uk-tooltip-small',pos:'bottom'}"
                                                    title="Print"><i class="material-icons md-color-white">&#xE555;</i>
                                            </button>
                                            <button type="submit" id="user_edit_delete"
                                                    data-uk-tooltip="{cls:'uk-tooltip-small',pos:'bottom'}"
                                                    title="Delete"><i class="material-icons md-color-white">&#xE872;</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="user_content">
                                <ul id="user_edit_tabs" class="uk-tab"
                                    data-uk-tab="{connect:'#user_edit_tabs_content'}">
                                    <li class="uk-active"><a href="#">Basic</a></li>
                                    <li><a href="#">Groups</a></li>
                                    <li><a href="#">Todo</a></li>
                                </ul>
                                <ul id="user_edit_tabs_content" class="uk-margin">
                                    <li style="list-style: none">
                                        <div class="uk-margin-top">
                                            <h3 class="full_width_in_card heading_c">
                                                Contact info
                                            </h3>
                                            <div class="uk-grid">
                                                <div class="uk-width-1-1">
                                                    <div class="uk-grid uk-grid-width-1-1 uk-grid-width-large-1-2"
                                                         data-uk-grid-margin>
                                                        <div>
                                                            <div class="uk-input-group">
                                                                <span class="uk-input-group-addon">
                                                                    <i class="md-list-addon-icon material-icons">&#xE158;</i>
                                                                </span>
                                                                <label class="edit-user">Email</label>
                                                                <input type="text" class="md-input" style="margin-bottom: 15px"
                                                                       name="user_edit_email"
                                                                       value="qschultz@gmail.com"/>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="uk-input-group">
                                                                <span class="uk-input-group-addon">
                                                                    <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                                                </span>
                                                                <label class="edit-user">Phone Number</label>
                                                                <input type="text" class="md-input" style="margin-bottom: 15px"
                                                                       name="user_edit_phone"
                                                                       value="1-361-556-2380x920"/>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="uk-input-group">
                                                                <span class="uk-input-group-addon">
                                                                    <i class="md-list-addon-icon uk-icon-facebook-official"></i>
                                                                </span>
                                                                <label class="edit-user">Facebook</label>
                                                                <input type="text" class="md-input" style="margin-bottom: 15px"
                                                                       name="user_edit_facebook"
                                                                       value="facebook.com/envato"/>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="uk-input-group">
                                                                <span class="uk-input-group-addon">
                                                                    <i class="md-list-addon-icon uk-icon-twitter"></i>
                                                                </span>
                                                                <label class="edit-user">Twitter</label>
                                                                <input type="text" class="md-input" style="margin-bottom: 15px"
                                                                       name="user_edit_twitter"
                                                                       value="twitter.com/envato"/>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="uk-input-group">
                                                                <span class="uk-input-group-addon">
                                                                    <i class="md-list-addon-icon uk-icon-linkedin"></i>
                                                                </span>
                                                                <label class="edit-user">Linkdin</label>
                                                                <input type="text" class="md-input" style="margin-bottom: 15px"
                                                                       name="user_edit_linkdin"
                                                                       value="linkedin.com/company/envato"/>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="uk-input-group">
                                                                <span class="uk-input-group-addon">
                                                                    <i class="md-list-addon-icon uk-icon-google-plus"></i>
                                                                </span>
                                                                <label class="edit-user">Google+</label>
                                                                <input type="text" class="md-input" style="margin-bottom: 15px"
                                                                       name="user_edit_google_plus"
                                                                       value="plus.google.com/+envato/about"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-large-3-10">
                        <div class="md-card">
                            <div class="md-card-content">
                                <h3 class="heading_c uk-margin-medium-bottom">Other settings</h3>
                                <div class="uk-form-row">
                                    <input type="checkbox" checked data-switchery id="user_edit_active"/>
                                    <label for="user_edit_active" class="inline-label">User Active</label>
                                </div>
                                <hr class="md-hr">
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>




