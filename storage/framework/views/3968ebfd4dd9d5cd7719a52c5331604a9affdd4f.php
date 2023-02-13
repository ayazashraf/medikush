

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
    <div class="col-lg-6 margin-tb pull-right">
            <a class="btn btn-success" href="<?php echo e(url('admin/properties/create')); ?>" style="display:none;"> Create New Property</a>
        </div>        
        <div class="col-lg-6 margin-tb">
            <input type="text" class="form-controller" id="businesssearch" name="businesssearch" placeholder="Write to search"  style="display:none;"></input>
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
            <th>Summary</th>
            <th>Description</th>
            <th>Price</th>            
            <th>In stock</th>                                  
            
            <th>Status</th>                        
           
        </tr>
        <tbody id="dataRecords">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>                
                <td><?php echo e($item->title); ?></td>  
                <td><?php echo e($item->summary); ?></td>                
                <td><?php echo e($item->description); ?></td>            
                <td><?php echo e("$".$item->discount_price); ?></td> 
                  <td><?php echo e($item->in_stock); ?></td> 
                
                    
                    
                <td>
                <select id="active" name="active" class="form-control">
                    <option value="1" <?php if($item->status == 1): ?>  selected="selected" <?php endif; ?> >Enabled</option>
                    <option value="2" <?php if($item->status == 0): ?>  selected="selected" <?php endif; ?> >Hidden</option>                    
                </select>
                </td>
              
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
  
    <?php echo $items->links(); ?>

</div>      
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Admin.partials.super', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\MediKush\medikush\resources\views/Admin/items/index.blade.php ENDPATH**/ ?>