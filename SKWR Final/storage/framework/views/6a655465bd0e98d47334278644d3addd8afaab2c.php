<div class="row">
    <div class="small-8 large-8 column">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4> Lastest Post</h4>
          <?php $__currentLoopData = $newss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <li hrefclass="list-group-item"> <a href="<?php echo e(url('post/read/'.$news->news_id)); ?>"><?php echo e($news->Title); ?></a>
           </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div>
      </div>
    </div>
  </div>
<!-- <?php $__currentLoopData = $newss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
<ul>
  <li hrefclass="list-group-item"> <a href="<?php echo e(url('view_news/read/'.$news->news_id)); ?>"><?php echo e($news->Title); ?></a>
  </li>
</ul>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> -->
</div>
