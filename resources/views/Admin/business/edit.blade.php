@extends('Admin.partials.super')
@section('content')
<div class="container-fluid">
    <!-- START Main Row -->
    <div class="row">
        <!-- START Left Column for Property Links -->
        <div class="col-sm-4 col-md-3 col-lg-2">
            <div class="row ">
                <div class="pull-left">
                    <a class="btn-lg btn-primary" href="{{ route('business.home') }}"> Back to Listings</a>
                </div>
            </div>
            <div class="row text-center text-light bg-secondary p-1 mt-4">
                <div class="pull-left">
                    @php 
                    echo $business->name;
                    @endphp
                </div>
            </div>
            <div class="row text-center text-light bg-secondary p-1">
                <div class="pull-left">
                    @php 
                    echo $business->street_number. ' '. $business->street_name;
                    @endphp
                </div>
            </div>
            <div class="row pt-1">
                <div class="pull-left">
                    <button type="button" class="btn btn-secondary"><span class="material-icons">apartment</span> Property Info</button>                                 
                </div>
            </div>
            <div class="row pt-1">
                <div class="pull-left">
                    <button type="button" class="btn btn-secondary"><span class="material-icons">add_a_photo</span> Photos</button>
                </div>
            </div>
            <div class="row pt-1">
                <div class="pull-left">
                    <button type="button" class="btn btn-secondary"><span class="material-icons">apartment</span> Units</button>
                </div>
            </div>
            <div class="row pt-1">
                <div class="pull-left">
                    <button type="button" class="btn btn-secondary"><span class="material-icons">video_library</span> Videos</button>       
                </div>
            </div>
        </div>
        <!-- END Left Column for Property Links -->

        <!-- START Right Column for Property edit inputs -->
        <div class="col-sm-8 col-md-9 col-lg-10">
            <!-- START Tabs -->            
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab"  href="#property">Property Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"  href="#contact">Contact Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"  href="#amenities">Amenities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"  href="#detail">Property Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"  href="#utility">Utilities and Parking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"  href="#publish">Publishing</a>
                </li>
                <li class="nav-item">
                    <button type="submit" class="btn btn-primary">Save Property Information</button>
                </li>
            </ul>
            <!-- END Tabs -->

            <!-- START Tab Contents -->
            <div class="tab-content">
                <div id="property" class="tab-pane active">                
               
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
                
                    <form action="{{ route('business.update',$business) }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <strong>Title:</strong>
                                    <input type="text" name="title" value="{{ $business->title }}"  autocomplete="off" class="form-control" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <strong>Summary:</strong>
                                    <input type="text" name="summary" value="{{ $business->summary }}" autocomplete="off" class="form-control" placeholder="Summary">                    
                                </div>
                            </div>                                                                                                         
                        </div>   
                    </form>
                </div>
                <div id="contact" class="tab-pane fade">
                    <h3>Edit Contacts</h3>                
                </div>
                <div id="amenities" class="tab-pane fade">
                    <h3>Property Amenities</h3>                
                </div>
                <div id="detail" class="tab-pane fade">
                    
                </div>
                <div id="utility" class="tab-pane fade">
                    <h3>Included Utilities</h3>                
                </div>
                <div id="publish" class="tab-pane fade">
                    <h3>SEO Configuration</h3>     
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                    <strong>SEO Title:</strong>
                                    <input type="text" name="seotitle" value="{{ $business->seotitle }}" autocomplete="off" class="form-control" placeholder="SEO Title">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <strong>Property URL:</strong>
                                    <input type="text" name="url" value="{{ $business->url }}" autocomplete="off" class="form-control" placeholder="Property URL">                    
                                </div>
                            </div>            
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <strong>Meta Description:</strong>
                                    <textarea name="metadescription" autocomplete="off" class="form-control" placeholder="Meta Description">{{ $business->metadescription }}</textarea>                                       
                                </div>
                            </div>            
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <strong>Keywords:</strong>
                                    <input type="text" name="keywords" value="{{ $business->keywords }}" autocomplete="off" class="form-control" placeholder="Keywords">                    
                                </div>
                            </div>            
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <strong>SEO Bots:</strong>
                                    <select id="seo_bots" name="seo_bots" class="form-control">
                                        <option value="noindex"  @if($business->seo_bots == "noindex")  selected="selected" @endif > noindex</option>
                                        <option value="index"  @if($business->seo_bots == "index")  selected="selected" @endif >index</option>                                        
                                    </select>                    
                                </div>
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <select id="status" name="status" class="form-control">
                                    <option value="Published" @if($business->status == "Published")  selected="selected" @endif >Published</option>
                                    <option value="Draft"  @if($business->status == "Draft")  selected="selected" @endif >Draft</option>                    
                                    <option value="Hidden"  @if($business->status == "Hidden")  selected="selected" @endif >Hidden</option> 
                                </select>
                            </div>  
                    </div>           
                </div>
            </div>
            <!-- END Tab Contents -->            
        </div>
        <!-- END Right Column for Property edit inputs -->
    </div>  
    <!--END Main Row -->
</div>
@endsection