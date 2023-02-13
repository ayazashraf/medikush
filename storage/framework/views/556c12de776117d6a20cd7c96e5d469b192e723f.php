<!DOCTYPE html>

<html lang="en">

<head>

   <meta charset="utf-8">

   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <meta name="viewport" content="width=device-width, initial-scale=1">

   <meta name="description" content="">

   <meta name="author" content="">

   <title>SB Admin 2 - Bootstrap Admin Theme</title>

   <!-- Bootstrap Core CSS -->

    <!-- Styles -->
 <link href="<?php echo e(asset('public/css/app.css')); ?>" rel="stylesheet">
 <link href="<?php echo e(asset('public/css/font-face.css')); ?>" rel="stylesheet">
 <link href="<?php echo e(asset('public/css/theme.css')); ?>" rel="stylesheet">
 <link href="<?php echo e(asset('public/css/bootstrap-datetimepicker.min.css')); ?>" rel="stylesheet">
   
   <!-- MetisMenu CSS -->

   <link href="<?php echo e(asset('public/theme/vendor/metisMenu/metisMenu.min.css')); ?>" rel="stylesheet">

   <!-- Custom CSS -->

   <link href="<?php echo e(asset('public/theme/dist/css/sb-admin-2.css')); ?>" rel="stylesheet">

   <!-- Morris Charts CSS -->

   <link href="<?php echo e(asset('public/theme/vendor/morrisjs/morris.css')); ?>" rel="stylesheet">

   <!-- Custom Fonts -->

   <link href="<?php echo e(asset('public/theme/vendor/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">

</head>

<body>

   <div id="wrapper">

       <!-- Navigation -->
       <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

           <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           <?php echo $__env->make('sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

       </nav>

       <div id="page-wrapper">

           <?php echo $__env->yieldContent('content'); ?>

      </div>

       <!-- /#page-wrapper -->

   </div>

   <!-- /#wrapper -->


   <!-- jQuery -->

   <script src="<?php echo e(asset('public/theme/vendor/jquery/jquery.min.js')); ?>"></script>

   <!-- Bootstrap Core JavaScript -->

   <script src="<?php echo e(asset('public/theme/vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>

   <!-- Metis Menu Plugin JavaScript -->

   <script src="<?php echo e(asset('public/theme/vendor/metisMenu/metisMenu.min.js')); ?>"></script>

   <!-- Morris Charts JavaScript -->

   <script src="<?php echo e(asset('public/theme/vendor/raphael/raphael.min.js')); ?>"></script>

   <script src="<?php echo e(asset('public/theme/vendor/morrisjs/morris.min.js')); ?>"></script>

   <script src="<?php echo e(asset('public/theme/data/morris-data.js')); ?>"></script>

   <!-- Custom Theme JavaScript -->
   <script src="<?php echo e(asset('public/theme/dist/js/sb-admin-2.js')); ?>"></script>

</body>



</html><?php /**PATH C:\laravel\concorp\resources\views/default.blade.php ENDPATH**/ ?>