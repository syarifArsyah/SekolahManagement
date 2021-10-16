@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Users Management</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('user.index')}}" class="btn btn-success">back</a>
            </div>
        </div>
        
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('user.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-ms-12">
                    <div class="form-group">
                        <label for="">Nama </label>
                        <input type="text" class="form-control" placeholder="Name" name="name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-ms-12">
                    <div class="form-group">
                        <label for="">Email </label>
                        <input type="text" class="form-control" placeholder="Email" name="email">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-ms-12">
                    <div class="form-group">
                        <label for="">Password </label>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-ms-12">
                    <div class="form-group">
                        <label for="">Confirm Password </label>
                        <input type="password" class="form-control" placeholder="Co-Password" name="confirm-password">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Role:</strong>
                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>


    </div>
@endsection