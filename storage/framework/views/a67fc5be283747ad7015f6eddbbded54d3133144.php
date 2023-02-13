

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
    <div class="col-lg-6 margin-tb pull-right">
            <a class="btn btn-success" href="<?php echo e(route('admins.create')); ?>"> Create New Admin User</a>
        </div>        
        <div class="col-lg-6 margin-tb">
            <input type="text" class="form-controller" id="adminsearch" name="adminsearch" placeholder="Write to search"></input>
        </div>
        
    </div>
   
    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>
   <div class="row">
      <div class="col-lg-12 margin-tb">    
        
      </div>
   </div>   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Master Admin</th>
            <th>Active</th>
            <th width="280px">Action</th>
        </tr>
        <tbody id="dataRecords">
            <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e(++$i); ?></td>
                <td><?php echo e($admin->name); ?></td>
                <td><?php echo e($admin->email); ?></td>            
                <td>
                <?php if($admin->is_super): ?>                     
                    <i class="fas fa-check"></i>            
                <?php endif; ?>
                </td>
            
                <td>
                <?php if($admin->active): ?>                     
                    <i class="fas fa-check"></i>            
                <?php endif; ?>
                </td>
                <td>
                
                    <form action="<?php echo e(route('admins.destroy',$admin->id)); ?>" method="POST">
                    <a class="btn btn-info" href="<?php echo e(route('admins.show',$admin->id)); ?>">Show</a>
                    <a class="btn btn-primary" href="<?php echo e(route('admins.edit',$admin->id)); ?>">Edit</a>       

                        <?php echo csrf_field(); ?>
                        <?php echo method_field('GET'); ?>
        
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
  
    <?php echo $admins->links(); ?>

</div>      
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Admin.partials.super', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\MediKush\medikush\resources\views/Admin/admins/index.blade.php ENDPATH**/ ?>