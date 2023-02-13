
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Blog</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo e(route('blogs.home')); ?>"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <?php echo e($blog->title); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Summary:</strong>
                <?php echo e($blog->summary); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <div>
                <?php
                    echo html_entity_decode($blog->description);
                ?>                    
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image caption:</strong>
                    <?php echo e($blog->image_caption); ?>                  
                </div>
            </div>    
            <div class="col-xs-12 col-sm-10 col-md-6">
                <div class="form-group">
                    <strong>Image preview:</strong>
                    <img id="thumbImg" name="thumbImg" class="img-fluid"  src="<?php echo e(url('images/blogs'). '/'.$blog->featured_image); ?>" alt="<?php echo e($blog->image_caption); ?>">
                </div>
            </div>    
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>SEO Title:</strong>
                <?php echo e($blog->seo_title); ?>

            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Blog URL:</strong>
                <?php echo e($blog->url); ?>

            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta Description:</strong>
                <?php echo e($blog->metadescription); ?>

            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Keywords:</strong>
                    <?php echo e($blog->keywords); ?>    
                </div>
            </div>            
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>SEO Bots:</strong>
                <?php echo e($blog->seo_bots); ?>

            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                <?php echo e($blog->status); ?>

            </div>
        </div>        
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.partials.super', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\MediKush\medikush\resources\views/Admin/blogs/show.blade.php ENDPATH**/ ?>