<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Faker\Provider\ar_EG\Person;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    
    public function AllPermission()
    {
        
        $permissions = Permission::all();

        return view('backend.pages.permission.all_permission', compact('permissions'));
        
    }// End Method

    public function AddPermission()
    {
        
        return view('backend.pages.permission.add_permission');

    }// End Method

    public function StorePermission(Request $request)
    {
        
        $role = Permission::create([

            'name' => $request->name,
            'group_name' => $request->group_name,

        ]);
        
        $notification = array(
            'message' => 'Permiso Insertado Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->route('all.permission')->with($notification);

    }// End Method

    public function EditPermission($id)
    {
        
        $permission = Permission::findOrFail($id);

        return view('backend.pages.permission.edit_permission', compact('permission'));

    }// End Method

    public function UpdatePermission(Request $request)
    {
        
        $per_id = $request->id;

        Permission::findOrFail($per_id)->update([

            'name' => $request->name,
            'group_name' => $request->group_name,

        ]);
        
        $notification = array(
            'message' => 'Permiso Actualizado Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->route('all.permission')->with($notification);

    }// End Method

    public function DeletePermission($id)
    {
        
        Permission::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Permiso Eliminado Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }// End Method
    
    /////////////////////////////////////////// ROLES //////////////////////////////////////////

    public function AllRoles()
    {
        
        $roles = Role::all();

        return view('backend.pages.roles.all_roles', compact('roles'));

    }// End Method

    public function AddRoles()
    {
        
        return view('backend.pages.roles.add_roles');

    }// End Method

    public function StoreRoles(Request $request)
    {
        
        $role = Role::create([

            'name' => $request->name,

        ]);
        
        $notification = array(
            'message' => 'Rol Insertado Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->route('all.roles')->with($notification);

    }// End Method

    public function EditRoles($id)
    {
        
        $roles = Role::findOrFail($id);

        return view('backend.pages.roles.edit_roles', compact('roles'));

    }// End Method

    public function UpdateRoles(Request $request)
    {
        
        $rol_id = $request->id;

        Role::findOrFail($rol_id)->update([

            'name' => $request->name,

        ]);
        
        $notification = array(
            'message' => 'Rol Actualizado Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->route('all.roles')->with($notification);

    }// End Method

    public function DeleteRoles($id)
    {
        
        Role::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Rol Eliminado Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }// End Method

}
