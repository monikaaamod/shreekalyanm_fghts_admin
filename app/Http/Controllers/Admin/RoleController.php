<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function roles(Request $request, $status='')
    {
        if ($request->ajax()) {
            $data = Role::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route("roles.edit", $row->id) . '" class="edit btn btn-primary p-2"><i class="fas fa-edit fa-sm"></i></a>
                            <a href="' . route("roles.show", base64_encode($row->id)) . '" class="btn btn-info p-2"><i class="fas fa-eye fa-sm"></i></a>   ';
    
                    // <button type="button" id="deleteButton" data-url="' . route('roles-delete', $row->id) . '" class="edit btn btn-danger btn-sm deleteButton" data-loading-text="Deleted...." data-rest-text="Delete"><i class="fas fa-trash fa-sm"></i></button>
                    return $btn;
                })
                ->addColumn('checkbox', function ($row) {
                    $box = "";
                    $box = '<input type="checkbox" name="selectedData[]" value="'.$row->id.'">';

                    return $box;
                })
                ->rawColumns(['action','checkbox'])
                ->make(true);
        }



        $newdata = array();
        $newdata['page_title'] = "Roles List";
        $newdata['page_name'] = "Roles";
        return view('admin.roles.roles', $newdata);
    }
    public function create()
    {
        //$permission = Permission::get();
        $permission = Permission::where('parent_id', 0)->latest()->get();
        foreach ($permission as $key => $vals) {
            $vals->child_permission = Permission::where('parent_id', $vals->id)->get();
        }
        $newdata = array();
        $newdata['page_title']= "Add Roles";
        $newdata['page_name'] = "Roles";
        $newdata['url'] = route('roles-store');
        return view('admin.roles.roles-create', compact('permission', 'newdata'));
    }


    public function store(Request $request)
    {

        // print_r($request->all());exit;
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $role = Role::create(['name' =>  $request->name]);
        $role->syncPermissions(Permission::whereIn('id', $request->permission)->get());

        // $role = Role::create(['name' => $request->input('name')]);
        // $role->syncPermissions($request->input('permission'));
        return response()->json([
            'status' => true,
            'msg' => 'Role created successfully',
        ]);
    }
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();

        return view('admin.roles.show', compact('role', 'rolePermissions'));
    }
    public function edit($id)
    {
        $post = Role::find($id);


        $rolePermissions  = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')->all();


        $permission = Permission::where('parent_id', 0)->latest()->get();
        foreach($permission as $key=>$vals) {
            $vals->child_permission =  Permission::where('parent_id', $vals->id)->get();
        }

        $newdata = array();
        $newdata['page_title'] = "Edit Roles";
        $newdata['page_name'] = "Roles";
        $newdata['url'] = route('roles-update', $id);



        // echo "<pre>";print_r($permission);
        // exit;

        return view('admin.roles.roles-edit', compact('newdata', 'post', 'permission', 'rolePermissions'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name,' . $id,
            'permission' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions(Permission::whereIn('id', $request->permission)->get());
        return response()->json(['status' => true, 'msg' => 'Role updated successfully']);
    }
    public function destroy($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        return response()->json(['status' => true, 'msg' => 'Role deleted successfully']);
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        // Ensure that the 'ids' input contains an array of IDs
        if (!is_array($ids)) {
            return response()->json(['message' => 'Invalid input.'], 400);
        }

        // Use the Eloquent ORM to delete the records
        Role::whereIn('id', $ids)->delete();

        return response()->json([
            'status' => true,
            'msg' => 'Records deleted successfully.'
        ]);
    }


}
