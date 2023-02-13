
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">            
            <!--
                        <button class="openbtn" onclick="openNav()">☰</button>
            -->      
                <a class="navbar-brand" href="{{ url('/') }}">
                  <img src="{{ asset('images/logo.png') }}" style="max-height: 50px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @guest
                    @else

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">                     
                      <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/admins') }}">Admins</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/products') }}">Products</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/pages') }}">Pages</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/blogs') }}">Blogs</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/users') }}">Customers</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/testimonials') }}">Testimonials</a>
                      </li>  
                    </ul>
                    @endguest
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        {{ __('Logout') }}
                                    </a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>