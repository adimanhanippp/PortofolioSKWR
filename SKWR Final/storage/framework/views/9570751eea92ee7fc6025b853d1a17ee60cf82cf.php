<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SKWR</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo e(asset('themes/plugins/bootstrap/dist/css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('themes/plugins/font-awesome/css/font-awesome.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('themes/plugins/Ionicons/css/ionicons.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('themes/plugins/toastr/toastr.min.css')); ?>">
        <?php echo $__env->yieldContent('plugins_css'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('themes/css/AdminLTE.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('themes/css/skins/skin-black-light.min.css')); ?>">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <style>
        body > .wrapper > .main-header {
            border-top: 6px solid #3c8dbc;
        }
        </style>
    </head>
    <body class="hold-transition skin-black-light fixed sidebar-mini sidebar-collapse">
        <div class="wrapper">
            
            <header class="main-header">
                <a href="<?php echo e(url('/')); ?>" class="logo">
                  <img class="logo-mini" src="<?php echo e(asset('logo-skwr.png')); ?>" alt="Our Logo" height="45" style="position:absolute; top:5px; float:left">
                    <!-- <span class="logo-lg"><b>SK Wika Realty</b></span> -->
                    <div class="logo-lg">
                      <p style="font-size:13px; font-family:Arial; font-weight:bold;"> Serikat Karyawan Wika Realty </p>

                    </div>
                    <!-- <img class="logo-lg" src="<?php echo e(asset('skwr.png')); ?>" alt="Our Logo" height="40" style="position:absolute; left:3.5%; top: 10%"> -->
                     <!-- <b>halo</b> -->
                    <!-- <img class="logo-lg"src="asset(skwr.png)" alt="Our Logo"> -->
                </a>
                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="javascript:" class="sidebar-toggle" data-toggle="push-menu" role="button" style="border-right:none">
                        <span class="sr-only">Toggle Navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown" style="border-left:none">
                                    <img src="<?php echo e(asset('themes/images/user2-160x160.jpg')); ?>" alt="User Image" class="user-image">
                                    <span class="hidden-xs"><?php echo e(Auth::user()->name); ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="<?php echo e(url('logout')); ?>" class="btn btn-default btn-flat">Logout</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            
            
            <aside class="main-sidebar">
                <section class="sidebar">
                    <ul class="sidebar-menu" data-widget="tree">
                        
                    </ul>
                </section>
            </aside>
            
            
            <div class="content-wrapper">
                <section class="content container-fluid">
                    
                    <?php echo $__env->yieldContent('content'); ?>
                    
                </section>
            </div>
            
        </div>
        
        <script type="text/javascript" src="<?php echo e(asset('themes/plugins/jquery/dist/jquery.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('themes/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('themes/plugins/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('themes/plugins/toastr/toastr.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('themes/js/adminlte.min.js')); ?>"></script>
        <?php echo $__env->yieldContent('plugins_js'); ?>
        <script type="text/javascript">
        $(function() {
            // build menu
            var jsonMenu = <?php echo session('user_menu'); ?>;
            var buildMenu = function(data, level=1) {
                var menuHtml = '';
                for(var iLoop=0;iLoop<data.length;iLoop++) {
                    if(data[iLoop].children!==undefined && data[iLoop].children.length>0) {
                        menuHtml += '<li class="treeview">';
                        menuHtml += '<a href="javascript:">';
                        menuHtml += '<i class="'+ data[iLoop].icon +'"></i>';
                        menuHtml += level>1 ? data[iLoop].name : '<span>'+ data[iLoop].name +'</span>';
                        menuHtml += '<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>'+
                            '</a>'+
                            '<ul class="treeview-menu">'+
                                buildMenu(data[iLoop].children, level+1) +
                            '</ul>';
                    } else {
                        menuHtml += '<li>';
                        menuHtml += '<a href="'+ data[iLoop].url +'">';
                        menuHtml += '<i class="'+ data[iLoop].icon +'"></i><span>'+ data[iLoop].name +'</span>';
                        menuHtml += '</a>';
                    }
                    menuHtml += '</li>';
                }
                return menuHtml;
            };
            $('.main-sidebar > .sidebar > .sidebar-menu').append(buildMenu(jsonMenu));

            // build notification
            toastr.options.closeButton = true;
            <?php if(session('success')): ?>
            toastr.success('<?php echo e(session('success')); ?>');
            <?php endif; ?>
            <?php if(session('error')): ?>
            toastr.error('<?php echo e(session('error')); ?>');
            <?php endif; ?>
        });
        </script>
        <?php echo $__env->yieldContent('contentjs'); ?>
    </body>
</html>
