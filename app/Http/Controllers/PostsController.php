<?php

namespace App\Http\Controllers;

use App\Post;
use GuzzleHttp\Client;
//use Illuminate\Http\Request;
//use Request;
use View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //GoogleAPIKey AIzaSyB5y74nbiFN0TjOKWqpnHhcSQ38TPRwiLs
        $client = new Client();
        $res = $client->request('get', 'https://data.nantes.fr/api/publication/23440003400026_J327/tourinsoft_restaurant_table/content?format=json');
        echo $res->getBody();


        // $posts = Post::get();
        // if(Request::isJson()) {
        //     return $posts;
        // }
        // return View('posts.index', compact('posts'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        return View('posts.edit', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $v = Validator::make(Input::all(), Post::$rules);
        if($v->fails()) {
            if(Request::isJson()) {
                return Response::json($v->errors(), 400);
            }
            return Redirect::back()->withInput()->withErrors($v->errors());
        }
        $post = Post::create(Input::all());
        if(Request::isJson()) {
            return $post;
        }
        return Redirect::route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        if(Request::isJson()) {
            return $post;
        }
        return View('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return View('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $post = Post::findOrFail($id);
        $v = Validator::make(Input::all(), Post::$rules);
        if($v->fails()) {
            if(Request::isJson()) {
                return Response::json($v->errors(), 400);
            }
            return Redirect::back()->withInput()->withErrors($v->errors());
        }

        $post->update(Input::all());
        if(Request::isJson()) {
            return $post;
        }
        return Redirect::route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        if (Request::isJson()) {
            return Response::json([]);
        }
        return Redirect::route('posts.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return View('posts.home');
    }
}
