<?php $__env->startSection('plugins_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('themes/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h2>Post</h2>
            </div>
            <div class="blog-post">
                  <div class="container">
                    <!-- <div class="row"> -->
                    <div class="col-md-8 post-header-line">
                    <?php $__currentLoopData = $news_models->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <div class="row">
                        <div class="col-md-12">
                          <h3>  <a style="color:black; font-family:verdana;" href="<?php echo e(url('news/read/'.$news->Id)); ?>"> <?php echo e($news->Title); ?></a></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 post-header-line">
                          <h6> <span class="glyphicon glyphicon-time"></span><?php echo e($news->created_at); ?></h6>
                        </div>
                    </div>
                    <div class="image">
                      <!-- <img class="image-lg" src="<?php echo e(asset('assets/image/news/'.$news->news_image)); ?>" alt="Post Image" class="post-image"> -->
                          <img src="<?php echo e(asset($news->Gambar)); ?>" width="200" height="200" class="img-responsive" >
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 post-header-line">
                          <p style="text-align:justify"> <?php echo e($news->Description); ?></p>
                        </div>
                    </div>
                      <p>
                        <a class="pull-right" href="<?php echo e(url('news/read/'.$news->Id)); ?>"> Read More...</a>
                      </p>
                      <!-- <br> -->
                      <br>
                      <hr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </div>
                  <div class="col-md-6 pull-right">
                    <?php echo $news_models->render(); ?>

                  </div>
                  </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>