<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login | LaraStarter</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo e(asset('themes/plugins/bootstrap/dist/css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('themes/plugins/font-awesome/css/font-awesome.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('themes/plugins/Ionicons/css/ionicons.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('themes/css/AdminLTE.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('themes/css/skins/skin-black-light.min.css')); ?>">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <style>
        .skin-black-light > .wrapper > .main-header {
            border-top: 6px solid #3c8dbc;
        }
        </style>
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href=""><b>LaraStarter</b></a>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">Please Login</p>
                <form action="<?php echo e(url('login')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group has-feedback">
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8" style="padding-top:5px">
                            <label for="">&copy; adesr 2018</label>
                        </div>
                        <div class="col-xs-4"><button class="btn btn-primary btn-block btn-flat">Login</button></div>
                    </div>
                </form>
            </div>
        </div>
        
        <script type="text/javascript" src="<?php echo e(asset('themes/plugins/jquery/dist/jquery.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('themes/plugins/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('themes/js/adminlte.min.js')); ?>"></script>
        <?php if(session('error')): ?>
        <script type="text/javascript">
        $(function() {
            $('div.form-group.has-feedback').addClass('has-error');
            $('#username').val('<?php echo e(old('username')); ?>');
        });
        </script>
        <?php endif; ?>
    </body>
</html>
