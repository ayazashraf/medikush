@extends('Admin.partials.super')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Admin User</h2>
            </div>
            <div class="pull-right">    
                <a class="btn btn-primary" href="{{ route('users.home') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('users.update',$user) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Name">
                </div>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" autocomplete="false" value="{{ $user->email }}" class="form-control" placeholder="Email">                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Contact numbers:(Comma separated)</strong>
                    <input type="text" name="contact_no" value="{{ $user->contact_no }}" class="form-control" placeholder="9026802540,xxxxxxxxxx">
                </div>
            </div>                       
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" name="password" value="" class="form-control" autocomplete="off" placeholder="Password">                    
                </div>
            </div>            
            <div class="form-group col-xs-12 col-sm-12 col-md-12">                
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="active" id="active"  @if($user->active)  
                    checked
                    @endif
                    >
                    <label class="form-check-label" for="active">
                        {{ __('Active') }}
                    </label>
                </div>                
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
</div>
@endsection