@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit User</h1>
@stop

@section('content')
   <div class="card">
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="card-body">
            <p class="h5">Name</p>
            <p class="form-control">
                {{ $user->name }}
            </p>
            {!! Form::model($user,['route'=>['admin.users.update',$user], 'method'=>'put']) !!}
               @foreach ($roles as $rol)
                   <div>
                        <label>
                            {!! Form::checkbox('roles[]', $rol->id,null, ['class'=>'mr-4']) !!}
                            {{ $rol->name }}
                        </label>
                   </div>
               @endforeach
               {!! Form::submit('Save', ['class'=>'btn btn-primary mt-2']) !!}
            {!!  Form::close() !!}
        </div>
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop