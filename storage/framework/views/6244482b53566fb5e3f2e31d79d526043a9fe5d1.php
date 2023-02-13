

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
    <div class="col-lg-6 margin-tb pull-right">
            <a class="btn btn-success" href="<?php echo e(url('admin/testimonials/create')); ?>"> Create New Testimonial</a>
        </div>        
        <div class="col-lg-6 margin-tb">
            <input type="text" class="form-controller" id="testimonialsearch" name="testimonialsearch" placeholder="Write to search"></input>
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
            <th>Active</th>
            <th width="280px">Action</th>
        </tr>
        <tbody id="dataRecords">
            <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e(++$i); ?></td>
                <td><?php echo e($testimonial->name); ?></td>
                <td><?php echo e($testimonial->email); ?></td>            
                
                <td>
                <?php if($testimonial->active): ?>                     
                    <i class="fas fa-check"></i>            
                <?php endif; ?>
                </td>
                <td>
                
                    <form action="<?php echo e(route('testimonials.destroy',$testimonial->id)); ?>" method="POST">
                        <a class="btn btn-info" href="<?php echo e(route('testimonials.show',$testimonial->id)); ?>">Show</a>
                        <a class="btn btn-primary" href="<?php echo e(route('testimonials.edit',$testimonial->id)); ?>">Edit</a>       

                        <?php echo csrf_field(); ?>
                        <?php echo method_field('GET'); ?>
        
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
  
    <?php echo $testimonials->links(); ?>

</div>      
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Admin.partials.super', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\concorp\resources\views/Admin/testimonials/index.blade.php ENDPATH**/ ?>