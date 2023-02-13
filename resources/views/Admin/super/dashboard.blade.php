@extends('Admin.partials.super')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Hi boss!
                </div>
                <div>
                {{ var_dump(Auth::user()) }}                
                </div>
                <div>
        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection