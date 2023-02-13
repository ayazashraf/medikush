@extends('Admin.partials.super')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-lg-6 margin-tb pull-right">
            <a class="btn btn-success" href="{{ route('blogs.create') }}"> Create New Blog</a>
        </div>        
        <div class="col-lg-6 margin-tb">
            <input type="text" class="form-controller" id="blogsearch" name="blogsearch" placeholder="Write to search"></input>
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
            @foreach ($blogs as $blog)
            <tr>                
                <td>{{ $blog->title }}</td>
                @if(strlen($blog->featured_image)>0)                
                <td><img src="{{ url('images/blogs'). '/'.$blog->featured_image }}" alt="{{ strlen($blog->featured_image)>0?$blog->image_caption:'' }}" style="max-width:150px;"></img></td>                
                @else                
                    <td><img src="#" alt=""></img></td>                
                @endif
                <td>{{ $blog->image_caption }}</td>
                <td>{{ $blog->summary }}</td>            
                <td>{{ $blog->status }}</td>            
                <td>
                
                    <form action="{{ route('blogs.destroy',$blog->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('blogs.show',$blog->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('blogs.edit',$blog->id) }}">Edit</a>       

                        @csrf
                        @method('GET')
        
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  
    {!! $blogs->links() !!}
</div>      
@endsection

