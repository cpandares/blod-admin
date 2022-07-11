<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.post.index')->only('index');
        $this->middleware('can:admin.post.create')->only('create','store');
        $this->middleware('can:admin.post.edit')->only('edit','update');
        $this->middleware('can:admin.post.destroy')->only('destroy');
    }

   
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

 
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();
        /*
            laravel collective espera un valor ['llave': 'valor']
        */
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    
    public function store(PostRequest $request)
    {
        $ruta = "blog-laravel";
    
        $post = Post::create($request->all());
        
        Cache::flush();
      
        if ($post->tags) {
            $post->tags()->attach($request->tags);
        }

        if ($request->file){
            $response = cloudinary()->upload($request->file('file')->getRealPath(), array("folder" => $ruta))->getSecurepath();
            $post->image()->create([
                'url' => $response,
            ]);
        }

       

        return redirect()->route('admin.post.index')->with(['message' => 'Post Created']);
    }

    

   
    public function edit(Post $post)
    {
        /* Apply police PostPolice */
        $this->authorize('author', $post);
       

        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    
    public function update(PostRequest $request, Post $post)
    {
        /* Apply police PostPolice */
        $this->authorize('author', $post);
       

        $post->update($request->all());

        if ($post->tags) {
            $post->tags()->sync($request->tags);
        }

        /* Validate if the request have a image */
        if ($request->file('file')) {
            $ruta = "blog-laravel";
            /* If the post have a image, first we delete this image from clodudinary and we update this in BD */
            if ($post->image) {
                $img = $post->image->url;
                $x = pathinfo($img, PATHINFO_FILENAME);
                $oldimg = 'blog-laravel/' . $x;
                cloudinary()->destroy($oldimg, $options = array());

                $response = cloudinary()->upload($request->file('file')->getRealPath(), array("folder" => $ruta))->getSecurepath();
                $post->image()->update([
                    'url' => $response,
                ]);
            } else {
                /* If the post doesn't have image relate we create a new  */
                $response = cloudinary()->upload($request->file('file')->getRealPath(), array("folder" => $ruta))->getSecurepath();
                $post->image()->create([
                    'url' => $response,
                ]);
            }
        }
        Cache::flush();
        return redirect()->route('admin.post.edit', $post)->with(['message' => 'Post Updated']);
    }

    
    public function destroy(Post $post)
    {
        /* Apply police PostPolice */
        $this->authorize('author', $post);
        $post->delete();
        Cache::flush();
        /* image delete with Post Observer */

        return redirect()->route('admin.post.index')->with(['delete' => 'Post Delete']);
    }
}
