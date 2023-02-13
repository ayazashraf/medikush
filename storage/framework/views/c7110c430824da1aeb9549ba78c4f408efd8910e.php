
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">            
            <!--
                        <button class="openbtn" onclick="openNav()">☰</button>
            -->      
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                  <img src="<?php echo e(asset('images/logo.png')); ?>" style="max-height: 50px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php if(auth()->guard()->guest()): ?>
                    <?php else: ?>

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">                     
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(url('/admin/admins')); ?>">Admins</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(url('/admin/products')); ?>">Products</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(url('/admin/pages')); ?>">Pages</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(url('/admin/blogs')); ?>">Blogs</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(url('/admin/users')); ?>">Customers</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(url('/admin/testimonials')); ?>">Testimonials</a>
                      </li>  
                    </ul>
                    <?php endif; ?>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>">
                                        <?php echo e(__('Logout')); ?>

                                    </a>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav><?php /**PATH D:\MediKush\medikush\resources\views/Admin/partials/nav.blade.php ENDPATH**/ ?>