<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;

use App\Http\Requests;

use App\Address;

use Request;

use App\City;

use App\Country;


class AddressesController extends Controller
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
     * 
     */
    public function index()
    {

    	$addresses = Address::with('city.country')->paginate(10);    	
    	return view('addresses.index', compact('addresses'));
    }

    /**
     * 
     */
    public function show(Address $address)
    {
        return view('addresses.show', compact('address'));
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function create()
    {
        $countries=Country::lists('country','country_id')->all();
        $city=[];
        return view('addresses.create', compact('countries','city'));
    }

    /**
     * undocumented function
     *
     * @return addresses
     * @author 
     **/
    public function store (AddressRequest $request)
    {
        $address = Address::create($request->except(['country_id']));
        return redirect('addresses');
    }


    /**
     * 
     */
    public function edit(Address $address)
    {
        
        $countries=Country::lists('country','country_id')->all();
        $city=[$address->city_id=>$address->city->city];
        return view('addresses.edit', compact('address','countries','city'));
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function update(Address $address, AddressRequest $request)
    {
        $address->update($request->except(['country_id']));
        return redirect('addresses');
    }
}
