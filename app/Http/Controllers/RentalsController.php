<?php

namespace App\Http\Controllers;


use App\Rental;

use App\Http\Requests;

use Request;

use App\Http\Requests\RentalRequest;

use DB;

class RentalsController extends Controller
{
    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function __construct()
    {
    	$this->middleware('auth');
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function index()
    {   
        $films = DB::table('film')->select(DB::raw('film_id, concat(title," - ", SUBSTRING(description,1,50),"...") as name'))->lists('name', 'film_id');
        $customers= DB::table('customer')->select(DB::raw('customer_id, concat(first_name," ", last_name) as name'))->lists('name', 'customer_id');
    	return view('rentals.index',compact('films','customers'));
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function show(Rental $rental)
    {
        return view('rentals.show',compact('rental'));
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function create ()
    {
        
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function store (RentalRequest $request)
    {
        $rental = Rental::create($request->except('film_id'));
        return redirect('rentals/'.$rental->rental_id.'/payment');
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function edit (Rental $rental)
    {
        return view('rentals/16050/payment');
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function update (Rental $rental,RentalRequest $request)
    {
        
        //return redirect('rentals/16050/payment');
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function payment (Rental $rental)
    {
        $queryString='select get_customer_balance('.$rental->customer_id.',NOW()) as ammount;';
        
        $ammount=\DB::select($queryString);
        return view('rentals.payment',compact('rental','ammount'));
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function payUp (Rental $rental,RentalRequest $request)
    {
        return $request;
        //return view('rentals.payment',compact('rental','ammount'));
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function returnDVD (Rental $rental)
    {

        $queryString='select get_customer_balance('.$rental->customer_id.',NOW()) as ammount;';
        $ammount=\DB::select($queryString);
        return view('rentals.payment',compact('rental','ammount'));
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function ret (Rental $rental,RentalRequest $request)
    {


        return $request;
        //return view('rentals.payment',compact('rental','ammount'));
    }
}
