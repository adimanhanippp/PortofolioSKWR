<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4>Contact Us</h4>
            </div>
            <div class="box-body">
              <div class="col-md-6">
<!-- berisi sebelah kiri -->
                <form class="form-horizontal" action="<?php echo e(url('contacs/mail')); ?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Name <span class="text-danger">*</span></label>
                      <div class="com-md-10">
                        <input type="text" name="Name" value="" placeholder="Name">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Phone <span class="text-danger">*</span></label>
                      <div class="com-md-10">
                        <input type="text" name="Phone" value="" placeholder="Phone">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Email <span class="text-danger">*</span></label>
                      <div class="com-md-10">
                        <input type="email" name="Email" value="" placeholder="Email">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Messages <span class="text-danger">*</span></label>
                      <div class="com-md-10">
                        <textarea name="Messages" rows="6" cols="80" placeholder="Messages"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="box-footer">
                      <button type="submit" class="btn btn-primary pull-right" id="btn-submit">Submit</button>
                  </div>

                </form>
              </div>
              <div class="col-md-6">
<!-- berisi sebelah kanan -->
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                  <h5>Wika Realty
                  Tamansari Hive Office, Lantai 12
                  Jl. D.I Panjaitan
                  Kav. 2, Cawang
                  Jakarta Timur, 13340
                  Indonesia
                  Telp : (+6221) 21011200, 21011201
                  Fax : (+6221) 22085123
                  Email : cs@wikarealty.co.id
                  </h5>
                </div>
                <div class="col-md-4">
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>