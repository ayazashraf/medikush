
<?php $__env->startSection('content'); ?>
<div class="container mt-3">
    <h2>Add New Blog</h2>
    <p><a class="btn btn-primary" href="<?php echo e(route('blogs.home')); ?>"> Back</a></p> 
    <div class="d-flex  justify-content-start mb-3">
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
    </div>
    <div class="d-flex justify-content-start mb-3">
    <form action="<?php echo e(route('blogs.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title"  autocomplete="off" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Author:</strong>
                    <input type="text" name="author"  autocomplete="off" class="form-control" placeholder="Author">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Summary:</strong>
                    <input type="text" name="summary" autocomplete="off" class="form-control" placeholder="Summary">                    
                </div>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <strong>Content:</strong>
                    <textarea id="content" name="content"></textarea>                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Featured Image:</strong>
                    <input type="file" id="image" name="image" class="form-control" accept="image/*">                    
                </div>
            </div>    
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Image caption:</strong>
                    <input type="text" name="image_caption" autocomplete="off" class="form-control" placeholder="Image caption">                    
                </div>
            </div>    
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Image preview:</strong>
                    <img id="thumbImg" name="thumbImg" class="img-fluid"  src="" alt="">
                    <i class="fas fa-trash-alt" id="remove_blog_image" onclick="removeblogimage(0)"></i>
                </div>
            </div>    
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Publish Date:</strong>
                    <input type="text" name="publish_date" id="datepicker" autocomplete="off" class="form-control" placeholder="Publish Date">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>SEO Title:</strong>
                    <input type="text" name="seo_title"  autocomplete="off" class="form-control" placeholder="SEO Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Blog URL:</strong>
                    <input type="text" name="url" autocomplete="off" class="form-control" placeholder="Blog URL">                    
                </div>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Meta Description:</strong>
                    <textarea name="metadescription" autocomplete="off" class="form-control" placeholder="Meta Description"></textarea>                                       
                </div>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Keywords:</strong>
                    <input type="text" name="keywords" autocomplete="off" class="form-control" placeholder="Keywords">                    
                </div>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>SEO Bots:</strong>
                    <select id="seo_bots" name="seo_bots" class="form-control">
                        <option value="noindex">noindex</option>
                        <option value="index">index</option>                                        
                    </select>                    
                </div>
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <select id="status" name="status" class="form-control">
                    <option value="Published">Published</option>
                    <option value="Draft">Draft</option>                    
                    <option value="Hidden">Hidden</option> 
                </select>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>   
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.partials.super', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\concorp\resources\views/Admin/blogs/create.blade.php ENDPATH**/ ?>