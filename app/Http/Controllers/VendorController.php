<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    public function VendorDashboard()
    {

        return view('vendor.index');

    }//End method

    public function VendorLogin()
    {
        return view('vendor.vendor_login');
    }//End method

    public function VendorDestroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/vendor/login');
    }//End method

    public function VendorProfile()
    {
        $id = Auth::user()->id;
        $vendorData = User::find($id);
        return view('vendor.vendor_profile_view', compact('vendorData'));

    }//End method

    public function VendorProfileStore(Request $request)
    {
        
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->vendor_join = $request->vendor_join;
        $data->vendor_short_info = $request->vendor_short_info;

        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/vendor_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/vendor_images'),$filename);
            $data['photo'] = $filename;
        };

        $data->save();

        $notification = array(
            'message' => 'Perfil de Vendedor actualizado correctamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
        
    }//End method

    public function VendorChangePassword()
    {
        return view('vendor.vendor_change_password');
    }//End method

    public function VendorUpdatePassword(Request $request)
    {
        //Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        //Match old password
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return back()->with("error", "Contraseña Antigua no concuerda");
        }

        //Update new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status", "Cambio de Contraseña exitoso");

    }//End method

    public function BecomeVendor()
    {
        return view('auth.become_vendor');
    }//End method

    public function VendorRegister(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::insert([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'vendor_join' => $request->vendor_join,
            'password' => Hash::make($request->password),
            'role' => 'vendor',
            'status' => 'inactive',
        ]);

        $notification = array(
            'message' => 'Registro de Vendedor Exitoso',
            'alert-type' => 'success',
        );

        return redirect()->route('vendor.login')->with($notification);
    }//End method

}
