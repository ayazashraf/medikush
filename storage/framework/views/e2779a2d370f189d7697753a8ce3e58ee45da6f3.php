
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Page</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo e(route('page.home')); ?>"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <?php echo e($page->title); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Summary:</strong>
                <?php echo e($page->summary); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <div>
                <?php
                    echo html_entity_decode($page->description);
                ?>                    
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image caption:</strong>
                    <?php echo e($page->image_caption); ?>                  
                </div>
            </div>    
            <div class="col-xs-12 col-sm-10 col-md-6">
                <div class="form-group">
                    <strong>Image preview:</strong>
                    <img id="thumbImg" name="thumbImg" class="img-fluid"  src="<?php echo e(url('images/pages'). '/'.$page->featured_image); ?>" alt="<?php echo e($page->image_caption); ?>">
                </div>
            </div>    
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>SEO Title:</strong>
                <?php echo e($page->seotitle); ?>

            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Page URL:</strong>
                <?php echo e($page->url); ?>

            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta Description:</strong>
                <?php echo e($page->metadescription); ?>

            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Keywords:</strong>
                    <?php echo e($page->keywords); ?>    
                </div>
            </div>            
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>SEO Bots:</strong>
                <?php echo e($page->seo_bots); ?>

            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                <?php echo e($page->status); ?>

            </div>
        </div>        
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.partials.super', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\MediKush\medikush\resources\views/Admin/pages/show.blade.php ENDPATH**/ ?>