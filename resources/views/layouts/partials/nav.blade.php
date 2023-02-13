<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
  <div class="container">
  <a class="navbar-brand mx-auto" href="{{ url('/') }}" class="max-logo">
    <img src="{{ asset('public/images/logo.png') }}" style="max-height: 50px;">
  </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/') }}">Home
                <span class="sr-only">(current)</span>
              </a>
        </li>
        
      </ul>
      <ul class="navbar-nav ml-auto mr-auto">        
        <li class="dropdown show nav-item">
          <a href="#" class="dropdown-toggle theme-button-color" data-toggle="dropdown" aria-expanded="false"><b>Login</b> <span class="caret"></span></a>
			    <ul id="login-dp" class="dropdown-menu" style="min-width: 200px;">
            <li>
              <div class="row">
                  <div class="col-md-12">
                  
                    <form class="form" role="form" method="POST" action="{{ route('login') }}" accept-charset="UTF-8" id="login-nav" aria-label="{{ __('Login') }}">
                      @csrf
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
</nav>