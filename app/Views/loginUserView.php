<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login  </title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://backend.local.com/be_exam_online/public/assets/css/login.css">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
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
<section class="container forms">
    <div class="form login">
        <div class="form-content">
            <header>Login</header>
            <?= form_open($action = 'https://backend.local.com/be_exam_online/login', $method = 'post'); ?>
            <div class="field input-field">
                <input name="username" placeholder="Username" class="input" value="<?php echo set_value('username');?>" ?>
            </div>

            <div class="field input-field">
                <input type="password" placeholder="Password" class="password" name="password"  value="<?php echo set_value('password'); ?>">
                <i class='bx bx-hide eye-icon'></i>
            </div>
            <?php if (isset($validation_errors)) : ?>
                <?= $validation_errors ?>
            <?php endif; ?>
            <?php if (isset($verify_error)) : ?>
                <div class="error_verify">
                    <?= $verify_error ?>
                </div>
            <?php endif; ?>

            <div class="form-link">
                <a href="#" class="forgot-pass">Forgot password?</a>
            </div>

            <div class="field button-field">
                <button type="submit" name="btn-sign-in">Login</button>
            </div>
            <?= form_close(); ?>

            <div class="form-link">
                <span>Don't have an account? <a href="#" class="link signup-link">Signup</a></span>
            </div>
        </div>

        <div class="line"></div>

        <div class="media-options">
            <a href="#" class="field facebook">
                <i class='bx bxl-facebook facebook-icon'></i>
                <span>Login with Facebook</span>
            </a>
        </div>

        <div class="media-options">
            <a href="#" class="field google">
                <img src="public/assets/img/google.png" alt="" class="google-img">
                <span>Login with Google</span>
            </a>
        </div>
    </div>

    <!-- Signup Form -->

    <div class="form signup">
        <div class="form-content">
            <header>Signup</header>
            <form action="#">
                <div class="field input-field">
                    <input name="username" placeholder="Username" class="input" value="" ?>
                </div>

                <div class="field input-field">
                    <input type="email" placeholder="Email" class="input">
                </div>

                <div class="field input-field">
                    <input type="password" placeholder="Create password" class="password">
                </div>

                <div class="field input-field">
                    <input type="password" placeholder="Confirm password" class="password">
                    <i class='bx bx-hide eye-icon'></i>
                </div>

                <div class="field button-field">
                    <button>Signup</button>
                </div>
            </form>
            <div class="form-link">
                <span>Already have an account? <a href="#" class="link login-link">Login</a></span>
            </div>
        </div>
        <div class="line"></div>
        <div class="media-options">
            <a href="#" class="field facebook">
                <i class='bx bxl-facebook facebook-icon'></i>
                <span>Login with Facebook</span>
            </a>
        </div>

        <div class="media-options">
            <a href="#" class="field google">
                <img src="public/assets/img/google.png" alt="" class="google-img">
                <span>Login with Google</span>
            </a>
        </div>

    </div>
</section>
<!-- JavaScript -->
<script src="https://backend.local.com/be_exam_online/public/assets/js/login.js"></script>
</body>
</html>
