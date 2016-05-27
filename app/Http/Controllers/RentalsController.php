<?php

namespace App\Http\Controllers;

use App\Rental;

use App\Http\Requests;

use Request;

use App\Http\Requests\RentalRequest;

use DB;

use Validator;

use App\Payment;

class RentalsController extends Controller
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
     * main rental page
     * 
     * passes a list of films and customers
     * @return view
     */
    public function index()
    {   
        $films = DB::table('film')->select(DB::raw('film_id, concat(title," - ", SUBSTRING(description,1,50),"...") as name'))->lists('name', 'film_id');
        $customers= DB::table('customer')->select(DB::raw('customer_id, concat(first_name," ", last_name) as name'))->lists('name', 'customer_id');
    	return view('rentals.index',compact('films','customers'));
    }

    /**
     * show the detail for the rental
     * for returning a DVD
     * 
     * @param  App\Rental $rental
     * @return view
     */
    public function show(Rental $rental)
    {
        return view('rentals.show',compact('rental'));
    }

    /**
     * not used
     *
     * @return void
     **/
    public function create ()
    {
        //
    }

    
    /**
     * create the rental information
     * validating the inventory id
     * 
     * @param  App\RentalRequest $request
     * @return redirect
     */
    public function store (RentalRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'inventory_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('rentals')
            ->withErrors($validator)
            ->withInput();
        }
        $rental = Rental::create($request->except('film_id'));
        return redirect('rentals/'.$rental->rental_id.'/payment');
    }

    /**
     * not used
     *
     * @return void
     **/
    public function edit (Rental $rental)
    {
        //
    }

    /**
     * update the rental return date
     *
     * this return the DVD to the store
     * @param  App\Rental $rental
     * @param  App\RentalRequest $request
     * @return redirect
     */
    public function update (Rental $rental,RentalRequest $request)
    {
        $myDate = date('Y-m-d');
        $rental->return_date = $myDate;
        $rental->save();
        return redirect('rentals/'.$rental->rental_id.'/payment');
    }

    /**
     * payment methos for the rental or overdue charges
     * @param  App\Rental $rental
     * @return mixed
     */
    public function payment (Rental $rental)
    {
        $queryString='select get_customer_balance('.$rental->customer_id.',NOW()) as amount;';
        $amount=\DB::select($queryString);
        /** if returned in  time no overdue charges */
        if($amount[0]->amount==0.00){
            return redirect('rentals');
        } 
        else{
            return view('rentals.payment',compact('rental','amount'));
        }
    }

    /**
     * pay the amount due
     * 
     * @param  Rental $rental
     * @param  RentalRequest $request
     * @return redirect
     */
    public function payUp (Rental $rental,RentalRequest $request)
    {
        $payment= new Payment;
        $payment->customer_id=$rental->customer_id;
        $payment->staff_id=\Auth::user()->staff_id;
        $payment->rental_id=$rental->rental_id;
        $payment->amount=$request->amount;
        $payment->save();
        return redirect('rentals');
    }
}
