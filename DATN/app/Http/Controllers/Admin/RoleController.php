<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function listRole(){
        $lsRole = Role::all();
        return view('dashboard.role.list_role',compact('lsRole'));
    }

    public function formAddRole(){
        return view('dashboard.role.add_role');
    }

    public function handleAddrole(Request $request)
    {
        $role = Role::where('role_name',$request->role_name)->first();
        if($role == true){
            return redirect()->back()->with("error","Account type already exists");
        }
        $rl = new Role();
        $rl->role_name = $request->role_name;
        $rl->status = 1;
        $rl->save();
        return redirect()->back()->with("success","Add Account type successful");
    }
    public function deleteRole($id_role){
        $role = Role::find($id_role);
        $role->status = 0;
        $role->save();
        $lsRole = Role::all();
        return redirect()->route('admin.listRole');
    }

    public function formEditRole($id_role){
        $lsRole = Role::find($id_role);
        return view('dashboard.role.edit_role',compact('id_role','lsRole'));
    }
    public function handleEditRole(Request $request,$id_role){
        $checkRole = Role::where('role_name',$request->role_name)->first();
        if($checkRole == true){
            return redirect()->back()->with("error","Role already exists");
        }
        $lsRole = Role::find($id_role);
        $lsRole->role_name = $request->role_name;
        $lsRole->save();
        return redirect()->route('admin.listRole');
    }

    public function searchRole(){
        $search_text=$_GET['query'];
        $lsRole=Role::where('role_name','LIKE','%'.$search_text.'%')->where('status','=',1)->get();
        return view('dashboard.role.list_role',compact('lsRole'));
    }
}
