@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>All Tags</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @can('admin.tags.create')            
            <a href="{{ route('admin.tags.create') }}" class="btn btn-success">
                Create Tag
            </a>
        @endcan
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td width="10px">
                            @can('admin.tags.edit')                                
                                <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-primary btn-sm">
                                    Edit
                                </a>
                            @endcan
                        </td>
                        <td width="10px">
                            @can('admin.tags.destroy')                                
                                <form action="{{ route('admin.tags.destroy' , $tag) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit">
                                        Delete
                                    </button>
                                </form>
                            @endcan
                          
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop