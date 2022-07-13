<div>

    <div class="card">
        {{-- @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif --}}

        <div class="card-header">
            <input wire:model="search" type="text" class="form-control" placeholder="Find your post">
        </div>

        @if($posts->count() > 0)
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th colspan="2">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td width="10px">
                            <a href="{{ route('admin.post.edit', $post) }}" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                        </td>
                        <td width="10px">
                            <form method="post" action="{{ route('admin.post.destroy', $post) }}" class="formDelete" >
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit">
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $posts->links() }}
        </div>
        @else
        <div class="card-body">
            <h1>No post found</h1>
        </div>
        @endif
    </div>

</div>

@push('js')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    @if(session('message'))
        
        <script>
            Swal.fire('Done','','success')
        </script>
        
    @endif



<script>
    $('.formDelete').submit(function(e){
        e.preventDefault();
        let form = event.target;
        Swal.fire({
            title: 'Are you sure wanna delete this Post?',
            icon: 'warning',
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
@endpush

    



