@extends('adminlte::page')


@section('title', 'Home Admin')

@section('content_header')
    <h1>Crear Categoria</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.categories.store', 'autocomplete'=>'off']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name Category') !!}
                    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'New Category']) !!}
                  
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                   
                </div>
                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'Slug', 'readonly']) !!}
                    
                        @error('slug')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    
                </div>

                {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@stop