
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6 margin-tb pull-right">            
        </div>        
        <div class="col-lg-6 margin-tb">
            <input type="text" class="form-controller" id="blogsearch" name="blogsearch" placeholder="Write to search"></input>
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
            <th>business id</th>
            <th>Featured Image</th>            
            <th>Action</th>            
        </tr>
        <tbody id="dataRecords">
        <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($photo->business_id); ?></td>                                
                <?php if(strlen($photo->photo)>0): ?>                
                <td><img src="<?php echo e(url('images/properties'). '/'.$photo->photo); ?>" class="img-thumbnail" alt="" style="max-width:100px"></img></td>                
                <?php else: ?>                
                    <td><img src="#" alt=""></img></td>                
                <?php endif; ?>
                
                
                <td>
                
                    <form action="<?php echo e(route('business.destroy',$photo->business->id)); ?>" method="POST">
                    <a class="btn btn-primary" href="<?php echo e(route('business.edit',$photo->business->id)); ?>">Edit</a>       

                        <?php echo csrf_field(); ?>
                        <?php echo method_field('GET'); ?>
        
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
        </tbody>
    </table>  
    <?php echo $photos->links(); ?>

</div>      
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Admin.partials.super', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\concorp\resources\views/Admin/photos/index.blade.php ENDPATH**/ ?>