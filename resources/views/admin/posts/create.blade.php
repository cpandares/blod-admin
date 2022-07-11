@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>New Post</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'admin.post.store', 'autocomplete'=>'off', 'files'=>true]) !!}

               

                @include('admin.posts.partials.form')

            {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
   
@stop

@section('css')
   <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56%;
        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
   </style>
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>  
    


    <script>

        class MyUploadAdapter {
            constructor( loader ) {
                // The file loader instance to use during the upload. It sounds scary but do not
                // worry — the loader will be passed into the adapter later on in this guide.
                this.loader = loader;
            }
            
            // Starts the upload process.
                upload() {
                    return this.loader.file
                        .then( file => new Promise( ( resolve, reject ) => {
                            this._initRequest();
                            this._initListeners( resolve, reject, file );
                            this._sendRequest( file );
                        } ) );
                }

                // Aborts the upload process.
                abort() {
                    if ( this.xhr ) {
                        this.xhr.abort();
                    }
                }

                _initRequest() {
                    const xhr = this.xhr = new XMLHttpRequest();

                    // Note that your request may look different. It is up to you and your editor
                    // integration to choose the right communication channel. This example uses
                    // a POST request with JSON as a data structure but your configuration
                    // could be different.
                    xhr.open( 'POST', 'http://example.com/image/upload/path', true );
                    xhr.responseType = 'json';
                }
           
        }
        $(document).ready( function() {
            $("#title").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );

        /* previsualizar la imagen */

      


        document.getElementById("file").addEventListener('change', cambiarImagen);
           function cambiarImagen(event){
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }



    </script>
@stop