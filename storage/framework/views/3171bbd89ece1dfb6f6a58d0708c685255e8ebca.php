
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- START Main Row -->
    <div class="row">
        <!-- START Left Column for Property Links -->
        <div class="col-sm-4 col-md-3 col-lg-2">
            <div class="row ">
                <div class="pull-left">
                    <a class="btn-lg btn-primary" href="<?php echo e(route('business.home')); ?>"> Back to Listings</a>
                </div>
            </div>
            <div class="row text-center text-light bg-secondary p-1 mt-4">
                <div class="pull-left">
                    <?php 
                    echo $business->name;
                    ?>
                </div>
            </div>
            <div class="row text-center text-light bg-secondary p-1">
                <div class="pull-left">
                    <?php 
                    echo $business->street_number. ' '. $business->street_name;
                    ?>
                </div>
            </div>
            <div class="row pt-1">
                <div class="pull-left">
                    <button type="button" class="btn btn-secondary"><span class="material-icons">apartment</span> Property Info</button>                                 
                </div>
            </div>
            <div class="row pt-1">
                <div class="pull-left">
                    <button type="button" class="btn btn-secondary"><span class="material-icons">add_a_photo</span> Photos</button>
                </div>
            </div>
            <div class="row pt-1">
                <div class="pull-left">
                    <button type="button" class="btn btn-secondary"><span class="material-icons">apartment</span> Units</button>
                </div>
            </div>
            <div class="row pt-1">
                <div class="pull-left">
                    <button type="button" class="btn btn-secondary"><span class="material-icons">video_library</span> Videos</button>       
                </div>
            </div>
        </div>
        <!-- END Left Column for Property Links -->

        <!-- START Right Column for Property edit inputs -->
        <div class="col-sm-8 col-md-9 col-lg-10">
            <main class="py-4">
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>
    <!-- END Main Row -->
</div>
<?php echo $__env->make('Admin.partials.super', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\concorp\resources\views/Admin/partials/business-manage.blade.php ENDPATH**/ ?>