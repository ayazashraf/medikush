@extends('Admin.partials.super')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Page</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('page.home') }}"> Back</a>
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
  
    <form action="{{ route('page.update',$page) }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $page->title }}"  autocomplete="off" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Summary:</strong>
                    <input type="text" name="summary" value="{{ $page->summary }}" autocomplete="off" class="form-control" placeholder="Summary">                    
                </div>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea id="description" name="description">{{ html_entity_decode($page->description) }}</textarea>                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Featured Image:</strong>
                    <input type="file" id="image" name="image" class="form-control" accept="image/*">                    
                </div>
            </div>    
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Image caption:</strong>
                    <input type="text" name="image_caption" value="{{ $page->image_caption }}" autocomplete="off" class="form-control" placeholder="Image caption">                    
                </div>
            </div>    
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Image preview:</strong>                    
                    @if(strlen($page->featured_image)>0)
                        <img id="thumbImg" name="thumbImg" class="img-fluid"  src="{{ url('images/pages/thumbnail'). '/'.$page->featured_image }}" alt="{{ strlen($page->featured_image)>0?$page->image_caption:'' }}">
                        <i class="fas fa-trash-alt" id="remove_page_image" onclick="removepageimage({{ $page->id }})"></i>                    
                    @else
                    <img id="thumbImg" name="thumbImg" class="img-fluid"  src="#" alt="">
                    <i class="fas fa-trash-alt" id="remove_page_image" onclick="removepageimage({{ $page->id }})" style="display:none;"></i>                    
                    @endif
                </div>
            </div>    
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>SEO Title:</strong>
                    <input type="text" name="seotitle" value="{{ $page->seotitle }}" autocomplete="off" class="form-control" placeholder="SEO Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Page URL:</strong>
                    <input type="text" name="url" value="{{ $page->url }}" autocomplete="off" class="form-control" placeholder="Page URL">                    
                </div>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Meta Description:</strong>
                    <textarea name="metadescription" autocomplete="off" class="form-control" placeholder="Meta Description">{{ $page->metadescription }}</textarea>                                       
                </div>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>Keywords:</strong>
                    <input type="text" name="keywords" value="{{ $page->keywords }}" autocomplete="off" class="form-control" placeholder="Keywords">                    
                </div>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <strong>SEO Bots:</strong>
                    <select id="seo_bots" name="seo_bots" class="form-control">
                        <option value="noindex"  @if($page->seo_bots == "noindex")  selected="selected" @endif > noindex</option>
                        <option value="index"  @if($page->seo_bots == "index")  selected="selected" @endif >index</option>                                        
                    </select>                    
                </div>
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <select id="status" name="status" class="form-control">
                    <option value="Published" @if($page->status == "Published")  selected="selected" @endif >Published</option>
                    <option value="Draft"  @if($page->status == "Draft")  selected="selected" @endif >Draft</option>                    
                    <option value="Hidden"  @if($page->status == "Hidden")  selected="selected" @endif >Hidden</option> 
                </select>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>   
    </form>

</div>
@endsection