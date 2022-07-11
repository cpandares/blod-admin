<div>
  
    <div class="card">
        @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        
        <div class="card-header">
            <input 
                wire:model="search" 
                type="text" 
                class="form-control" 
                placeholder="Find your post"
            >
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
                                <form action="{{ route('admin.post.destroy' , $post) }}" method="post">
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
