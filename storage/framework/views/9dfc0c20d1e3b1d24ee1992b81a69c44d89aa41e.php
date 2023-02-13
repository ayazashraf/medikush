

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
    <div class="col-lg-6 margin-tb pull-right">
            <a class="btn btn-success" href="<?php echo e(url('admin/pages/create')); ?>"> Create New Page</a>
        </div>        
        <div class="col-lg-6 margin-tb">
            <input type="text" class="form-controller" id="pagesearch" name="pagesearch" placeholder="Write to search"></input>
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
       
        </tbody>
    </table>
  
    
</div>      
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Admin.partials.super', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\concorp\resources\views/Admin/photo/index.blade.php ENDPATH**/ ?>