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
            <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
                <div class="uk-width-large-7-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_menu" data-uk-dropdown="{pos:'left-top'}">
                                <i class="md-icon material-icons md-icon-light">&#xE5D4;</i>
                                <div class="uk-dropdown uk-dropdown-small">
                                    <ul class="uk-nav">
                                        <li><a href="#">Action 1</a></li>
                                        <li><a href="#">Action 2</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="user_heading_avatar">
                                <div class="thumbnail">
                                    <img style="margin-left: 7px" src="public/assets/img/avatars/user.png" alt="user avatar"/>
                                </div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b uk-margin-bottom"><span
                                        class="uk-text-truncate">Nguyễn Công Chí</span><span class="sub-heading">Trang thông tin cá nhân của bạn</span>
                                </h2>
                                <ul class="user_stats">
                                    <li>
                                        <h4 class="heading_a">0 <span class="sub-heading">Posts</span></h4>
                                    </li>
                                    <li>
                                        <h4 class="heading_a">0 <span class="sub-heading">Photos</span></h4>
                                    </li>
                                    <li>
                                        <h4 class="heading_a">0 <span class="sub-heading">Following</span></h4>
                                    </li>
                                </ul>
                            </div>
                            <a class="md-fab md-fab-small md-fab-accent" href="./user_profile_edit">
                                <i class="material-icons">&#xE150;</i>
                            </a>
                        </div>
                        <div class="user_content">
                            <ul id="user_profile_tabs" class="uk-tab"
                                data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}"
                                data-uk-sticky="{ top: 48, media: 960 }">
                                <li class="uk-active"><a href="#">About</a></li>
                                <li><a href="#">Photos</a></li>
                                <li><a href="#">Posts</a></li>
                            </ul>
                            <ul id="user_profile_tabs_content" class="uk-margin">
                                <li style="list-style: none">
                                    <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom"
                                         data-uk-grid-margin>
                                        <div class="uk-width-large-1-2">
                                            <h4 class="heading_c uk-margin-small-bottom">Contact Info</h4>
                                            <ul class="md-list md-list-addon">
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons">&#xE158;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">NguyenCongChi0607@gmail.com</span>
                                                        <span class="uk-text-small uk-text-muted">Email</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">0328644258</span>
                                                        <span class="uk-text-small uk-text-muted">Phone</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon uk-icon-facebook-official"></i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">facebook.com/envato</span>
                                                        <span class="uk-text-small uk-text-muted">Facebook</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon uk-icon-twitter"></i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">twitter.com/envato</span>
                                                        <span class="uk-text-small uk-text-muted">Twitter</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="uk-width-large-1-2">
                                            <h4 class="heading_c uk-margin-small-bottom">My Account</h4>
                                            <ul class="md-list">
                                                <li>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a
                                                                href="#">Tài khoản</a></span>
                                                        <span class="uk-text-small uk-text-muted">NguyenCongChi</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a
                                                                href="#">Mật khẩu</a></span>
                                                        <span class="uk-text-small uk-text-muted">******</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="#"></a></span>
                                                        <span class="uk-text-small uk-text-muted"></span>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <h4 class="heading_c uk-margin-bottom">Timeline</h4>
                                    <div class="timeline">
                                        <div class="timeline_item">
                                            <div class="timeline_icon timeline_icon_success"><i class="material-icons">&#xE85D;</i>
                                            </div>
                                            <div class="timeline_date">
                                                09 <span>Feb</span>
                                            </div>
                                            <div class="timeline_content">Created ticket <a
                                                    href="#"><strong>#3289</strong></a></div>
                                        </div>
                                        <div class="timeline_item">
                                            <div class="timeline_icon timeline_icon_danger"><i class="material-icons">&#xE5CD;</i>
                                            </div>
                                            <div class="timeline_date">
                                                15 <span>Feb</span>
                                            </div>
                                            <div class="timeline_content">Deleted post <a href="#"><strong>Necessitatibus
                                                        suscipit omnis consectetur velit eos molestiae et.</strong></a>
                                            </div>
                                        </div>
                                        <div class="timeline_item">
                                            <div class="timeline_icon"><i class="material-icons">&#xE410;</i></div>
                                            <div class="timeline_date">
                                                19 <span>Feb</span>
                                            </div>
                                            <div class="timeline_content">
                                                Added photo
                                                <div class="timeline_content_addon">
                                                    <img src="assets/img/gallery/Image16.jpg" alt=""/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline_item">
                                            <div class="timeline_icon timeline_icon_primary"><i class="material-icons">&#xE0B9;</i>
                                            </div>
                                            <div class="timeline_date">
                                                21 <span>Feb</span>
                                            </div>
                                            <div class="timeline_content">
                                                New comment on post <a href="#"><strong>Non minima quaerat non quo
                                                        ullam.</strong></a>
                                                <div class="timeline_content_addon">
                                                    <blockquote>
                                                        Similique excepturi consequatur unde voluptatem vitae commodi ut
                                                        ut qui voluptas voluptate repellat maiores aperiam similique.&hellip;
                                                    </blockquote>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline_item">
                                            <div class="timeline_icon timeline_icon_warning"><i class="material-icons">&#xE7FE;</i>
                                            </div>
                                            <div class="timeline_date">
                                                29 <span>Feb</span>
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
                            <div class="uk-margin-medium-bottom">
                                <h3 class="heading_c uk-margin-bottom">Alerts</h3>
                                <ul class="md-list md-list-addon">
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon material-icons uk-text-warning">&#xE8B2;</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span class="md-list-heading">Aut laborum et.</span>
                                            <span class="uk-text-small uk-text-muted uk-text-truncate">Exercitationem minus dolorem quia.</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon material-icons uk-text-success">&#xE88F;</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span class="md-list-heading">Quis ad.</span>
                                            <span class="uk-text-small uk-text-muted uk-text-truncate">Possimus totam libero ad tempora libero.</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon material-icons uk-text-danger">&#xE001;</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span class="md-list-heading">Fugit assumenda exercitationem.</span>
                                            <span class="uk-text-small uk-text-muted uk-text-truncate">Aliquid tempora voluptate fuga cum.</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>




