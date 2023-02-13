@extends('Admin.partials.super')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-lg-6 margin-tb pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New Customer</a>
        </div>        
        <div class="col-lg-6 margin-tb">
            <input type="text" class="form-controller" id="usersearch" name="usersearch" placeholder="Write to search"></input>
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
            <th>Contact no(s)</th>            
            <th>Active</th>
            <th width="280px">Action</th>
        </tr>
        <tbody id="dataRecords">
            @foreach ($users as $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>            
                <td>{{ $user->contact_no }} </td>
                <td>
                @if($user->active)                     
                    <i class="fas fa-check"></i>            
                @endif
                </td>
                <td>
                
                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>       

                        @csrf
                        @method('GET')
        
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  
    {!! $users->links() !!}
</div>      
@endsection

