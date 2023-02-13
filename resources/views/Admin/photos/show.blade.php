@extends('Admin.partials.super')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Blog</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('blogs.home') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $blog->title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Summary:</strong>
                {{ $blog->summary }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <div>
                @php
                    echo html_entity_decode($blog->description);
                @endphp                    
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image caption:</strong>
                    {{ $blog->image_caption }}                  
                </div>
            </div>    
            <div class="col-xs-12 col-sm-10 col-md-6">
                <div class="form-group">
                    <strong>Image preview:</strong>
                    <img id="thumbImg" name="thumbImg" class="img-fluid"  src="{{ url('images/blogs'). '/'.$blog->featured_image }}" alt="{{ $blog->image_caption }}">
                </div>
            </div>    
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>SEO Title:</strong>
                {{ $blog->seo_title }}
            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Blog URL:</strong>
                {{ $blog->url }}
            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta Description:</strong>
                {{ $blog->metadescription }}
            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Keywords:</strong>
                    {{ $blog->keywords }}    
                </div>
            </div>            
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>SEO Bots:</strong>
                {{ $blog->seo_bots }}
            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                {{ $blog->status }}
            </div>
        </div>        
    </div>
</div>
@endsection