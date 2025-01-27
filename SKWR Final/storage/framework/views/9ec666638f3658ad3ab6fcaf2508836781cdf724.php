<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-body">
              <div class="container">
                <div class="col-md-8 post-header-line">
                  <?php $__currentLoopData = $news_models->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <div class="row">
                      <div class="col-md-12">
                        <h3><?php echo e($news->Title); ?></h3>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12 post-header-line">
                        <h6><?php echo e($news->created_at); ?></h6>
                      </div>
                  </div>
                  <div class="image">
                    <!-- <img class="image-lg" src="<?php echo e(asset('assets/image/news/'.$news->news_image)); ?>" alt="Post Image" class="post-image"> -->
                        <img  src="<?php echo e(asset($news->Gambar)); ?>" width="400" height="400" style="position: relative;" class="img-responsive" >

                  </div>
                  <br>
                  <div class="row" >
                  <article class="article" text-align="justify">
                    <p align="justify" style="white-space: pre-line" ><?php echo e($news->Isi); ?></p>
                  </article>
                    <!-- <div class="text" text-align="justify"> -->
                      <!-- <p><?php echo e($news->news_isi); ?></p> -->
                    <!-- </div> -->
                </div>
                  <ul class="pager">
                    <li class="previous"> <a href="<?php echo e(url('news/view')); ?>">&larr; Back to post </a> </li>
                  </ul>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </div>
                <div class="col-sm-3">
                  <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:transparent">
                      <h4> Latest Post</h4>
                      <?php $__currentLoopData = $newss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                      <li hrefclass="list-group-item"> <a href="<?php echo e(url('post/read/'.$news->news_id)); ?>"><?php echo e($news->Title); ?></a>
                      </li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>