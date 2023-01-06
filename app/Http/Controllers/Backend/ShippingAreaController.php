<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Carbon\Carbon;

class ShippingAreaController extends Controller
{
    
    public function AllDivision()
    {

        $division = ShipDivision::latest()->get();

        return view('backend.ship.division.division_all', compact('division'));

    }//End method

    public function AddDivision()
    {
        
        return view('backend.ship.division.division_add');

    }//End method

    public function StoreDivision(Request $request)
    {
        
        ShipDivision::insert([

            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Comuna Insertada Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->route('all.division')->with($notification);


    }//End method

    public function EditDivision($id)
    {
        
        $division = ShipDivision::findOrFail($id);

        return view('backend.ship.division.division_edit', compact('division'));

    }//End method

    public function UpdateDivision(Request $request)
    {
        
        $division_id = $request->id;

        ShipDivision::findOrFail($division_id)->update([

            'division_name' => $request->division_name,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Comuna Actualizada Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->route('all.division')->with($notification);


    }//End method

    public function DeleteDivision($id)
    {
        ShipDivision::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Comuna Eliminada Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }//End method


                                        ///////////////////// DISTRICT CRUD /////////////////////


    public function AllDistrict()
    {

        $district = ShipDistrict::latest()->get();

        return view('backend.ship.district.district_all', compact('district'));

    }//End method

    public function AddDistrict()
    {

        $division = ShipDivision::orderBy('division_name','ASC')->get();
        
        return view('backend.ship.district.district_add', compact('division'));

    }//End method

    public function StoreDistrict(Request $request)
    {
        
        ShipDistrict::insert([

            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Distrito Añadido Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->route('all.district')->with($notification);


    }//End method

    public function EditDistrict($id)
    {

        $division = ShipDivision::orderBy('division_name','ASC')->get();
        
        $district = ShipDistrict::findOrFail($id);

        return view('backend.ship.district.district_edit', compact('district','division'));

    }//End method

    public function UpdateDistrict(Request $request)
    {
        
        $district_id = $request->id;

        ShipDistrict::findOrFail($district_id)->update([

            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Distrito Actualizado Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->route('all.district')->with($notification);


    }//End method

    public function DeleteDistrict($id)
    {
        ShipDistrict::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Distrito Eliminado Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }//End method


                                    ///////////////////// STATE CRUD /////////////////////

    
    public function AllState()
    {

        $state = ShipState::latest()->get();

        return view('backend.ship.state.state_all', compact('state'));

    }//End method

    public function AddState()
    {

        $division = ShipDivision::orderBy('division_name','ASC')->get();

        $district = ShipDistrict::orderBy('district_name','ASC')->get();
        
        return view('backend.ship.state.state_add', compact('division','district'));

    }//End method

    public function GetDistrict($division_id)
    {
        
        $district = ShipDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();

        return json_encode($district);

    }//End method

    public function StoreState(Request $request)
    {
        
        ShipState::insert([

            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Zona Añadida Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->route('all.state')->with($notification);


    }//End method

    public function EditState($id)
    {

        $division = ShipDivision::orderBy('division_name','ASC')->get();

        $district = ShipDistrict::orderBy('district_name','ASC')->get();

        $state = ShipState::findOrFail($id);
        
        return view('backend.ship.state.state_edit', compact('division','district','state'));

    }//End method

    public function UpdateState(Request $request)
    {
        
        $state_id = $request->id;

        ShipState::findOrFail($state_id)->update([

            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Zona Actualizada Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->route('all.state')->with($notification);


    }//End method

    public function DeleteState($id)
    {
        ShipState::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'Zona Eliminada Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }//End method

}
