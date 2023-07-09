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

    <title>Altair Admin v2.4.0 - Login Page</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>

    <!-- uikit -->
    <link rel="stylesheet" href="https://backend.local.com/be_exam_online/public/bower_components/uikit/css/uikit.almost-flat.min.css"/>

    <!-- altair admin login page -->
    <link rel="stylesheet" href="https://backend.local.com/be_exam_online/public/assets/css/login_page.min.css"/>

</head>
<body class="login_page">
<style>

    p.error {
        margin: 0px;
        color: red;
        font-size: 12px;
        padding-left: 30px;
        text-align: left;
        margin-bottom: 20px;
        margin-top: -10px;
    }

    .errors ul {
        list-style: none;
        /* padding: 27px; */
        padding-left: 0px;
        margin-top: 10px;
        color: red;
        font-size: 14px;
    }

    .errors ul li {
        text-align: left;
        margin-bottom: 5px;
    }

    .error_verify {
        list-style: none;
        /* padding: 27px; */
        padding-left: 0px;
        margin-top: 10px;
        color: red;
        text-align: left;
        font-size: 14px;
        padding-bottom: 15px;
    }

</style>
<div class="login_page_wrapper">
    <div class="md-card" id="login_card" style="border-radius: 5px">
        <div class="md-card-content large-padding" id="login_form">
            <div class="login_heading">
                <div class="user_avatar"></div>
            </div>
            <!--            <form action="./login_test/loginTest/checkLogin" method="post">-->
            <?= form_open($action = 'https://backend.local.com/be_exam_online/login', $method = 'post');?>
            <div class="uk-form-row">
                <label for="login_username">Username</label>
                <input class="md-input" type="text" id="login_username" name="username" value="<?php echo set_value('username'); ?>"/>
            </div>
            <div class="uk-form-row">
                <label for="login_password">Password</label>
                <input class="md-input" type="password" id="login_password" name="password"  value="<?php echo set_value('password'); ?>"/>
            </div>
            <?php if (isset($validation_errors)) : ?>
                <?= $validation_errors ?>
            <?php endif; ?>
            <?php if (isset($verify_error)) : ?>
                <div class="error_verify">
                    <?= $verify_error ?>
                </div>
            <?php endif; ?>
            <div class="uk-margin-medium-top">
                <button type="submit" name="btn-sign-in" value="1" class="md-btn md-btn-primary md-btn-block md-btn-large">Sign
                    In
                </button>
            </div>
            <!--  three icon  -->
            <div class="uk-margin-top">
                <a href="#" id="login_help_show" class="uk-float-right">Need help?</a>
                <span class="icheck-inline">
                            <input type="checkbox" name="login_page_stay_signed" id="login_page_stay_signed"
                                   data-md-icheck/>
                            <label for="login_page_stay_signed" class="inline-label">Stay signed in</label>
                        </span>
            </div>
            <!--            </form>-->
            <?= form_close(); ?>
        </div>
        <!-- Need help   -->
        <div class="md-card-content large-padding uk-position-relative" id="login_help" style="display: none">
            <button type="button"
                    class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
            <h2 class="heading_b uk-text-success">Can't log in?</h2>
            <p>Here’s the info to get you back in to your account as quickly as possible.</p>
            <p>First, try the easiest thing: if you remember your password but it isn’t working, make sure that Caps
                Lock is turned off, and that your username is spelled correctly, and then try again.</p>
            <p>If your password still isn’t working, it’s time to <a href="#" id="password_reset_show">reset your
                    password</a>.</p>
        </div>
        <div class="md-card-content large-padding" id="login_password_reset" style="display: none">
            <button type="button"
                    class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
            <h2 class="heading_a uk-margin-large-bottom">Reset password</h2>
            <form>
                <div class="uk-form-row">
                    <label for="login_email_reset">Your email address</label>
                    <input class="md-input" type="text" id="login_email_reset" name="login_email_reset"/>
                </div>
                <div class="uk-margin-medium-top">
                    <a href="index.html" class="md-btn md-btn-primary md-btn-block">Reset password</a>
                </div>
            </form>
        </div>
        <div class="md-card-content large-padding" id="register_form" style="display: none">
            <button type="button"
                    class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
            <h2 class="heading_a uk-margin-medium-bottom">Create an account</h2>
            <form>
                <div class="uk-form-row">
                    <label for="register_username">Username</label>
                    <input class="md-input" type="text" id="register_username" name="register_username"/>
                </div>
                <div class="uk-form-row">
                    <label for="register_password">Password</label>
                    <input class="md-input" type="password" id="register_password" name="register_password"/>
                </div>
                <div class="uk-form-row">
                    <label for="register_password_repeat">Repeat Password</label>
                    <input class="md-input" type="password" id="register_password_repeat"
                           name="register_password_repeat"/>
                </div>
                <div class="uk-form-row">
                    <label for="register_email">E-mail</label>
                    <input class="md-input" type="text" id="register_email" name="register_email"/>
                </div>
                <div class="uk-margin-medium-top">
                    <a href="index.html" class="md-btn md-btn-primary md-btn-block md-btn-large">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
    <div class="uk-margin-top uk-text-center">
        <a href="#" id="signup_form_show">Create an account</a>
    </div>
</div>

<!-- common functions -->
<script src="https://backend.local.com/be_exam_online/public/assets/js/common.min.js"></script>
<!-- uikit functions -->
<script src="https://backend.local.com/be_exam_online/public/assets/js/uikit_custom.min.js"></script>
<!-- altair core functions -->
<script src="https://backend.local.com/be_exam_online/public/assets/js/altair_admin_common.min.js"></script>

<!-- altair login page functions -->
<script src="https://backend.local.com/be_exam_online/public/assets/js/login.min.js"></script>
</body>
</html>
