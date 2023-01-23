<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Faker\Provider\ar_EG\Person;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

    ///////////////////////////// Add Role Permission All Method //////////////////////////////////////////

    public function AddRolesPermission()
    {
        
        $roles = Role::all();
        $permissions = Permission::all();

        $permission_groups = User::getpermissionGroups();

        return view('backend.pages.roles.add_roles_permission', compact('roles', 'permissions', 'permission_groups'));

    }// End Method

    public function RolePermissionStore(Request $request)
    {
        
        $data = array();
        $permissions = $request->permission;

        foreach ($permissions as $key => $item) {
            
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);

        }

        $notification = array(
            'message' => 'Permisos de Rol Añadidos Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->route('all.roles.permission')->with($notification);

    }// End Method

    public function AllRolePermission()
    {
        
        $roles = Role::all();

        return view('backend.pages.roles.all_roles_permission', compact('roles'));

    }// End Method

    public function AdminRolesEdit($id)
    {
        
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        $permission_groups = User::getpermissionGroups();

        return view('backend.pages.roles.role_permission_edit', compact('role', 'permissions', 'permission_groups'));

    }// End Method

    public function AdminRolesUpdate(Request $request, $id)
    {
        
        $role = Role::findOrFail($id);
        $permissions = $request->permission;

        if (!empty($permissions)) {
            
            $role->syncPermissions($permissions);

        }

        $notification = array(
            'message' => 'Permisos de Rol Actualizados Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->route('all.roles.permission')->with($notification);

    }// End Method

    public function AdminRolesDelete($id)
    {
        
        $role = Role::findOrFail($id);
        if (!is_null($role)) {
            
            $role->delete();

        }

        $notification = array(
            'message' => 'Permisos de Rol Eliminados Correctamente',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);


    }// End Method

}
