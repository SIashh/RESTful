<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests;
use App\Http\Resources\Post as PostResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $posts = Post::get();

        return PostResource::collection($posts);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;

        $v = Validator::make(Input::all(), Post::$rules);
        if($v->fails()) {
            if($request->isJson()) {
                return response()->json($v->errors(), 400);
            }
            return Redirect::back()->withInput()->withErrors($v->errors());
        }

        $post->id = $request->input('post_id');
        $post->commentaire = $request->input('commentaire');
        $post->note = $request->input('note');

        if($post->save()) {
            return new PostResource($post);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try 
        {
            $post = Post::findOrFail($id);

            return new PostResource($post);
        }
        catch(ModelNotFoundException $e) {
            return response()->json([
                'Error' => 'Id not found'
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $v = Validator::make(Input::all(), Post::$rules);
        if($v->fails()) {
            if($request->isJson()) {
                return response()->json($v->errors(), 400);
            }
            return Redirect::back()->withInput()->withErrors($v->errors());
        }

        $post->id = $id;
        $post->commentaire = $request->input('commentaire');
        $post->note = $request->input('note');

        if($post->save()) {
            return new PostResource($post);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try 
        {
        $post = Post::findOrFail($id);

        if($post->delete()) {
            return response()->json([], 200);
        }

        }
        catch(ModelNotFoundException $e) {
            return response()->json([
                'Error' => 'Id not found'
            ], 400);
        }
    }

}