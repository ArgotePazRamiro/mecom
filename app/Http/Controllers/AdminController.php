<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function AdminDashboard()
    {

        return view('admin.index');

    }//End method

    public function AdminLogin()
    {
        return view('admin.admin_login');
    }//End method

    public function AdminDestroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }//End method

    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));

    }//End method

    public function AdminProfileStore(Request $request)
    {
        
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        };

        $data->save();

        $notification = array(
            'message' => 'Perfil de Administrador actualizado correctamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
        
    }//End method

    public function AdminChangePassword()
    {
        return view('admin.admin_change_password');
    }//End method

    public function AdminUpdatePassword(Request $request)
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

    public function InactiveVendor()
    {
        $inActiveVendor = User::where('status','inactive')->where('role','vendor')->latest()->get();
        return view('backend.vendor.inactive_vendor',compact('inActiveVendor'));
    }//End method

    public function ActiveVendor()
    {
        $ActiveVendor = User::where('status','active')->where('role','vendor')->latest()->get();
        return view('backend.vendor.active_vendor',compact('ActiveVendor'));
    }//End method

    public function InactiveVendorDetails($id)
    {
        
        $inactiveVendorDetails = User::findOrFail($id);
        return view('backend.vendor.inactive_vendor_details',compact('inactiveVendorDetails'));

    }//End method

    public function ActiveVendorApprove(Request $request)
    {
        
        $vendor_id = $request->id;
        $user = User::findOrFail($vendor_id)->update([
            'status' => 'active',
        ]);

        $notification = array(
            'message' => 'Vendedor Activado Satisfactoriamente',
            'alert-type' => 'success',
        );

        return redirect()->route('active.vendor')->with($notification);

    }//End method

    public function ActiveVendorDetails($id)
    {
        
        $activeVendorDetails = User::findOrFail($id);
        return view('backend.vendor.active_vendor_details',compact('activeVendorDetails'));

    }//End method

    public function InActiveVendorApprove(Request $request)
    {
        
        $vendor_id = $request->id;
        $user = User::findOrFail($vendor_id)->update([
            'status' => 'inactive',
        ]);

        $notification = array(
            'message' => 'Vendedor Desactivado Satisfactoriamente',
            'alert-type' => 'success',
        );

        return redirect()->route('inactive.vendor')->with($notification);

    }//End method

    /////////////////////////////////////////////////// ADMIN All Method /////////////////////////////////////////////////
    
    public function AllAdmin()
    {
        
        $alladminuser = User::where('role', 'admin')->latest()->get();

        return view('backend.admin.all_admin', compact('alladminuser'));

    }//End method

    public function AddAdmin()
    {

        $roles = Role::all();
        
        return view('backend.admin.add_admin', compact('roles'));

    }//End method

    public function AdminUserStore(Request $request)
    {
        
        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->status = 'active';

        $user->save();

        if ($request->roles) {
            
            $user->assignRole($request->roles);

        }

        $notification = array(
            'message' => 'Nuevo Administrador Insertado Satisfactoriamente',
            'alert-type' => 'success',
        );

        return redirect()->route('all.admin')->with($notification);
        
    }//End method

    public function EditAdminRole($id)
    {
        
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('backend.admin.edit_admin', compact('user', 'roles'));

    }//End method

    public function AdminUserUpdate(Request $request, $id)
    {
        
        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = 'admin';
        $user->status = 'active';

        $user->save();
        $user->roles()->detach();

        if ($request->roles) {
            
            $user->assignRole($request->roles);

        }

        $notification = array(
            'message' => 'Administrador Actualizado Satisfactoriamente',
            'alert-type' => 'success',
        );

        return redirect()->route('all.admin')->with($notification);

    }//End method

    public function DeleteAdminRole($id)
    {
        
        $user = User::findOrFail($id);

        if (!is_null($user)) {
            
            $user->delete();

        }

        $notification = array(
            'message' => 'Administrador Eliminado Satisfactoriamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }//End method

}
