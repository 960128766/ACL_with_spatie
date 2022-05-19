@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>User Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success mb-2" href="{{route('users.create')}}">Create New User</a>
        </div>
    </div>
    </div>

    @if($message=\Illuminate\Support\Facades\Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <table class="table table-bordered ">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th style="width: 280px">Action</th>
                </tr>
                @foreach($data as $key=>$user)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <span class="badge bg-success">{{ $v }}</span>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{route('users.show',$user->id)}}">show</a>
                            <a class="btn btn-primary" href="{{route('users.edit',$user->id)}}">Edit</a>
                            {!! Form::open(['method'=>'DELETE','route'=>['users.destroy',$user->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    {!! $data->render() !!}
@endsection
