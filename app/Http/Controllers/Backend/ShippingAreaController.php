<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingArea;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Carbon\Carbon;

class ShippingAreaController extends Controller
{
    public function ShippingView(){
      

        $divisions = ShippingArea::orderBy('id' , 'DESC')->get();
        return view('backend.shipping.division_view' , compact('divisions'));
    }

    public function DivisionStore(Request $request){
        $request->validate([
            'division_name' => 'required',           
        ]);
        
        ShippingArea::insert([
            'division_name' => $request->division_name,            
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Product inserted Successfully',
            'alert-type' => 'success'
        );
        
        return redirect()->route('manage.division')->with($notification);

    }


    
    public function DivisionEdit($id){
        $division = ShippingArea::findOrFail($id);
        return view('backend.shipping.division_edit' , compact('division'));
    }

    public function DivisionUpdate(Request $request){
        $request->validate([
            'division_name' => 'required',           
        ]);
        $id = $request->id;                
        ShippingArea::findOrFail($id)->update([
                'division_name' => $request->division_name,               
            ]); 
        
        $notification = array(
            'message' => ' Product Edit Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage.division')->with($notification);
    }

    public function DivisionDelete($id){      
        ShippingArea::findOrFail($id)->delete();
        $notification = array(
            'message' => ' Product Delete Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage.division')->with($notification);
    }



    // district ========================================================================

    public function DistrictView(){
        $districts = ShipDistrict::orderBy('id' , 'DESC')->get();
        $divisions = ShippingArea::latest()->get();
        return view('backend.shipping.district_view' , compact('districts' , 'divisions'));
    }

    public function DistrictStore(Request $request){

        $request->validate([
            'district_name' => 'required', 
            'division_id' => 'required',                     
        ]);

        ShipDistrict::insert([
            'district_name' => $request->district_name,
            'division_id' => $request->division_id,            
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Product inserted Successfully',
            'alert-type' => 'success'
        );
        
        return redirect()->route('manage.district')->with($notification);

    }


    
    public function DistrictEdit($id){
        $districts = ShipDistrict::findOrFail($id);
        $divisions = ShippingArea::latest()->get();
        return view('backend.shipping.district_edit' , compact('districts' , 'divisions'));
    }

    public function DistrictUpdate(Request $request){
        $request->validate([
            'district_name' => 'required', 
            'division_id' => 'required',                     
        ]);

        $id = $request->id;                
        ShipDistrict::findOrFail($id)->update([
            'district_name' => $request->district_name,
            'division_id' => $request->division_id,             
            ]); 
        
        $notification = array(
            'message' => ' Product Edit Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage.district')->with($notification);
    }

    public function DistrictDelete($id){      
        ShipDistrict::findOrFail($id)->delete();
        $notification = array(
            'message' => ' Product Delete Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage.district')->with($notification);
    }




        
    // state ========================================================================

    public function StateView(){
        $districts = ShipDistrict::orderBy('id' , 'DESC')->get();
        $divisions = ShippingArea::latest()->get();
        $states = ShipState::latest()->get();
        return view('backend.shipping.state_view' , compact('districts' , 'divisions' , 'states'));
    }

    public function StateStore(Request $request){
        $request->validate([
            'district_id' => 'required', 
            'division_id' => 'required', 
            'state_name' => 'required',                     
        ]);

        ShipState::insert([
            'district_id' => $request->district_id,
            'division_id' => $request->division_id, 
            'state_name' => $request->state_name,           
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Product inserted Successfully',
            'alert-type' => 'success'
        );
        
        return redirect()->route('manage.state')->with($notification);

    }


    
    public function StateEdit($id){
        $districts = ShipDistrict::latest()->get();
        $divisions = ShippingArea::latest()->get();
        $state = ShipState::findOrFail($id);
        //print_r($state);
        // print_r($districts);
        // print_r($divisions);
        return view('backend.shipping.state_edit' , compact('districts' , 'divisions' , 'state'));
    }

    public function StateUpdate(Request $request){
        $request->validate([
            'district_id' => 'required', 
            'division_id' => 'required', 
            'state_name' => 'required',                     
        ]);


        $id = $request->id;                
        ShipState::findOrFail($id)->update([
            'district_id' => $request->district_id,
            'division_id' => $request->division_id, 
            'state_name' => $request->state_name,              
            ]); 
        
        $notification = array(
            'message' => ' Product Edit Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage.state')->with($notification);
    }

    public function StateDelete($id){      
        ShipState::findOrFail($id)->delete();
        $notification = array(
            'message' => ' Product Delete Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage.state')->with($notification);
    }

     // drop down District
     public function GetDivision($division_id){
        $subdiv = ShipDistrict::where('division_id',$division_id)->orderBy('district_name' , 'ASC')->get();
        return json_encode($subdiv); 
    }

    public function GetState($district_id){
        $subdis = ShipState::where('district_id',$district_id)->orderBy('state_name' , 'ASC')->get();
        return json_encode($subdis);
    }
    

}
