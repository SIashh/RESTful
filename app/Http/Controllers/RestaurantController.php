<?php

namespace App\Http\Controllers;

use App\Commentaire;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Resources\Commentaire as CommentaireResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_restaurant)
    {
        $commentaire = new Commentaire;

        $v = Validator::make(Input::all(), Commentaire::$rules);
        if($v->fails()) {
            if($request->isJson()) {
                return response()->json($v->errors(), 400);
            }
            return Redirect::back()->withInput()->withErrors($v->errors());
        }

        //$id = Auth::id(); //Get the currently authenticated user's ID
        $commentaire->id = $request->input('commentaire_id');
        $commentaire->commentaires = $request->input('commentaires');
        $commentaire->note = $request->input('note');
        $commentaire->id_restaurants = $id_restaurant;
        $commentaire->id_users = $request->input('id_users');

        if($commentaire->save()) {
            return new CommentaireResource($commentaire);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_restaurant, $id_comments)
    {
        try 
        {
            
            $commentaire = new Commentaire;
            RestaurantController::destroy($id_restaurant, $id_comments);

            $v = Validator::make(Input::all(), Commentaire::$rules);
            if($v->fails()) {
                if($request->isJson()) {
                    return response()->json($v->errors(), 400);
                }
                return Redirect::back()->withInput()->withErrors($v->errors());
            }

            //$id = Auth::id(); //Get the currently authenticated user's ID
            $commentaire->id = $id_comments;
            $commentaire->commentaires = $request->input('commentaires');
            $commentaire->note = $request->input('note');
            $commentaire->id_restaurants = $id_restaurant;
            $commentaire->id_users = $request->input('id_users');

            if($commentaire->save()) {
                return new CommentaireResource($commentaire);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_restaurant, $id_comments)
    {
        try 
        {
            $commentaire = Commentaire::findOrFail($id_comments);
            if($commentaire->delete()) {
                //return response()->json([], 200);
            }
        }
        catch(ModelNotFoundException $e) {
            return response()->json([
                'Error' => 'Id not found'
            ], 400);
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $user = new User;

        return User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
    }
}
