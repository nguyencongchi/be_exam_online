<!doctype html>
<!--[if lte IE 9]>
<html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en"> <!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="public/assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="public/assets/img/favicon-32x32.png" sizes="32x32">
    <link rel="stylesheet" href="public/assets/css/multi-select-tag.css">

    <title>Exam Online</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- uikit -->
    <link rel="stylesheet" href="public/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">

    <link rel="stylesheet" href="public/bower_components/codemirror/lib/codemirror.css">

    <!-- flag icons -->
    <link rel="stylesheet" href="public/assets/icons/flags/flags.min.css" media="all">

    <!-- altair admin -->
    <link rel="stylesheet" href="public/assets/css/main.min.css" media="all">

    <!-- altair admin -->
    <link rel="stylesheet" href="public/assets/css/main.min_v1.css" media="all">

    <link href="public/assets/bootstrap/css/bootstrap.min.css" media="all">

    <!--   alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="public/assets/css/alertify.min.css" media="all"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/themes/default.min.css"/>

    <link rel="stylesheet" href="public/assets/icons/flags/flags.min.css" media="all">

    <!-- Toast   -->
    <link rel="stylesheet" href="public/assets/css/toast.css" media="all">
</head>
<body class=" sidebar_main_open sidebar_main_swipe">
<!-- main header -->
<header id="header_main">
    <div class="header_main_content">
        <nav class="uk-navbar">
            <!-- main sidebar switch -->
            <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                <span class="sSwitchIcon"></span>
            </a>
            <div class="uk-navbar-flip">
                <ul class="uk-navbar-nav user_actions">
                    <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                        <a href="#" class="user_action_image"><img class="md-user-image"
                                                                   src="public/assets/img/avatars/avatar-main.PNG"
                                                                   alt=""/> <?php  echo $_SESSION['username']; ?> </a>
                        <!--  uk-dropdown uk-dropdown-small uk-dropdown-active uk-dropdown-shown uk-dropdown-bottom -->
                        <div class="uk-dropdown uk-dropdown-small">
                            <ul class="uk-nav js-uk-prevent">
                                <li><a href="/be_exam_online/user_profile">My profile</a></li>
                                <li><a>Settings</a></li>
                                <li><a href="/be_exam_online/logout">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- main header end -->
<!-- main sidebar -->
<aside id="sidebar_main">
    <div class="sidebar_main_header">
        <a href="../be_exam_online/create_test"><img src="public/assets/img/exam_online.png"></a>
    </div>
    <div class="menu_section">
        <ul>
            <li class="" title="Create Test">
                <a href="../be_exam_online/create_test">
                    <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                    <span class="menu_title">New Test<span>
                </a>
            </li>
            <li title="All Test">
                <a href="../be_exam_online/all_test">
                    <span class="menu_icon"><i class="material-icons">&#xE8D2;</i></span>
                    <span class="menu_title">All Test</span>
                </a>
            </li>
            <li title="Report Result">
                <a href="../be_exam_online/report_test">
                    <span class="menu_icon"><i class="material-icons">&#xE85C;</i></span>
                    <span class="menu_title">Report Result</span>
                </a>
            </li>
            <li title="Daily Checklist">
                <a href="../be_exam_online/daily_checklist">
                    <span class="menu_icon"><i style="font-size: 22px" class="material-icons">&#xE8C0;</i></span>
                    <span class="menu_title">Daily Checklist</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<!-- main sidebar end -->
<!-- main contents -->
<?= $this->renderSection("content"); ?>

<!-- google web fonts footer -->
<script>
    WebFontConfig = {
        google: {
            families: [
                'Source+Code+Pro:400,700:latin',
                'Roboto:400,300,500,700,400italic:latin'
            ]
        }
    };
    (function () {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })();
</script>

<script src="public/assets/bootstrap/js/bootstrap.bundle.js"></script>

<!-- common functions -->
<script src="public/assets/js/common.min.js"></script>
<!-- uikit functions -->
<script src="public/assets/js/uikit_custom.js"></script>
<script src="public/assets/js/uikit_custom.min.js"></script>
<!-- altair common functions/helpers -->
<script src="public/assets/js/altair_admin_common.min.js"></script>

<script src="public/assets/js/multi-select-tag.js"></script>

<script src="public/assets/js/jquery-2.2.4.min.js"></script>

<script src="public/assets/js/jquery-3.6.1.min.js"></script>

<script src="public/assets/js/app.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<!-- page specific plugins -->
<!-- dragula.js -->
<script src="public/assets/js/dragula.min.js"></script>

<!--  scrum board functions -->
<script src="public/assets/js/page_scrum_board.min.js"></script>

<script src="public/assets/js/page_user_edit.min.js"></script>


<script>
    new MultiSelectTag('selec_adv_1')  // id
</script>
<script>
    $(document).ready(function () {
        $('#selec_class').change(function (e) {
            e.preventDefault();
            var sl_class = $(this).val();
            var sl_semester = $('#selec_semester').val();
            $.ajax({
                url: './create_test/createTest/getChapterByClass',
                type: 'post',
                data: {
                    sl_semester: sl_semester,
                    sl_class: sl_class
                },
                success: function (response) {
                    $('#sl_chapter').html(response.html);
                },
                error: function () {
                    alert('Lỗi xảy ra khi lấy dữ liệu!');
                }
            });
        });

        $('#selec_semester').change(function (e) {
            e.preventDefault();
            var sl_semester = $(this).val();
            var sl_class = $('#selec_class').val();
            $.ajax({
                url: './create_test/createTest/getChapterByClass',
                type: 'post',
                data: {
                    sl_semester: sl_semester,
                    sl_class: sl_class
                },
                success: function (response) {
                    $('#sl_chapter').html(response.html);
                },
                error: function () {
                    alert('Lỗi xảy ra khi lấy dữ liệu!');
                }
            });
        });
    });
</script>
<script>
    var sidebarItems = document.querySelectorAll("#sidebar_main .menu_section li");
    sidebarItems.forEach(function (item) {
        item.addEventListener("click", function () {
            sidebarItems.forEach(function (item) {
                item.classList.remove("current_section");
                localStorage.setItem("sidebarStatus", "closed");
            });
            this.classList.add("current_section");
            localStorage.setItem("currentSection", this.getAttribute("title"));
        });
    });

    if (!localStorage.getItem("initialSection")) {
        localStorage.setItem("initialSection", "Create Test");
    }

    window.addEventListener("DOMContentLoaded", function () {
        var sidebarStatus = localStorage.getItem("sidebarStatus");
        if (sidebarStatus === "closed") {
            document.body.classList.remove("sidebar_main_open");
        } else {
            document.body.classList.add("sidebar_main_open");
        }
    });

    window.addEventListener("DOMContentLoaded", function () {
        var currentSection = localStorage.getItem("currentSection");
        if (currentSection) {
            sidebarItems.forEach(function (item) {
                if (item.getAttribute("title") === currentSection) {
                    item.classList.add("current_section");
                }
            });
        }
    });
</script>
<script>
    $(document).ready(function () {
        $(".user_action_image").click(function (event) {
            event.stopPropagation(); // Prevent event bubbling

            var dropdownElement = document.querySelector('.uk-dropdown');
            dropdownElement.classList.add('uk-dropdown-small', 'uk-dropdown-active', 'uk-dropdown-shown', 'uk-dropdown-bottom');

            // Clicking outside the dropdown
            $(document).click(function (event) {
                if (!$(event.target).closest('.uk-dropdown').length) {
                    dropdownElement.classList.remove('uk-dropdown-small', 'uk-dropdown-active', 'uk-dropdown-shown', 'uk-dropdown-bottom');
                }
            });
        });
    });

</script>

<script>
    $(document).ready(function () {
        $('#btnInsertChecklist').click(function (e) {
            e.preventDefault();
            var title = $("#task_title_create").val();
            if (title === "") {
                alert('Title không được trống');
            } else {
                var title = $('#task_title_create').val();
                var description = $('#task_description_create').val();
                var priority = $("input[name='task_priority']:checked").val()

                $.ajax({
                    url: './daily_checklist/dailyChecklist/createChecklist',
                    method: 'POST',
                    data: {
                        title: title,
                        description: description,
                        status: priority
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === 'success') {
                            Toastify({
                                text: "Tạo Task mới thành công",
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
                $("#modalInsertChecklist").modal("hide");
            }
        });
    });
</script>

</body>
</html>


