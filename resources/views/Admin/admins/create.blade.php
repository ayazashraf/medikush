@extends('Admin.partials.super')
@section('content')
<div class="container mt-3">
    <h2>Add New Admin User</h2>
    <p><a class="btn btn-primary" href="{{ url('admin/admins') }}"> Back</a></p> 
    <div class="d-flex  justify-content-start mb-3">
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
    </div>
    <div class="d-flex justify-content-start mb-3">
    <form action="{{ route('admins.store') }}" method="POST">
        @csrf
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" class="form-control" placeholder="Email">                    
                </div>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" name="password" autocomplete="off" class="form-control" placeholder="Password">                    
                </div>
            </div>            
            <div class="form-group col-xs-12 col-sm-12 col-md-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_super" id="is_super">
                    <label class="form-check-label" for="is_super">
                        {{ __('Master Admin') }}
                    </label>
                </div>                
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-12">                
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="active" id="active">
                    <label class="form-check-label" for="active">
                        {{ __('Active') }}
                    </label>
                </div>                
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>   
    </form>
</div>
@endsection