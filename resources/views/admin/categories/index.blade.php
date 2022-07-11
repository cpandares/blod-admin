@extends('adminlte::page')


@section('title', 'Home Admin')

@section('content_header')
<h1>Lista de todas Las categorias</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        @can('admin.categories.create')
        <a href="{{ route('admin.categories.create') }}" class="btn btn-success">
            Create Categorie
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
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td width="10px">
                        @can('admin.categories.edit')
                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary btn-sm">
                            Edit
                        </a>
                        @endcan
                    </td>
                    <td width="10px">
                        @can('admin.categories.destroy')
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="post" class="formDelete">
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.formDelete').submit(function(e) {
        e.preventDefault();
        let form = event.target;
        Swal.fire({
            title: 'Are you sure wanna delete this Category and all posts relative?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, Delete!'
        }).then((result) => {
            if (result.value) {
                this.submit();
            }
        });
    })
</script>
@stop