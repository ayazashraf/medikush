@extends('Admin.partials.super')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Admin User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.home') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $admin->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $admin->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Master Admin:</strong>
                @if($admin->is_super)                     
                    <i class="fas fa-check"></i>            
                @else
                    <span>No</span>
                @endif                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Active:</strong>
                @if($admin->active)              
                    <i class="fas fa-check"></i>            
                @else
                    <span>No</span>
                @endif                
                
            </div>
        </div>
    </div>
</div>
@endsection