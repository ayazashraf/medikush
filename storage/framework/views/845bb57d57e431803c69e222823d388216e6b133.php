<div class="collapse bg-inverse" id="navbarHeader">
  <div class="container">
    <div class="row">
      <div class="col-sm-8 py-4">
        <h4 class="text-white">About</h4>
        <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
      </div>
      <div class="col-sm-4 py-4">
        <h4 class="text-white">Contact</h4>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white">Follow on Twitter</a></li>
          <li><a href="#" class="text-white">Like on Facebook</a></li>
          <li><a href="#" class="text-white">Email me</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
  <div class="container">
  <a class="navbar-brand mx-auto" href="<?php echo e(url('/')); ?>" class="max-logo">
    <img src="<?php echo e(asset('public/images/logo_22x.png')); ?>" style="max-height: 50px;">
  </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo e(url('/')); ?>">Home
                <span class="sr-only">(current)</span>
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Maintenance</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Testimonials</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(url('/management-services/full-management')); ?>">Management services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto mr-auto">        
        <li class="dropdown show nav-item">
          <a href="#" class="dropdown-toggle theme-button-color" data-toggle="dropdown" aria-expanded="false"><b>Login</b> <span class="caret"></span></a>
			    <ul id="login-dp" class="dropdown-menu" style="min-width: 200px;">
            <li>
              <div class="row">
                  <div class="col-md-12">
                  
                    <form class="form" role="form" method="POST" action="<?php echo e(route('login')); ?>" accept-charset="UTF-8" id="login-nav" aria-label="<?php echo e(__('Login')); ?>">
                      <?php echo csrf_field(); ?>
                        <div class="form-group">
                          <label class="sr-only" for="exampleInputEmail2">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required="">
                        </div>
                        <div class="form-group">
                          <label class="sr-only" for="exampleInputPassword2">Password</label>
                          <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required="">
                                                <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                        </div>
                        <div class="checkbox">
                          <label>
                          <input type="checkbox"> keep me logged-in
                          </label>
                        </div>
                    </form>
                  </div>
                  
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav><?php /**PATH C:\laravel\concorp\resources\views/layouts/partials/nav.blade.php ENDPATH**/ ?>