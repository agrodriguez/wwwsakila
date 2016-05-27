<?php

namespace App\Http\Controllers;

use App\Customer;

use App\Http\Requests;

use Request;

use App\Http\Requests\CustomerRequest;

use App\Address;

use DB;

class CustomersController extends Controller
{
    //

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
     * default view for customers
     * 
     * @return view
     */
    public function index()
    {
        $customers = Customer::with('address.city.country','store.address.city.country')->paginate(10);            	
    	return view('customers.index', compact('customers'));
    }

    /**
     * show customere detail
     * 
     * @param  App\Customer $customer
     * @return view
     */
    public function show(Customer $customer){
        //eager load address city and country
        $customer->load('address.city.country','store.address.city.country')->get();
        return view('customers.show',compact('customer'));
    }

    /**
     * create new customer
     * 
     * @return view
     */
    public function create()
    {
        //set the city as default select value is null on create
        $city=[];
        return view('customers.create',compact('city'));
    }

    /**
     * save the new customer
     * 
     * @param  Requests\CustomerRequest $request
     * @return redirect
     */
    public function store (CustomerRequest $request)
    {
        $this->storeCustomer($request);
        return redirect('customers');
    }

    /**
     * edit the customer
     * 
     * @param  App\Customer $customer
     * @return view
     */
    public function edit(Customer $customer)
    {
        /** set the city as default select value */        
        $city=[$customer->address->city_id=>$customer->address->city->city];
        return view('customers.edit', compact('customer','city'));
    }

    /**
     * update the customer
     * 
     * @param  App\Customer $customer
     * @param  App\CustomerRequest $request
     * @return redirect
     */
    public function update(Customer $customer, CustomerRequest $request)
    { 
        $this->updateCustomer($customer, $request);
        return redirect('customers');
    }

    /**
     * save the address and the customer to each model
     * 
     * @param  App\CustomerRequest $request
     * @return void
     */
    private function storeCustomer(CustomerRequest $request)
    {
        // set the address values and create        
        $address_array = array_add(array_add($request->address, 'city_id', $request->city_id ),'location', $request->location);
        $address = Address::create($address_array);

        // set the customer values        
        $customer_array = array_add(array_add($request->except('address','city_id','country_id','location'), 'address_id', $address->address_id),'active',$request->has('active'));
        $customer =Customer::create($customer_array);
    }

    /**
     * update the address and customer model
     * 
     * @param  Customer $customer
     * @param  CustomerRequest $request
     * @return void
     */
    private function updateCustomer(Customer $customer, CustomerRequest $request)
    {
        $address_array = array_add(array_add($request->address, 'city_id', $request->city_id ),'location', $request->location);
        $customer->address->update($address_array);

        $customer->active = $request->has('active');
        $customer->update($request->except('address','city_id','country_id','location'));
    }

}
