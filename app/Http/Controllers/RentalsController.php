<?php

namespace App\Http\Controllers;

use App\Rental;

use App\Http\Requests;

use Request;

use App\Http\Requests\RentalRequest;

use DB;

use Validator;

use App\Payment;

use Carbon\Carbon;


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
     * not used
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
        
        $validator = Validator::make($request->all(), [
            'inventory_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('rentals')
                        ->withErrors($validator)
                        ->withInput();
        }

        $rental = Rental::create($request->except('film_id'));

        //$rental=Rental::first();
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
        //return view('rentals/16050/payment');
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function update (Rental $rental,RentalRequest $request)
    {
        //update return date on rental
        //$rental = Rental::findOrFail($rental);
        $myDate = date('Y-m-d');
        //return $myDate;
        
        $rental->return_date = $myDate;
        $rental->save();

        return redirect('rentals/'.$rental->rental_id.'/payment');
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function payment (Rental $rental)
    {
        
        $queryString='select get_customer_balance('.$rental->customer_id.',NOW()) as amount;';
        $amount=\DB::select($queryString);
        
        if($amount[0]->amount==0.00){
            return redirect('rentals');
        } 
        else{
            return view('rentals.payment',compact('rental','amount'));
        }
        
        
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
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
