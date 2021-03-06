<?php

/** THIS CONTROLLER IS NOT CURRENTLY USED */

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
     * return default view
     * 
     * @return view
     */
    public function index()
    {

    	$addresses = Address::with('city.country')->paginate(10);    	
    	return view('addresses.index', compact('addresses'));
    }

    /**
     * show address detail
     * 
     * @param  App\Address $address
     * @return view
     */
    public function show(Address $address)
    {
        return view('addresses.show', compact('address'));
    }

    /**
     * create a new address
     *
     * country list passed on to the form as well as the default city
     * @return view
     */
    public function create()
    {
        $countries=Country::lists('country','country_id')->all();
        $city=[];
        return view('addresses.create', compact('countries','city'));
    }

    /**
     * save the new address
     * 
     * @param  Requests/AddressRequest $request
     * @return redirect
     */
    public function store (AddressRequest $request)
    {
        $address = Address::create($request->except(['country_id']));
        return redirect('addresses');
    }

    /**
     * edit the address
     * 
     * @param  App\Address $address
     * @return view
     */
    public function edit(Address $address)
    {
        $countries=Country::lists('country','country_id')->all();
        $city=[$address->city_id=>$address->city->city];
        return view('addresses.edit', compact('address','countries','city'));
    }

    /**
     * update the address
     * 
     * @param  App/Address $address
     * @param  Requests/AddressRequest $request
     * @return redirect
     */
    public function update(Address $address, AddressRequest $request)
    {
        $address->update($request->except(['country_id']));
        return redirect('addresses');
    }
}
