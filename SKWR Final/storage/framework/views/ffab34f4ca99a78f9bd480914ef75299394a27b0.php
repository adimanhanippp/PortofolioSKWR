<!DOCTYPE html>
<style type="text/css">
  body{
    background-image: url("login-3.jpg");
    background-size: cover;
    background-repeat: repeat;
    background-attachment: fixed;
  }
</style>
<html lang="en" dir="ltr" >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login | SKWR</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo e(asset('themes/plugins/bootstrap/dist/css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('themes/plugins/font-awesome/css/font-awesome.min.css')); ?>">
        <!-- <link rel="stylesheet" href="<?php echo e(asset('themes/plugins/Ionicons/css/ionicons.min.css')); ?>"> -->
        <link rel="stylesheet" href="<?php echo e(asset('themes/css/AdminLTE.min.css')); ?>">
        <!-- <link rel="stylesheet" href="<?php echo e(asset('themes/css/skins/skin-black-light.min.css')); ?>"> -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="<?php echo e(asset('themes/plugins/toastr/toastr.min.css')); ?>">
        <style>
        .skin-black-light > .wrapper > .main-header {
            border-top: 6px solid #3c8dbc;
        }
        .top-section{
          height: 100%;
        }
        </style>
    </head>
<!-- <body class="hold-transition login-page"> -->
    <body>
        <div class="wrapper">
            <div class="login-logo ">
              <a href=""><img src="<?php echo e(asset('logo-skwr.png')); ?>" alt="Our Logo" style="position:relative;" height="200";>
              <br> <a  style="font-weight:bold; font-family:Arial; color:white; font-size:20px" > Serikat Karyawan Wika Realty  </a>
            </a>
            </div>
            <!-- <div class="login-box-body"> -->
            <div class="container" style="width:350px; background-color:white;">
              <br>
                <p class="login-box-msg" style="font-weight:bold; font-family:Arial;">Please Login</p>
                <form action="login" method="post">
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
                      <div class="col-xs-12">
                        <div class="col-xs-4 pull-left" >
                          <a href=" <?php echo e(url('register')); ?>">Register  </a>
                        </div>
                      <div class="col-xs-4 pull-right">
                        <button class="btn btn-primary btn-block btn-flat">Login</button>
                      </div>
                      </div>
                      <div class="col-xs-12">
                        <div class="col-xs-8" style="padding-top:5px">
                            <label for="">&copy; SKWR 2018</label>
                        </div>
                      </div>
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

<script type="text/javascript" src="<?php echo e(asset('themes/plugins/jquery/dist/jquery.min.js')); ?>"></script>x
<script type="text/javascript" src="<?php echo e(asset('themes/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('themes/plugins/toastr/toastr.min.js')); ?>"></script>

<script type="text/javascript">
<?php if(session('success')): ?>
  toastr.success('<?php echo e(session('success')); ?>');
<?php endif; ?>
<?php if(session('error')): ?>
  toastr.error('<?php echo e(session('error')); ?>');
<?php endif; ?>
</script>
