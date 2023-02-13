

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
            <th>Property Name</th>
            <th>Property Type</th>
            <th>Address</th>
            <th>City</th>            
            <th>Photos</th>            
            <th>Units</th>
            <th>Videos</th>            
            <th>Status</th>                        
            <th width="280px">Action</th>
        </tr>
        <tbody id="dataRecords">
            <?php $__currentLoopData = $businesses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>                
                <td><?php echo e($bus->name); ?></td>  
                <td><?php echo e($bus->type->type); ?></td>                
                <td><?php echo e($bus->street_number . ' '. $bus->street_name); ?></td>            
                <td><?php echo e($bus->city); ?></td> 
                <?php if(count($bus->photos)>0): ?>                                
                    <td><a href="<?php echo e(route('photo.home',$bus->id)); ?>"><?php echo e(count($bus->photos)); ?></a></td>
                <?php else: ?>                
                    <td>0</img></td>                
                <?php endif; ?>
                <?php if(count($bus->items)>0): ?>                                
                    <td><a href="<?php echo e(route('items.home',$bus->id)); ?>"><?php echo e(count($bus->items)); ?></a></td>
                <?php else: ?>                
                    <td>0</img></td>                
                <?php endif; ?>
                <?php if(count($bus->videos)>0): ?>                                
                    <td><a href="<?php echo e(route('items.home',$bus->id)); ?>"><?php echo e(count($bus->videos)); ?></a></td>
                <?php else: ?>                
                    <td>0</img></td>                
                <?php endif; ?>                                
                <td>
                <select id="active" name="active" class="form-control">
                    <option value="1" <?php if($bus->active == 1): ?>  selected="selected" <?php endif; ?> >Enabled</option>
                    <option value="2" <?php if($bus->active == 2): ?>  selected="selected" <?php endif; ?> >Hidden</option>
                    <option value="3" <?php if($bus->active == 3): ?>  selected="selected" <?php endif; ?> >Diabled</option>
                </select>
                </td>
                <td>
                
                    <form action="<?php echo e(route('business.destroy',$bus->id)); ?>" method="POST">
                    <a class="btn btn-primary" href="<?php echo e(route('business.edit',$bus->id)); ?>">Edit</a>       

                        <?php echo csrf_field(); ?>
                        <?php echo method_field('GET'); ?>
        
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
  
    <?php echo $businesses->links(); ?>

</div>      
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Admin.partials.super', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\concorp\resources\views/Admin/business/index.blade.php ENDPATH**/ ?>