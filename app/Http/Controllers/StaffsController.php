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
     * show index
     * 
     * @return view
     */
    public function index()
    {
        $staffs = Staff::with('address.city.country','store.address.city.country')->paginate(3);            	
    	return view('staffs.index', compact('staffs'));
    }

    /**
     * show staff detail
     * 
     * @param  Staff $staff
     * @return view
     */
    public function show(Staff $staff){
        $staff->load('address.city.country','store.address.city.country')->get();
        return view('staffs.show',compact('staff'));
    }

    
    /**
     * create new staff
     * 
     * @return view
     */
    public function create(){
        $city=[];
        return view('staffs.create',compact('city'));
    }

    /**
     * save new staff
     * 
     * @param  StaffRequest $request
     * @return redirect
     */
    public function store(StaffRequest $request){ 

        $this->storeStaff($request);
        return redirect('staffs');
    }

    /**
     * edit the staff 
     * 
     * @param  Staff $staff
     * @return view
     */
    public function edit(Staff $staff){
        $city=[$staff->address->city_id=>$staff->address->city->city];
        return view('staffs.edit',compact('staff','city'));
    }

    /**
     * update the staff
     * 
     * @param  Staff $staff
     * @param  StaffRequest $request
     * @return redirect
     */
    public function update(Staff $staff, StaffRequest $request){
        $this->updateStaff($staff, $request);
        return redirect('staffs');
    }

    /**
     * delete the staff
     * 
     * @param  Staff $staff
     * @return redirect
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect('staffs');
    }

    /**
     * update the staff address image and password
     *
     * @param  Staff $staff
     * @param  StaffRequest $request
     * @return void
     **/
    private function updateStaff (Staff $staff, StaffRequest $request)
    {
        $tmpName='images/uploads/upload'.time().'.png';

        if (!is_null($request->file('picture'))){
             $img = Image::make($request->file('picture'))->fit(121, 117)->save($tmpName);
             $staff->picture = $img->encode('png');
        }

        $address_array = array_add(array_add($request->address, 'city_id', $request->city_id ),'location', $request->location);
        $staff->address->update($address_array);

        $staff->active = $request->has('active');
        if($request->has('password')){
            $request['password'] = bcrypt($request['password']);
            $staff->update($request->except('address','city_id','country_id','location','picture'));
        }
        else{
            $staff->update($request->except('address','city_id','country_id','location','picture','password'));   
        }
    }

    /**
     * store the staff address image and info
     *
     * @param  StaffRequest $request
     * @return void
     **/
    private function storeStaff (StaffRequest $request)
    {
        /** set the address values and create */
        $address_array = array_add(array_add($request->address, 'city_id', $request->city_id ),'location', $request->location);
        $address = Address::create($address_array);
        
        /** set the customer values */
        $staff_array = array_add(array_add($request->except('address','city_id','country_id','location'), 'address_id', $address->address_id),'active',$request->has('active'));
        $staff_array['password'] = bcrypt($request['password']);
        $staff =Staff::create($staff_array);

        $tmpName='images/uploads/upload'.time().'.png';

        if (!is_null($request->file('picture'))){
             $img = Image::make($request->file('picture'))->fit(121, 117)->save($tmpName);
             $staff->picture = $img->encode('png');
        }
        $staff->save();
        //$staff = Staff::create($request->all());
    }

}
