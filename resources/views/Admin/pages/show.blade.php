@extends('Admin.partials.super')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Page</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('page.home') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $page->title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Summary:</strong>
                {{ $page->summary }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <div>
                @php
                    echo html_entity_decode($page->description);
                @endphp                    
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image caption:</strong>
                    {{ $page->image_caption }}                  
                </div>
            </div>    
            <div class="col-xs-12 col-sm-10 col-md-6">
                <div class="form-group">
                    <strong>Image preview:</strong>
                    <img id="thumbImg" name="thumbImg" class="img-fluid"  src="{{ url('images/pages'). '/'.$page->featured_image }}" alt="{{ $page->image_caption }}">
                </div>
            </div>    
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>SEO Title:</strong>
                {{ $page->seotitle }}
            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Page URL:</strong>
                {{ $page->url }}
            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta Description:</strong>
                {{ $page->metadescription }}
            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Keywords:</strong>
                    {{ $page->keywords }}    
                </div>
            </div>            
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>SEO Bots:</strong>
                {{ $page->seo_bots }}
            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                {{ $page->status }}
            </div>
        </div>        
    </div>
</div>
@endsection