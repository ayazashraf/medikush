
<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Admin User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo e(route('admin.home')); ?>"> Back</a>
            </div>
        </div>
    </div>
   
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
  
    <form action="<?php echo e(route('admins.update',$admin)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="<?php echo e($admin->name); ?>" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" value="<?php echo e($admin->email); ?>" class="form-control" placeholder="Email">                    
                </div>
            </div>           
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" name="password" value="" class="form-control" autocomplete="off" placeholder="Password">                    
                </div>
            </div>            
            <div class="form-group col-xs-12 col-sm-12 col-md-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_super" id="is_super" 
                    <?php if($admin->is_super): ?>  
                    checked
                    <?php endif; ?>
                    >
                    <label class="form-check-label" for="is_super">
                        <?php echo e(__('Master Admin')); ?>

                    </label>
                </div>                
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-12">                
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="active" id="active"  <?php if($admin->active): ?>  
                    checked
                    <?php endif; ?>
                    >
                    <label class="form-check-label" for="active">
                        <?php echo e(__('Active')); ?>

                    </label>
                </div>                
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.partials.super', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\MediKush\medikush\resources\views/Admin/admins/edit.blade.php ENDPATH**/ ?>