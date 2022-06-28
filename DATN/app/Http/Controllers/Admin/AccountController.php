<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    // -- User -- //
    public function listUser(){
        $lsUser = Account::all();
        return view('dashboard.user.list_user',compact('lsUser'));
    }
    public function formAddUser(){
        return view('dashboard.user.add_user');
    }

    public function handleAddUser(Request $request)
    {
        $emailUser = Account::where('email',$request->email)->first();
        if($emailUser == true){
            return redirect()->back()->with("error","User already exists");
        }
        $us = new Account();
        $us->email = $request->email;
        $us->password = bcrypt($request->phone);
        $us->full_name = $request->full_name;
        $us->date_of_birth = $request->date_of_birth;
        $us->phone = $request->phone;
        $us->address = $request->address;
        $us->avatar = 'empty';
        $us->role = 1;
        $us->status = 1;
        $us->save();
        return redirect()->back()->with("success","Add User successful");
    }

    public function deleteUser($id_user){
        $user = Account::find($id_user);
        $user->status = 0;
        $user->save();
        $lstUser = Account::all();
        return redirect()->route('admin.listUser');
    }

    public function formEditUser($id_user){
        $lsUser = Account::find($id_user);
        return view('dashboard.user.edit_user',compact('id_user','lsUser'));
    }

    public function handleEditUser(Request $request, $id_user){
        $us = Account::find($id_user);
        $us->email = $request->email;
        $us->full_name = $request->full_name;
        $us->date_of_birth = $request->date_of_birth;
        $us->phone = $request->phone;
        $us->address = $request->address;
        $us->avatar = "empty";
        $us->save();
        return redirect()->route('admin.listUser');
    }

    public function searchUser(){
        $search_text=$_GET['query'];
        $lsUser = Account::where('full_name','LIKE','%'.$search_text.'%')->where('status','=',1)->get();
        return view('dashboard.user.list_user',compact('lsUser'));
    }
    // -- Staff -- //
    public function listStaff(){
        $lsStaff = Account::all();
        // $lsRole = Role::all();
        // return view('dashboard.staff.list_staff',compact('lsStaff','lsRole'));
        return view('dashboard.staff.list_staff',compact('lsStaff'));
    }
    public function formAddStaff(){
        $rl = Role::all();
        return view('dashboard.staff.add_staff',compact('rl'));
    }

    public function handleAddStaff(Request $request)
    {
        $staff = Account::where('email',$request->email)->first();
        if($staff == true){
            return redirect()->back()->with("error","Staff already exists");
        }
        $st = new Account();
        $st->email = $request->email;
        $st->password = bcrypt($request->get('1234567'));
        $st->full_name = $request->full_name;
        $st->date_of_birth = $request->date_of_birth;
        $st->phone = $request->phone;
        $st->address = $request->address;
        $st->avatar = 'empty';
        $st->role = $request->role;
        $st->status = 1;
        $st->save();
        return redirect()->back()->with("success","Add Staff successful");
    }

    public function deleteStaff($id_staff){
        $staff = Account::find($id_staff);
        $staff->status = 0;
        $staff->save();
        $lstStaff = Account::all();
        return redirect()->route('admin.listStaff');
    }

    public function formEditStaff($id_staff){
        $lstStaff = Account::find($id_staff);
        $rl = Role::all();
        return view('dashboard.staff.edit_staff',compact('id_staff','lstStaff','rl'));
    }
    
    public function handleEditStaff(Request $request, $id_staff){
        $staff = Account::find($id_staff);
        $staff->email = $request->email;
        $staff->full_name = $request->full_name;
        $staff->date_of_birth = $request->date_of_birth;
        $staff->phone = $request->phone;
        $staff->address = $request->address;
        $staff->avatar = "empty";
        $staff->role = $request->role;
        $staff->save();
        return redirect()->route('admin.listStaff');
    }

    public function searchStaff(){
        $search_text=$_GET['query'];
        $lsStaff = Account::where('full_name','LIKE','%'.$search_text.'%')->where('status','=',1)->get();
        // $lsRole = Role::where('role_name','LIKE','%'.$search_text.'%')->where('status','=',1)->get();
        // $listStaff = DB::table('accounts')
        //     ->join('roles', 'roles.id', '=', 'accounts.role')
        //     ->select('accounts.email','accounts.full_name','accounts.date_of_birth','accounts.phone','accounts.address','accounts.status','roles.role_name')
        //     ->where('accounts.full_name','LIKE','%'.$search_text.'%')
        //     ->Where('roles.role_name','LIKE','%'.$search_text.'%')
        //     ->get();
        // if($search_text == $listStaff){
        //     return  $listStaff;
        // }
        // elseif ($search_text == $lsRole){
        //     return $lsRole;
        // }
        // return view('dashboard.staff.list_staff',compact('listStaff','lsRole'));
        return view('dashboard.staff.list_staff',compact('lsStaff'));
    }
}
