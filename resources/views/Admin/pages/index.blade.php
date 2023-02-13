@extends('Admin.partials.super')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-lg-6 margin-tb pull-right">
            <a class="btn btn-success" href="{{ url('admin/pages/create') }}"> Create New Page</a>
        </div>        
        <div class="col-lg-6 margin-tb">
            <input type="text" class="form-controller" id="pagesearch" name="pagesearch" placeholder="Write to search"></input>
        </div>        
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   <div class="row">
      <div class="col-lg-12 margin-tb">    
        
      </div>
   </div>   
    <table class="table table-bordered">
        <tr>            
            <th>Title</th>
            <th>Featured Image</th>
            <th>Image caption</th>
            <th>summary</th>
            <th>status</th>            
            <th width="280px">Action</th>
        </tr>
        <tbody id="dataRecords">
            @foreach ($pages as $page)
            <tr>                
                <td>{{ $page->title }}</td>
                @if(strlen($page->featured_image)>0)                
                <td><img src="{{ url('images/pages'). '/'.$page->featured_image }}" alt="{{ strlen($page->featured_image)>0?$page->image_caption:'' }}" style="max-width:150px;"></img></td>                
                @else                
                    <td><img src="#" alt=""></img></td>                
                @endif
                <td>{{ $page->image_caption }}</td>
                <td>{{ $page->summary }}</td>            
                <td>{{ $page->status }}</td>            
                <td>
                
                    <form action="{{ route('page.destroy',$page->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('page.show',$page->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('page.edit',$page->id) }}">Edit</a>       

                        @csrf
                        @method('GET')
        
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  
    {!! $pages->links() !!}
</div>      
@endsection

