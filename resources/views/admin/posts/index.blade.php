@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.post.create') }}" class="btn btn-primary btn-sm float-right">New Post</a>
    <h1>All my posts</h1>
@stop

@section('content')
    @livewire('admin.post-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stop