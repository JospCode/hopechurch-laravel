<?php

namespace App\Http\Controllers;

use App\Postcomment;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Post;

class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postcomments = DB::table('postcomments')
            ->select('postcomments.*', 'users.name', 'users.email', 'users.profile_image')
            ->join('users', 'postcomments.user_id', '=', 'users.id')
            ->where('postcomments.post_id', $post_id)
            ->get();
        
        return view('posts.show', compact('postcomments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(request()-> all());
        $request->validate([
            'post_id' => 'required',
            'user_id' => 'required',
            'comentario' => 'required',
            ]);
           
            PostComment::create($request->all() + ['post_id' => $post->id]);
           
            return redirect()->route('posts.show')
            ->with('success','Comment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PostComment  $postComment
     * @return \Illuminate\Http\Response
     */
    public function show(PostComment $postComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PostComment  $postComment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postcomment = PostComment::find($id);
        
        return view('posts.index', compact('postcomment') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PostComment  $postComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostComment $postComment)
    {
        //dd(request()-> all());
        $request->validate([
            'post_id' => 'required',
            'user_id' => 'required',
            'comentario' => 'required',
        ]);

        $postcomment->update($request->all());

        return redirect()->route('posts.index')
            ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PostComment  $postComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostComment $postComment)
    {
        $postComment->delete();
        return redirect()->route('forums.index')
            ->with('success','Forum deleted successfully');
    }
}
