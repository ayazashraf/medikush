@extends('Admin.partials.super')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-lg-6 margin-tb pull-right">
            <a class="btn btn-success" href="{{ route('admins.create') }}"> Create New Admin User</a>
        </div>        
        <div class="col-lg-6 margin-tb">
            <input type="text" class="form-controller" id="adminsearch" name="adminsearch" placeholder="Write to search"></input>
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
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Master Admin</th>
            <th>Active</th>
            <th width="280px">Action</th>
        </tr>
        <tbody id="dataRecords">
            @foreach ($admins as $admin)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>            
                <td>
                @if($admin->is_super)                     
                    <i class="fas fa-check"></i>            
                @endif
                </td>
            
                <td>
                @if($admin->active)                     
                    <i class="fas fa-check"></i>            
                @endif
                </td>
                <td>
                
                    <form action="{{ route('admins.destroy',$admin->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('admins.show',$admin->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('admins.edit',$admin->id) }}">Edit</a>       

                        @csrf
                        @method('GET')
        
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  
    {!! $admins->links() !!}
</div>      
@endsection

