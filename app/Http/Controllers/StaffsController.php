<?php

namespace App\Http\Controllers;

use App\Staff;

use App\Http\Requests;

use Request;

use App\Http\Requests\StaffRequest;

use Image;

use App\Address;

class StaffsController extends Controller
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
        $staffs = Staff::with('address.city.country','store.address.city.country')->paginate(3);            	
    	return view('staffs.index', compact('staffs'));
    }

    /**
     * 
     */
    public function show(Staff $staff){
        $staff->load('address.city.country','store.address.city.country')->get();
        return view('staffs.show',compact('staff'));
    }

    /**
     * 
     */
    public function create(){
        $city=[];
        return view('staffs.create',compact('city'));
    }

    /**
     * 
     */
    public function store(StaffRequest $request){ 

         // set the address values and create        
        $address_array = array_add(array_add($request->address, 'city_id', $request->city_id ),'location', $request->location);        
        $address = Address::create($address_array);

       

        // set the customer values        
        $staff_array = array_add(array_add($request->except('address','city_id','country_id','location'), 'address_id', $address->address_id),'active',$request->has('active'));
        $staff =Staff::create($staff_array);

        $tmpName='images/uploads/upload'.time().'.png';



        if (!is_null($request->file('picture'))){
             $img = Image::make($request->file('picture'))->fit(121, 117)->save($tmpName);
             $staff->picture = $img->encode('png');
        }

        $staff->save();

        //$staff = Staff::create($request->all());
        return redirect('staffs');
    }

    /**
     * 
     */
    public function edit(Staff $staff){
        $city=[$staff->address->city_id=>$staff->address->city->city];
        return view('staffs.edit',compact('staff','city'));
    }

    /**
     * 
     */
    public function update(Staff $staff, StaffRequest $request){

        //dd($request->file('picture'));

        //$staff->active = $request->has('active');

        //$tmpName='C:\inetpub\wwwsakila\public\Jqueryupload\uploads\Desktop.png';

        $tmpName='images/uploads/upload'.time().'.png';

        /*$img = Image::make($tmpName)->resize(121, null,function ($constraint) {
            $constraint->aspectRatio();
        });*/

        //$img = Image::make(Input::file('picture'))->fit(121, 117)->save($tmpName);
        if (!is_null($request->file('picture'))){
             $img = Image::make($request->file('picture'))->fit(121, 117)->save($tmpName);
             $staff->picture = $img->encode('png');
        }


        $address_array = array_add(array_add($request->address, 'city_id', $request->city_id ),'location', $request->location);
        $staff->address->update($address_array);

        $staff->active = $request->has('active');
        $staff->update($request->except('address','city_id','country_id','location','picture','password'));



        //$staff->update($request->except(['picture','password']));

        return redirect('staffs');
    }

}
