<?php $__env->startSection('content'); ?>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.min.js"></script>


<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4>Polling</h4>
            </div>
            <div class="box-body">
              <form action="<?php echo e(url('polling/save')); ?>" id="tidaktaw" class="form-horizontal" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

                  <input type="hidden" name="id_polling" value="<?php echo e($pol[0]->id); ?>">
                  <input type="hidden" name="id_user" value="<?php echo e(Auth::user()->id); ?>">
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group" id="form-polling">
                      <div class="col-md-12">
                        <label class="control-label">Question</label>
                        <h4><?php echo e($pol[0]->question); ?></h4>
                      </div>
                      <div class="col-md-8">
                        <label class="control-label">Answer</label>
                        <table id="datatable" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Option&nbsp;</th>
                              <th>Answer</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $__currentLoopData = $ans->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $answ): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                              <td><?php echo e($index+1); ?></td>
                              <td><?php echo e($answ->ans); ?></td>
                              <!-- <td></td> -->
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                          </tbody>
                        </table>
                      </div>
                      <div class="col-md-4">
                        <label class="control-label">Your Answer</label> <br>
                        <select class="table" name="id_ans" id="id_ans">
                          <option value="">Select Your Answer</option>
                          <?php $__currentLoopData = $ans->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $tra): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                          <option value="<?php echo e($tra->id); ?>"><?php echo e($tra->ans); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </select>
                      </div>
                  </div>
                  <div class="box-footer">
                      <button type="submit" class="btn btn-primary pull-right" id="btn-submit">Submit</button>
                  </div>
                </div>
                <div class="col-md-6" style="width:400px; height:400px;">
                  <script src="https://codepen.io/anon/pen/aWapBE.js"></script>
                  <canvas id="myChart" width="400" height="400"></canvas>
                </div>
              </div>


              </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentjs'); ?>
<script type="text/javascript">
 var entah = [];
function callback(resp){
  entah = resp;
  <?php if($ada): ?>
  coba(entah);
  <?php endif; ?>
}

$.ajax({
  type: "POST",
  url: '<?php echo e(url('polling/hitung/'.$pol[0]->id)); ?>',
 data: "",
 cache: false, // To unable request pages to be cached
 processData: false,
 success: function(response) {
   callback(response);
 },
 headers: {
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
  }
  });


// console.log(<?php echo e($ada); ?>);

<?php if($ada): ?>
  $('#btn-submit')[0].disabled = true;
  function coba(entah){
    var ctx = document.getElementById("myChart");
    var myData = entah['var'];
    var myChart = new Chart(ctx, {
      type: 'bar',
      responsive: true,
      maintainAspectRatio: false,
      options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                    }
                  }]
                }
              },
      data: {
        labels: entah['isi'],
        datasets: [{
          label: '# of Votes',
          data: myData,
          backgroundColor: palette('tol', myData.length).map(function(hex) {
            return '#' + hex;
          })
        }]
      }
    });
  }
<?php endif; ?>
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>