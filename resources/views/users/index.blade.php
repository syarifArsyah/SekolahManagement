@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Users Management</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('user.create')}}" class="btn btn-success">Create New User</a>
            </div>
        </div>
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif
        
        <table class="table table-bordered">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th width="300px">Action</th>
            </tr>
            @foreach ($data as $key => $user)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        {{-- @if (!empty($user->getRolesName()))
                            @foreach ($user->getRoleName() as $v)
                                <label for="" class="badge badge-success">{{$v}}</label>
                            @endforeach
                        @endif --}}
                    </td>
                    <td>
                        <a href="{{route('user.show',$user->id)}}" class="btn btn-info">Show</a>
                        <a href="{{route('user.edit',$user->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('user.destroy',$user->id)}}" method="POST" style="display : inline">
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection