@extends('Admin.partials.super')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 margin-tb pull-right">            
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
            <th>business id</th>
            <th>Featured Image</th>            
            <th>Action</th>            
        </tr>
        <tbody id="dataRecords">
        @foreach ($photos as $photo)
            <tr>
                <td>{{ $photo->business_id }}</td>                                
                @if(strlen($photo->photo)>0)                
                <td><img src="{{ url('images/properties'). '/'.$photo->photo }}" class="img-thumbnail" alt="" style="max-width:100px"></img></td>                
                @else                
                    <td><img src="#" alt=""></img></td>                
                @endif
                
                
                <td>
                
                    <form action="{{ route('business.destroy',$photo->business->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('business.edit',$photo->business->id) }}">Edit</a>       

                        @csrf
                        @method('GET')
        
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach            
        </tbody>
    </table>  
    {!! $photos->links() !!}
</div>      
@endsection

