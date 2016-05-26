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
     * @return view films.index
     */
    public function index()
    {
        $films = Film::latest('film_id')->paginate(12);
    	return view('films.index', compact('films'));
    }

    /**
     * show a specific film
     *
     * parameter Film $film through implicit binding
     * @return view films.show
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
     * parameter FilmRequest $request 
     * @return view films.index
     */
    public function store(FilmRequest $request)
    {
        
        $film = Film::create($request->all());

        $this->syncFields($film, $request->input('actor_list'),$request->input('category_list'));

        return redirect('films');
    }

    /**
     * edit a film
     *
     * parameter Film $film through implicit binding
     * @return view films.edit
     */
    public function edit(Film $film)
    {
        return view('films.edit', compact('film'));
    }

    
    /**
     * update the edited film
     *
     * parameter Film $film through implicit binding
     * parameter FilmRequest $request 
     * @return view films.index
     */
    public function update(Film $film, FilmRequest $request)
    {
        $film->update($request->all());

        $this->syncFields($film, $request->input('actor_list'), $request->input('category_list'));

        return redirect('films');
    }

    /**
     * update the edited film
     *
     * parameter Film $film 
     * parameter $actors
     * parameter $categories
     * @return Film $film
     */
    private function syncFields(Film $film, array $actors, array $categories){

        $film->categories()->sync($categories);

        $film->actors()->sync($actors);

    }

    /**
     * get inventory for the films on the store
     *
     * @return inventory list
     * @author 
     **/
    private function getInventory(Film $film, $store_id)
    {
        $queryString='call film_in_stock('.$film->film_id.','.$store_id.',@i); ';
        return \DB::select($queryString);
    }
}
