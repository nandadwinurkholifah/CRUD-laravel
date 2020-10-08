<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\category;
use App\excel;
use DB;

class postcontroller extends Controller
{
    public function index()
    {
        $posts =  post:: all();
        return view('post.index', compact('posts'));
    }


    public function create()
    {
    	$categories = category::all();

    	return view('post.create', compact('categories'));
    }

    public function store()
    {
    	post::create([
    		'title' => request('title'),
            'slug' => str_slug(request('title')),
    		'content' => request('content'),
            'category_id' => request('category_id')
    	]);

        return redirect()->route('post.index')->withInfo('Post ditambahkan');
    }

    public function show(post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(post $post)
    {
        $categories = category::all();
        return view('post.edit', compact('post', 'categories'));
    }

    public function update(post $post)
    {
        
        $post->update([
            'title' => request('title'),
            'category_id='=> request('category_id'),
            'content'=> request('content'),
        ]);

        return redirect()->route('post.index')->withInfo('Post berhasil dirubah');
    }

    public function destroy(post $post)
    {
        $post->delete();

        return redirect()->route('post.index')->withDanger('Post berhasil dihapus');;
    }
    
}
