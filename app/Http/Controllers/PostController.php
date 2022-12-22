<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render("Models/Post/IndexPage", [
            "header" => "Yazılar",
            'postList' => Post::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $selected = $request->selected ? $request->selected : [];

        return Inertia::render("Models/Post/CreatePage", [
            "header" => "Yeni Yazı Ekle",
            "userList" => User::where('name', 'like', "%" . $request->searchText . "%")->get(['id', 'name']),
            "selectedUsers" => User::whereIn('id', $selected)->get(['id', 'name']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'summary' =>'required',
            'authors' =>'required',
        ])->validate();


        $post = new Post;
        $post->code = Str::random(5);
        $post->name = $request->name;
        $post->summary = $request->summary;
        $post->status = $request->status;

        $post->save();

        $post->authors()->sync($request->authors);

        session()->flash('message', ['type' => 'success', 'content' => 'Yazı başarıyla eklendi.']);

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with('authors')->find($id);
        return Inertia::render("Models/Post/ShowPage", [
            "header" => $post->name,
            "post" => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Request $request)
    {
        $authorList = $post->authors->pluck('id');
        $selected = $request->selected ? $request->selected : $authorList;
        $post->authorList = $authorList;



        return Inertia::render("Models/Post/EditPage", [
            "header" => $post->name,
            "post" => $post,
            "userList" => User::where('name', 'like', "%" . $request->searchText . "%")->get(['id', 'name']),
            "selectedUsers" => User::whereIn('id', $selected)->get(['id', 'name']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'summary' =>'required',
            'authorList' =>'required',
        ])->validate();

        $post->name = $request->name;
        $post->summary = $request->summary;
        $post->status = $request->status;

        $post->authors()->sync($request->authorList);

        $post->save();


        session()->flash('message', ['type' => 'info', 'content' => 'Yazı düzenlendi.']);

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        $post->delete();

        session()->flash('message', ['type' => 'danger', 'content' => 'Yazı başarıyla silindi.']);

        return redirect()->route('post.index');
    }
}
