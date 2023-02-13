
<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Blog</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo e(route('blogs.home')); ?>"> Back</a>
            </div>
        </div>
    </div>
   
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
  
    <form action="<?php echo e(route('blogs.update',$blog)); ?>" method="POST"  enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="<?php echo e($blog->title); ?>"  autocomplete="off" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Author:</strong>
                    <input type="text" name="author" value="<?php echo e($blog->author); ?>"  autocomplete="off" class="form-control" placeholder="Author">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Summary:</strong>
                    <input type="text" name="summary" value="<?php echo e($blog->summary); ?>" autocomplete="off" class="form-control" placeholder="Summary">                    
                </div>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <strong>Content:</strong>
                    <textarea id="content" name="content"><?php echo e(html_entity_decode($blog->content)); ?></textarea>                    
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
                    <input type="text" name="image_caption" value="<?php echo e($blog->image_caption); ?>" autocomplete="off" class="form-control" placeholder="Image caption">                    
                </div>
            </div>    
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Image preview:</strong>
                    <?php if(strlen($blog->featured_image)>0): ?>
                        <img id="thumbImg" name="thumbImg" class="img-fluid"  src="<?php echo e(url('images/blogs/thumbnail'). '/'.$blog->featured_image); ?>" alt="<?php echo e(strlen($blog->featured_image)>0?$blog->image_caption:''); ?>">
                        <i class="fas fa-trash-alt" id="remove_blog_image" onclick="removeblogimage(<?php echo e($blog->id); ?>)"></i>                    
                    <?php else: ?>
                    <img id="thumbImg" name="thumbImg" class="img-fluid"  src="#" alt="">
                    <i class="fas fa-trash-alt" id="remove_blog_image" onclick="removeblogimage(<?php echo e($blog->id); ?>)" style="display:none;"></i>                    
                    <?php endif; ?>
                </div>
            </div>    
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Publish Date:</strong>
                    <input type="text" name="publish_date" id="datepicker" value="<?php echo e($blog->publish_date); ?>" autocomplete="off" class="form-control" placeholder="Publish Date">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>SEO Title:</strong>
                    <input type="text" name="seo_title" value="<?php echo e($blog->seo_title); ?>" autocomplete="off" class="form-control" placeholder="SEO Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Blog URL:</strong>
                    <input type="text" name="url" value="<?php echo e($blog->url); ?>" autocomplete="off" class="form-control" placeholder="Blog URL">                    
                </div>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Meta Description:</strong>
                    <textarea name="metadescription" autocomplete="off" class="form-control" placeholder="Meta Description"><?php echo e($blog->metadescription); ?></textarea>                                       
                </div>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Keywords:</strong>
                    <input type="text" name="keywords" value="<?php echo e($blog->keywords); ?>" autocomplete="off" class="form-control" placeholder="Keywords">                    
                </div>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>SEO Bots:</strong>
                    <select id="seo_bots" name="seo_bots" class="form-control">
                    <option value="noindex" <?php if($blog->seo_bots == "noindex"): ?>  selected="selected" <?php endif; ?> > noindex</option>
                    <option value="index"   <?php if($blog->seo_bots == "index"): ?>  selected="selected" <?php endif; ?> >index</option>                                      
                    </select>                    
                </div>
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <select id="status" name="status" class="form-control">
                    <option value="Published" <?php if($blog->status == "Published"): ?>  selected="selected" <?php endif; ?> >Published</option>
                    <option value="Draft"  <?php if($blog->status == "Draft"): ?>  selected="selected" <?php endif; ?> >Draft</option>                    
                    <option value="Hidden"  <?php if($blog->status == "Hidden"): ?>  selected="selected" <?php endif; ?> >Hidden</option> 
                </select>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>   
    </form>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.partials.super', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\concorp\resources\views/Admin/blogs/edit.blade.php ENDPATH**/ ?>