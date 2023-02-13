

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
    <div class="col-lg-6 margin-tb pull-right">
            <a class="btn btn-success" href="<?php echo e(route('blogs.create')); ?>"> Create New Blog</a>
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
            <th>Title</th>
            <th>Featured Image</th>
            <th>Image caption</th>
            <th>summary</th>
            <th>status</th>            
            <th width="280px">Action</th>
        </tr>
        <tbody id="dataRecords">
            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>                
                <td><?php echo e($blog->title); ?></td>
                <?php if(strlen($blog->featured_image)>0): ?>                
                <td><img src="<?php echo e(url('images/blogs'). '/'.$blog->featured_image); ?>" alt="<?php echo e(strlen($blog->featured_image)>0?$blog->image_caption:''); ?>" style="max-width:150px;"></img></td>                
                <?php else: ?>                
                    <td><img src="#" alt=""></img></td>                
                <?php endif; ?>
                <td><?php echo e($blog->image_caption); ?></td>
                <td><?php echo e($blog->summary); ?></td>            
                <td><?php echo e($blog->status); ?></td>            
                <td>
                
                    <form action="<?php echo e(route('blogs.destroy',$blog->id)); ?>" method="POST">
                    <a class="btn btn-info" href="<?php echo e(route('blogs.show',$blog->id)); ?>">Show</a>
                    <a class="btn btn-primary" href="<?php echo e(route('blogs.edit',$blog->id)); ?>">Edit</a>       

                        <?php echo csrf_field(); ?>
                        <?php echo method_field('GET'); ?>
        
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
  
    <?php echo $blogs->links(); ?>

</div>      
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Admin.partials.super', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\MediKush\medikush\resources\views/Admin/blogs/index.blade.php ENDPATH**/ ?>