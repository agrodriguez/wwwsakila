<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Inventory;

class PagesController extends Controller
{
    public function index()
    {
    	return view('pages.home')->with('name','Sakila');
    }

    public function about(){
    	return view('pages.about');
    }

    public function contact(){
    	return view('pages.contact');
    }

    public function cities(){
        if(isset($_GET['id']))
        return \DB::table('city')->select('city_id as id','city as text')->where('country_id',$_GET['id'])->get();
    }

    public function inventories(){
        if(isset($_GET['id']) && isset($_GET['store'])){
            $queryString='SELECT inventory_id as id, CONCAT("#",inventory_id) as text
            FROM inventory
            WHERE film_id = '.$_GET['id'].'
            AND store_id = '.$_GET['store'].'
            AND inventory_in_stock(inventory_id);';
        }
        return \DB::select($queryString);        
    }

    public function storeInventory(Request $request){
        Inventory::create($request->all());
        return redirect('films/'.$request->film_id);
    }
}
