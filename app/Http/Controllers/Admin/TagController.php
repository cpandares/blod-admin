<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.create')->only('create','store');
        $this->middleware('can:admin.tags.edit')->only('edit','update');
        $this->middleware('can:admin.tags.destroy')->only('destroy');
    }


   
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    
    public function create()
    {
        $colors = [
            'red'=>'Red',
            'yellow'=>'Yellow',
            'green'=>'Green',
            'blue'=>'Blue',
            'purple'=>'Purple'
        ];

        return view('admin.tags.create', compact('colors'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'slug'=>'required|string|unique:tags',
            'color'=>'required'
        ]);

        $tag = Tag::create($request->all());

        return redirect()->route('admin.tags.index')->with([
            'message'=>'Tag save'
         ]);
    }

   
    public function show(Tag $tag)
    {
        //
        return view('admin.tags.show', compact('tag'));
    }

    
    public function edit(Tag $tag)
    {
        
        
        $colors = [
            'red'=>'Red',
            'yellow'=>'Yellow',
            'green'=>'Green',
            'blue'=>'Blue',
            'purple'=>'Purple'
        ];

         return view('admin.tags.edit', compact('tag', 'colors'));
    }

   
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name'=>'required|string',
            'slug'=>"required|string|unique:tags,slug,$tag->id",
            'color'=>'required'
        ]);

        $tag->update($request->all());

        return redirect()->route('admin.tags.index')->with([
            'message'=>'Tag Updated'
         ]);
    }

    
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with([
            'message'=>'Tag Delete'
         ]);
    }
}
