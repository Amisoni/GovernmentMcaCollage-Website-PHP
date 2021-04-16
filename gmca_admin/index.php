<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
        <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
        <meta charset="UTF-8">
        <title>Government MCA College</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="libs/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/fonts/line-awesome/css/line-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/fonts/open-sans/styles.css">
        <link rel="stylesheet" type="text/css" href="libs/tether/css/tether.min.css">
        <link rel="stylesheet" type="text/css" href="assets/styles/common.min.css">
        <link rel="stylesheet" type="text/css" href="assets/styles/pages/auth.min.css">
    </head>
    <body>

        <div class="ks-page">
            <div class="ks-page-content">
                <div class="ks-logo">Government MCA College</div>
                <div class="card panel panel-default ks-light ks-panel ks-login">
                    <div class="card-block">
                        <form class="form-container" action="home.php?page=login_action" method="post">
                            <h4 class="ks-header">Login</h4>
                            <p><?php if(isset($_SESSION['login_errmsg'])){echo"<b Style='color:red'>". $_SESSION['login_errmsg'];unset($_SESSION['login_errmsg']);} ?></p>
                            <div class="form-group">
                                <div class="input-icon icon-left icon-lg icon-color-primary">
                                    <input type="text" class="form-control" placeholder="Email" name="email" id="InputEmail" aria-describedby="emailHelp" data-validation="email">
                                    <span class="icon-addon">
                                        <span class="la la-at"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon icon-left icon-lg icon-color-primary">
                                    <input type="password" class="form-control" placeholder="Password" name="password" id="txtPassword"  data-validation="strength"
                                           data-validation-strength="2">
                                    <span class="icon-addon">
                                        <span class="la la-key"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <center><button type="submit" class="btn btn-primary">Login</button></center><br>
                            </div>
                        </form>
                        <!-- <form action="signup.php">
                        <lable>Not Registered Yet?</lable> <button type="submit" class="btn btn-primary">Signup</button>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>

        <script src="libs/jquery/jquery.min.js"></script>
        <script src="libs/tether/js/tether.min.js"></script>
        <script src="libs/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
