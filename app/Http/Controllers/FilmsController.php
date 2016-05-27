<?php

namespace App\Http\Controllers;

use App\Film;

use App\Http\Requests;

use Request;

use App\Http\Requests\FilmRequest;



class FilmsController extends Controller
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
     * index page for films
     *
     * @return view 
     */
    public function index()
    {
        $films = Film::latest('film_id')->paginate(12);
    	return view('films.index', compact('films'));
    }

    /**
     * show a specific film
     *
     * @param Film $film through implicit binding
     * @return view 
     */
    public function show(Film $film)
    {
        $inventory_list = $this->getInventory($film, \Auth::user()->store_id);
        return view('films.show', compact('film','inventory_list'));
    }

   /**
     * create a new film
     *
     * @return view films.show
     */
    public function create()
    {        
        return view('films.create');
    }

    /**
     * store the new film in the database
     *
     * @param FilmRequest $request 
     * @return view films.index
     */
    public function store(FilmRequest $request)
    {
        $film = Film::create($request->all());
        $this->syncFields($film, $request);
        return redirect('films');
    }

    /**
     * edit a film
     *
     * @param Film $film through implicit binding
     * @return view films.edit
     */
    public function edit(Film $film)
    {
        return view('films.edit', compact('film'));
    }

    
    /**
     * update the edited film
     *
     * @param Film $film through implicit binding
     * @param FilmRequest $request 
     * @return view 
     */
    public function update(Film $film, FilmRequest $request)
    {
        $film->update($request->all());
        $this->syncFields($film, $request);
        return redirect('films');
    }

    /**
     * delete the film
     *
     * @return redirect
     **/
    public function destroy(Film $film)
    {
        $film->delete();
        return redirect('films');
    }

    /**
     * update the edited film
     *
     * @param Film $film 
     * @param $actors
     * @param $categories
     * @return void
     */
    private function syncFields(Film $film, FilmRequest $request)
    {

        if (!$request->has('actor_list')) {
            array_add($request,'actor_list',[]);
        }

         if (!$request->has('category_list')) {
            array_add($request,'category_list',[]);
        }

        $film->categories()->sync($request->input('category_list'));
        $film->actors()->sync($request->input('actor_list'));
    }

    /**
     * get inventory for the films on the store
     *
     * @param Film $film 
     * @param $store_id 
     * @return inventory list
     **/
    private function getInventory(Film $film, $store_id)
    {
        $queryString='call film_in_stock('.$film->film_id.','.$store_id.',@i); ';
        return \DB::select($queryString);
    }
}
