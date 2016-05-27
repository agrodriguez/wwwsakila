<?php

namespace App\Http\Controllers;

use App\Actor;

use App\Http\Requests;

use Request;

use App\Http\Requests\ActorRequest;

class ActorsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * return default view for the actor
     * 
     * @return view
     */
    public function index()
    {
    	$actors = Actor::paginate(10);    	
    	return view('actors.index', compact('actors'));
    }

     /**
     * show detail view for the actor
     * 
     * @param  App\Actor $actor
     * @return view
     */
    public function show(Actor $actor)
    {
        return view('actors.show', compact('actor'));
    }
}
