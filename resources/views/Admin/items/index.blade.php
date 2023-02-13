@extends('Admin.partials.super')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-lg-6 margin-tb pull-right">
            <a class="btn btn-success" href="{{ url('admin/properties/create') }}" style="display:none;"> Create New Property</a>
        </div>        
        <div class="col-lg-6 margin-tb">
            <input type="text" class="form-controller" id="businesssearch" name="businesssearch" placeholder="Write to search"  style="display:none;"></input>
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
            <th>Summary</th>
            <th>Description</th>
            <th>Price</th>            
            <th>In stock</th>                                  
            
            <th>Status</th>                        
           
        </tr>
        <tbody id="dataRecords">
            @foreach ($items as $item)
            <tr>                
                <td>{{ $item->title }}</td>  
                <td>{{ $item->summary }}</td>                
                <td>{{ $item->description }}</td>            
                <td>{{ "$".$item->discount_price }}</td> 
                  <td>{{ $item->in_stock }}</td> 
                
                    
                    
                <td>
                <select id="active" name="active" class="form-control">
                    <option value="1" @if($item->status == 1)  selected="selected" @endif >Enabled</option>
                    <option value="2" @if($item->status == 0)  selected="selected" @endif >Hidden</option>                    
                </select>
                </td>
              
            </tr>
            @endforeach
        </tbody>
    </table>
  
    {!! $items->links() !!}
</div>      
@endsection

