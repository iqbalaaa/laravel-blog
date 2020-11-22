<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use Auth;
use App\Tag;
use App\Category;
use App\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post =  Post::all();
        return view('pages.admin.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category= Category::all();
        $tag = Tag::all();
        return view('pages.admin.post.create', compact('category', 'tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'gambar' => 'required'
        ]);

        $gambar = $request->gambar;
        $new_gambar= time().$gambar->getClientOriginalName();

        $post = Post::create([
            'judul'=>$request->judul,
            'category_id'=>$request->category_id,
            'content'=>$request->content,
            'gambar'=>'public/uploads/posts/'.$new_gambar,
            'slug' => Str::slug($request->judul),
            'user_id' =>Auth::id()

        ]);

        $post->tags()->attach($request->tags);
        $gambar->move('public/uploads/posts/', $new_gambar);
        return redirect()->route('post.index')->with('success', 'Postingan Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $tag= Tag::all();
        $post = Post::findOrFail($id);
        return view('pages.admin.post.edit', compact('post', 'tag', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ]);
        
        
        $post = Post::findOrFail($id);

        if ($request->has('gambar')) {
            $gambar = $request->gambar;
            $new_gambar= time().$gambar->getClientOriginalName();
            $gambar->move('public/uploads/posts/', $new_gambar);

            $post_data = [
                'judul'=>$request->judul,
                'category_id'=>$request->category_id,
                'content'=>$request->content,
                'gambar'=>'public/uploads/posts/'.$new_gambar,
                'slug' => Str::slug($request->judul)
            ];
        } else {
            $post_data = [
                'judul'=>$request->judul,
                'category_id'=>$request->category_id,
                'content'=>$request->content,
                'slug' => Str::slug($request->judul)
            ];
        }

        $post->tags()->detach();
        $post->tags()->attach($request->tags);
        $post->update($post_data);
        return redirect()->route('post.index')->with('success', 'Postingan Berhasil diUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('post.index')->with('success', 'Post Berhasil di Hapus (Berada di Trashed )');
    }

    public function tampil_hapus()
    {
        $post = Post::onlyTrashed()->get();
        return view('pages.admin.post.tampil_hapus', compact('post'));
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();

        return redirect()->route('post.index')->with('success', 'Post Berhasil di Restore');
    }
    
    public function kill($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();

        return redirect()->route('post.index')->with('success', 'Post Berhasil di Hapus Permanen');
    }
}