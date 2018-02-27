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
     * Retourne sous format JSON l'ensemble des posts 
     * présent dans la base de donnée.
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
     * Vérification des règles imposer par le modèle Post
     * Si les règles ne sont pas respectées renvoie une erreur 400,
     * sous forme JSON. Sinon, on récupère les données présents dans la 
     * requète est on les sauvegarde. 
     * 
     * @param  Request  $request
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
     * Recherche le post avec l'id donnée en paramètre
     * et la retourne, si la recherche de l'id échoue
     * retourne sous format JSON une erreur 400 indiquant
     * que l'id n'a pas était trouvé.  
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
     * Recherche du post avec l'id donnée en paramètre.
     * Puis, vérification des règles imposer par le modèle Post
     * Si les règles ne sont pas respectées renvoie une erreur 400,
     * sous forme JSON. Sinon, on récupère les données présents dans la 
     * requète est on les sauvegarde. 
     * Si la recherche de l'id échoue retourne sous format JSON 
     * une erreur 400 indiquant que l'id n'a pas était trouvé. 
     *
     * @param  Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try 
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
        }catch(ModelNotFoundException $e) {
            return response()->json([
                'Error' => 'Id not found'
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     * 
     * On recherche le post ayant l'id donnée en paramètre.
     * Si le post existe alors on le supprime. Sinon, on 
     * renvoie sous format JSON une erreur 400 disant que l'id 
     * n'existe pas
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