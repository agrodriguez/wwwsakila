<?php

/** THIS IS AN API HERPER CONTROLLER FOR PERFORMING SEVERAL TASKS */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Inventory;

class ApiController extends Controller
{
    /**
     * return a list of cities from the provided country
     * 
     * @return list
     */
    public function cities(){
        if(isset($_GET['id']))
        return \DB::table('city')->select('city_id as id','city as text')->where('country_id',$_GET['id'])->get();
    }

    /**
     * retrun the list inventory ids from a given film and store
     * 
     * @return Array 
     */
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

    /**
     * create a new inventory for the film and store
     * 
     * @param  Request $request
     * @return redirect
     */
    public function storeInventory(Request $request){
        Inventory::create($request->all());
        return redirect('films/'.$request->film_id);
    }
}
